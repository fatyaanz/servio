<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SubService;

class AiDiagnosisApiController extends Controller
{
    /**
     * Analyze damage using Gemini AI and return recommended sub-services
     */
    public function analyze(Request $request)
    {
        $request->validate([
            'deskripsi_masalah' => 'required|string|min:5',
            'provider_id' => 'required|exists:users,_id',
            'photo_base64' => 'nullable|string' // Format: base64 string without data URI scheme (or we strip it)
        ]);

        try {
            // 1. Get sub-services available from this provider
            $daftarLayanan = SubService::whereHas('providerService', function($q) use ($request) {
                $q->where('provider_id', $request->provider_id);
            })->select('_id', 'name', 'description', 'price_min', 'price_max')->get()->toArray();

            if (empty($daftarLayanan)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Provider ini belum memiliki layanan yang tersedia untuk direkomendasikan.'
                ], 400);
            }

            // 2. Setup API Key & Prompt
            $apiKey = env('GEMINI_API_KEY');
            $userProblem = $request->input('deskripsi_masalah');

            $prompt = "
            Kamu adalah sistem AI pakar diagnosis kerusakan barang untuk aplikasi jasa perbaikan tukang.
            Tugasmu adalah menganalisis keluhan pelanggan, memberikan diagnosis singkat, dan merekomendasikan sub-layanan perbaikan yang paling cocok dari daftar database kami.

            Berikut adalah DAFTAR LAYANAN DARI PROVIDER INI:
            " . json_encode($daftarLayanan) . "

            KELUHAN PELANGGAN:
            \"" . $userProblem . "\"

            WAJIB JAWAB DALAM FORMAT JSON BERIKUT (Jangan sertakan markdown atau teks tambahan apa pun di luar JSON):
            {
                \"diagnosis\": \"Penjelasan singkat mengenai perkiraan kerusakan barang berdasarkan keluhan dan/atau foto\",
                \"rekomendasi_sub_layanan_id\": 1,
                \"alasan_rekomendasi\": \"Alasan singkat kenapa layanan ini yang dipilih\"
            }
            ";

            // 3. Prepare payload for Gemini API
            $parts = [
                ['text' => $prompt]
            ];

            if ($request->filled('photo_base64')) {
                // Strip data uri scheme if present (e.g. data:image/jpeg;base64,)
                $base64 = preg_replace('/^data:image\/\w+;base64,/', '', $request->input('photo_base64'));
                
                $parts[] = [
                    'inlineData' => [
                        'mimeType' => 'image/jpeg', // Defaulting to jpeg, but gemini handles others fine
                        'data' => $base64
                    ]
                ];
            }

            // 4. Request to Gemini API
            $urlGemini = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent";
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($urlGemini . '?key=' . $apiKey, [
                'contents' => [
                    [
                        'parts' => $parts
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

            // 5. Fetch recommended SubService
            $subLayananDirekomendasikan = null;
            if (isset($aiData['rekomendasi_sub_layanan_id']) && !is_null($aiData['rekomendasi_sub_layanan_id'])) {
                $subLayananDirekomendasikan = SubService::find($aiData['rekomendasi_sub_layanan_id']);
            }

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
