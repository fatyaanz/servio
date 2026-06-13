<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis Kerusakan - RepairGo</title>
    <!-- Tambahkan library Pendukung (Tailwind / SweetAlert) jika belum ada di layout utama -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800">

    <div class="max-w-2xl mx-auto py-12 px-4">
        
        <!-- 1. Memanggil Komponen Header -->
        @include('user.diagnosis.components.diagnosis-header')

        <!-- 2. Memanggil Komponen Card Form Input -->
        @include('user.diagnosis.components.diagnosis-form-card')

        <!-- 3. Memanggil Komponen Hasil Diagnosis AI -->
        @include('user.diagnosis.components.diagnosis-result')

    </div>

    <!-- Script AJAX untuk memproses form -->
   <script>
document.getElementById('formDiagnosis').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const masalah = document.getElementById('deskripsi_masalah').value;
    const btnSubmit = document.getElementById('btnSubmit');
    const btnText = document.getElementById('btnText');
    
    if(masalah.length < 5) {
        Swal.fire('Oops', 'Mohon berikan deskripsi yang sedikit lebih panjang ya!', 'warning');
        return;
    }

    // Loading state
    btnSubmit.disabled = true;
    if(btnText) btnText.innerText = "Sedang Menganalisis... 🧠";

    try {
        const response = await fetch("{{ route('diagnosis.proses') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ deskripsi_masalah: masalah })
        });

        const data = await response.json();
        console.log("Respon Data Laravel:", data);

        btnSubmit.disabled = false;
        if(btnText) btnText.innerText = "Mulai Diagnosis Otomatis ✨";

        if(data.status === 'success') {
            const containerHasil = document.getElementById('hasilDiagnosis');
            
            if(containerHasil) {
                containerHasil.classList.remove('hidden');

                let htmlLayanan = '';
                if(data.layanan_direkomendasikan) {
                    const namaLayanan = data.layanan_direkomendasikan.name || data.layanan_direkomendasikan.nama_sub_layanan || 'Nama Layanan Tidak Diketahui';
                    const deskripsiLayanan = data.layanan_direkomendasikan.description || 'Tidak ada deskripsi layanan.';
                    
                    // 🛠️ PERBAIKAN: Ambil price_min DAN price_max dari database
                    const priceMin = parseFloat(data.layanan_direkomendasikan.price_min);
                    const priceMax = parseFloat(data.layanan_direkomendasikan.price_max);
                    
                    let hargaText = 'Hubungi Teknisi';

                    // Cek jika kedua harga valid (bukan NaN) dan di atas 0
                    if (!isNaN(priceMin) && !isNaN(priceMax) && priceMin > 0 && priceMax > 0) {
                        // Jika harga min dan max berbeda, tampilkan range (Rp 20.000 - Rp 50.000)
                        if (priceMax > priceMin) {
                            hargaText = `Rp ${priceMin.toLocaleString('id-ID')} - Rp ${priceMax.toLocaleString('id-ID')}`;
                        } else {
                            // Jaga-jaga kalau di DB nilainya diisi sama, tampilkan satu harga aja
                            hargaText = `Rp ${priceMin.toLocaleString('id-ID')}`;
                        }
                    } else if (!isNaN(priceMin) && priceMin > 0) {
                        hargaText = `Rp ${priceMin.toLocaleString('id-ID')}`;
                    }

                    // Ambil provider_id dari query parameter halaman saat ini
                    const urlParams = new URLSearchParams(window.location.search);
                    const providerId = urlParams.get('provider_id') || '';

                    // Buat struktur kartu dengan variabel hargaText yang sudah jadi range
                    htmlLayanan = `
                        <div class="bg-white p-6 rounded-2xl shadow-sm border-2 border-emerald-500 mt-4">
                            <div class="flex justify-between items-start flex-wrap gap-2">
                                <div>
                                    <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-1 rounded-full">Rekomendasi Layanan</span>
                                    <h4 class="text-xl font-bold mt-2 text-slate-900">${namaLayanan}</h4>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-slate-400 block font-medium">Estimasi Biaya</span>
                                    <span class="text-lg font-bold text-emerald-600">${hargaText}</span>
                                </div>
                            </div>
                            <hr class="my-4 border-slate-100">
                            <p class="text-slate-700 text-sm font-medium">Detail Perbaikan:</p>
                            <p class="text-slate-600 text-sm mt-1 leading-relaxed">${deskripsiLayanan}</p>
                            <a href="/booking-normal?provider_id=${providerId}&sub_services[]=${data.layanan_direkomendasikan.id}" class="mt-5 w-full sm:w-auto inline-block text-center bg-emerald-500 text-white font-semibold px-6 py-3 rounded-xl hover:bg-emerald-600 transition shadow-sm">
                                Pilih & Lanjutkan Jasa Ini
                            </a>
                        </div>
                    `;
                }

                // Suntikkan ke container utama
                containerHasil.innerHTML = `
                    <div class="bg-blue-50 border border-blue-100 p-6 rounded-2xl mb-4">
                        <h3 class="font-bold text-blue-900 text-lg mb-2">Hasil Analisis AI:</h3>
                        <p class="text-blue-950 mb-4">${data.diagnosis}</p>
                        <small class="text-blue-700 italic block">Alasan AI: ${data.alasan}</small>
                    </div>
                    ${htmlLayanan}
                `;
            }

        } else {
            Swal.fire('Gagal', data.message || 'Terjadi kesalahan sistem.', 'error');
        }

    } catch (error) {
        btnSubmit.disabled = false;
        if(btnText) btnText.innerText = "Mulai Diagnosis Otomatis ✨";
        Swal.fire('JS Parse Error', error.message, 'error');
    }
});
</script>
</body>
</html>