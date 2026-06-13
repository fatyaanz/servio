<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SubService; // ✅ Menggunakan nama model asli proyekmu

class AiDiagnosisController extends Controller
{
    // 🛠️ WAJIB ADA: Fungsi untuk menampilkan halaman form diagnosis di browser
    public function index()
    {
        return view('user.diagnosis.diagnosis-form');
    }

    // Fungsi untuk memproses data input ke Gemini AI
    public function diagnose(Request $request)
    {
        $request->validate([
            'deskripsi_masalah' => 'required|string|min:5',
        ]);

        try {
            // 1. Ambil data database lengkap dengan price_min dan price_max
            $daftarLayanan = SubService::select('id', 'name', 'description', 'price_min', 'price_max')->get()->toArray();

            if (empty($daftarLayanan)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Daftar sub-service di database masih kosong. Mohon isi data terlebih dahulu.'
                ], 400);
            }

            // 2. Setup API Key & Prompt
            $apiKey = env('GEMINI_API_KEY');
            $userProblem = $request->input('deskripsi_masalah');

            $prompt = "
            Kamu adalah sistem AI pakar diagnosis kerusakan barang untuk aplikasi jasa perbaikan tukang.
            Tugasmu adalah menganalisis keluhan pelanggan, memberikan diagnosis singkat, dan merekomendasikan sub-layanan perbaikan yang paling cocok dari daftar database kami.

            Berikut adalah DAFTAR LAYANAN YANG TERSEDIA di database kami:
            " . json_encode($daftarLayanan) . "

            KELUHAN PELANGGAN:
            \"" . $userProblem . "\"

            WAJIB JAWAB DALAM FORMAT JSON BERIKUT (Jangan sertakan markdown atau teks tambahan apa pun di luar JSON):
            {
                \"diagnosis\": \"Penjelasan singkat mengenai perkiraan kerusakan barang berdasarkan keluhan\",
                \"rekomendasi_sub_layanan_id\": 1,
                \"alasan_rekomendasi\": \"Alasan singkat kenapa layanan ini yang dipilih\"
            }
            ";

            // 3. Request ke API Gemini (Menggunakan gemini-2.5-flash)
            $urlGemini = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent";
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($urlGemini . '?key=' . $apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            if (!$response->successful()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gemini API Error: ' . ($response->json()['error']['message'] ?? 'Gagal merespon.')
                ], $response->status());
            }

            $result = $response->json();
            $aiRawContent = $result['candidates'][0]['content']['parts'][0]['text'] ?? '{}';
            
            $aiRawContent = trim($aiRawContent);
            if (preg_match('/^```(?:json)?\s*([\s\S]*?)\s*```$/i', $aiRawContent, $matches)) {
                $aiRawContent = trim($matches[1]);
            }
            
            $aiData = json_decode($aiRawContent, true);

            // 4. Ambil data model SubService secara utuh dari database berdasarkan rekomendasi AI
            $subLayananDirekomendasikan = null;
            if (isset($aiData['rekomendasi_sub_layanan_id']) && !is_null($aiData['rekomendasi_sub_layanan_id'])) {
                $subLayananDirekomendasikan = SubService::find($aiData['rekomendasi_sub_layanan_id']);
            }

            // Kirim respon sukses balik ke JavaScript
            return response()->json([
                'status' => 'success',
                'diagnosis' => $aiData['diagnosis'] ?? 'Gagal mendiagnosis kerusakan.',
                'alasan' => $aiData['alasan_rekomendasi'] ?? '',
                'layanan_direkomendasikan' => $subLayananDirekomendasikan
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
            ], 500);
        }
    }
}