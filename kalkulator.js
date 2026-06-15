/* ========================================
   kalkulator.js — Logika Kalkulator Nilai
   Ahmad Fathir Dzianurrizqi – 202432076
   ======================================== */

/* ──────────────────────────────────
   Fungsi hitungNilaiAkhir
   Menerima tiga parameter angka dan
   mengembalikan nilai akhir berdasarkan bobot
   (Tugas 30%, UTS 30%, UAS 40%)
────────────────────────────────── */
function hitungNilaiAkhir(tugas, uts, uas) {
  return (tugas * 0.30) + (uts * 0.30) + (uas * 0.40);
}

/* ──────────────────────────────────
   Fungsi tentukanGrade
   Menerima nilai akhir dan mengembalikan
   huruf grade: A ≥ 80, B ≥ 70, C ≥ 60,
   D ≥ 50, selainnya E
────────────────────────────────── */
function tentukanGrade(nilai) {
  if (nilai >= 80) return 'A';
  else if (nilai >= 70) return 'B';
  else if (nilai >= 60) return 'C';
  else if (nilai >= 50) return 'D';
  else return 'E';
}

/* ──────────────────────────────────
   Fungsi validasiInput
   Memeriksa apakah nilai kosong,
   bukan angka, atau di luar 0–100.
   Mengembalikan pesan error atau null jika valid.
────────────────────────────────── */
function validasiInput(nilai, nama) {
  if (nilai === '' || nilai === null || nilai === undefined) {
    return `Nilai ${nama} tidak boleh kosong.`;
  }
  const angka = parseFloat(nilai);
  if (isNaN(angka)) {
    return `Nilai ${nama} harus berupa angka.`;
  }
  if (angka < 0 || angka > 100) {
    return `Nilai ${nama} harus berada di rentang 0–100.`;
  }
  return null; // valid
}

/* ──────────────────────────────────
   Helper: deskripsi grade
────────────────────────────────── */
function deskripsiGrade(grade) {
  const map = {
    'A': 'Sangat Baik',
    'B': 'Baik',
    'C': 'Cukup',
    'D': 'Kurang',
    'E': 'Tidak Lulus',
  };
  return map[grade] || '';
}

/* ──────────────────────────────────
   window.onload — Pesan sambutan
   saat halaman pertama dibuka
────────────────────────────────── */
window.onload = function () {
  const welcomeEl = document.getElementById('welcomeMsg');
  if (welcomeEl) {
    const jam = new Date().getHours();
    let sapa = 'Halo';
    if (jam >= 5  && jam < 12) sapa = 'Selamat pagi';
    else if (jam >= 12 && jam < 15) sapa = 'Selamat siang';
    else if (jam >= 15 && jam < 19) sapa = 'Selamat sore';
    else sapa = 'Selamat malam';

    welcomeEl.textContent = `✦  ${sapa}! Halaman siap. Masukkan nilai kamu untuk memulai perhitungan.`;
    welcomeEl.classList.add('visible');

    // Sembunyikan pesan sambutan setelah 5 detik
    setTimeout(() => {
      welcomeEl.style.opacity = '0';
      welcomeEl.style.transition = 'opacity 0.5s ease';
      setTimeout(() => welcomeEl.classList.remove('visible'), 500);
    }, 5000);
  }
};

/* ──────────────────────────────────
   Event Listener pada tombol Hitung
   Menggunakan addEventListener (bukan onclick di HTML)
────────────────────────────────── */
document.addEventListener('DOMContentLoaded', function () {
  const btnHitung     = document.getElementById('btnHitung');
  const errorEl       = document.getElementById('errorMsg');
  const resultSection = document.getElementById('resultSection');
  const resultScore   = document.getElementById('resultScore');
  const resultGrade   = document.getElementById('resultGrade');
  const resultDesc    = document.getElementById('resultDesc');
  const resultBadge   = document.getElementById('resultBadge');

  btnHitung.addEventListener('click', function () {
    // Ambil nilai input mentah
    const rawTugas = document.getElementById('nilaiTugas').value.trim();
    const rawUTS   = document.getElementById('nilaiUTS').value.trim();
    const rawUAS   = document.getElementById('nilaiUAS').value.trim();

    // Log nilai input mentah ke console (debugging)
    console.log('=== DEBUG INPUT ===');
    console.log('Nilai Tugas (raw):', rawTugas);
    console.log('Nilai UTS   (raw):', rawUTS);
    console.log('Nilai UAS   (raw):', rawUAS);

    // Validasi semua input
    const errTugas = validasiInput(rawTugas, 'Tugas');
    const errUTS   = validasiInput(rawUTS,   'UTS');
    const errUAS   = validasiInput(rawUAS,   'UAS');

    // Tampilkan error pertama yang ditemukan
    const firstError = errTugas || errUTS || errUAS;

    if (firstError) {
      errorEl.textContent = '⚠  ' + firstError;
      errorEl.classList.add('visible');
      resultSection.classList.remove('visible');
      console.warn('Validasi gagal:', firstError);
      return;
    }

    // Sembunyikan error
    errorEl.classList.remove('visible');

    // Hitung nilai akhir
    const tugas = parseFloat(rawTugas);
    const uts   = parseFloat(rawUTS);
    const uas   = parseFloat(rawUAS);

    const nilaiAkhir = hitungNilaiAkhir(tugas, uts, uas);
    const grade      = tentukanGrade(nilaiAkhir);
    const nilaiRound = Math.round(nilaiAkhir * 10) / 10;

    // Log hasil akhir ke console (debugging)
    console.log('=== DEBUG HASIL ===');
    console.log('Nilai Akhir:', nilaiAkhir);
    console.log('Dibulatkan :', nilaiRound);
    console.log('Grade       :', grade);

    // Tampilkan hasil
    resultScore.textContent = nilaiRound.toFixed(1);
    resultGrade.textContent = grade;
    resultDesc.textContent  = deskripsiGrade(grade);

    // Hapus class grade sebelumnya dan pasang yang baru
    resultBadge.className = 'result-grade-badge grade-' + grade;

    // Tampilkan result section
    resultSection.classList.add('visible');

    // Scroll ke hasil
    resultSection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  });
});