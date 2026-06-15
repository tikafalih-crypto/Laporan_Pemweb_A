<?php
/*
 * matkul.php — Pencarian Informasi Mata Kuliah
 * Ahmad Fathir Dzianurrizqi – 202432076
 * Laporan 3 | Pemrograman Web
 */

// Tangkap input dan normalisasi agar case-insensitive
$input   = isset($_POST['nama_matkul']) ? trim(strtolower($_POST['nama_matkul'])) : '';
$hasil   = null;
$error   = false;
$disubmit = $_SERVER['REQUEST_METHOD'] === 'POST';

/* ──────────────────────────────────
   Pencarian dengan if / elseif / else
────────────────────────────────── */
if ($disubmit && $input !== '') {

  // ── Information Retrieval Laboratory ──

  if ($input === 'data warehouse') {
    $hasil = [
      'laboratorium'  => 'Information Retrieval Laboratory',
      'nama_matkul'   => 'Data Warehouse',
      'kode'          => 'IRL-101',
      'sks'           => 3,
      'deskripsi'     => 'Mempelajari konsep penyimpanan data skala besar, desain skema bintang dan kepingan, serta proses ETL (Extract, Transform, Load) untuk kebutuhan analitik bisnis.',
    ];

  } elseif ($input === 'data mining') {
    $hasil = [
      'laboratorium'  => 'Information Retrieval Laboratory',
      'nama_matkul'   => 'Data Mining',
      'kode'          => 'IRL-102',
      'sks'           => 3,
      'deskripsi'     => 'Mengkaji teknik penggalian pola dan pengetahuan dari dataset besar, meliputi klasifikasi, klasterisasi, asosiasi, dan regresi menggunakan berbagai algoritma.',
    ];

  } elseif ($input === 'pengantar big data') {
    $hasil = [
      'laboratorium'  => 'Information Retrieval Laboratory',
      'nama_matkul'   => 'Pengantar Big Data',
      'kode'          => 'IRL-103',
      'sks'           => 3,
      'deskripsi'     => 'Pengenalan ekosistem Big Data mencakup konsep 3V (Volume, Velocity, Variety), teknologi Hadoop, Spark, dan NoSQL untuk pengolahan data berskala masif.',
    ];

  } elseif ($input === 'pemrograman mobile') {
    $hasil = [
      'laboratorium'  => 'Information Retrieval Laboratory',
      'nama_matkul'   => 'Pemrograman Mobile',
      'kode'          => 'IRL-104',
      'sks'           => 3,
      'deskripsi'     => 'Membahas pengembangan aplikasi mobile native dan cross-platform, meliputi siklus hidup aplikasi, UI/UX mobile, serta pengelolaan data lokal dan API.',
    ];

  // ── Software Engineering Laboratory ──

  } elseif ($input === 'pemrograman visual') {
    $hasil = [
      'laboratorium'  => 'Software Engineering Laboratory',
      'nama_matkul'   => 'Pemrograman Visual',
      'kode'          => 'SEL-201',
      'sks'           => 3,
      'deskripsi'     => 'Memperkenalkan paradigma pemrograman berbasis antarmuka grafis, event-driven programming, serta pengembangan aplikasi desktop menggunakan komponen visual.',
    ];

  } elseif ($input === 'rekayasa perangkat lunak') {
    $hasil = [
      'laboratorium'  => 'Software Engineering Laboratory',
      'nama_matkul'   => 'Rekayasa Perangkat Lunak',
      'kode'          => 'SEL-202',
      'sks'           => 3,
      'deskripsi'     => 'Mempelajari metodologi pengembangan perangkat lunak terstruktur meliputi analisis kebutuhan, desain sistem, pengujian, dan pemeliharaan menggunakan model SDLC.',
    ];

  } elseif ($input === 'pemrograman web') {
    $hasil = [
      'laboratorium'  => 'Software Engineering Laboratory',
      'nama_matkul'   => 'Pemrograman Web',
      'kode'          => 'SEL-301',
      'sks'           => 3,
      'deskripsi'     => 'Mempelajari pengembangan aplikasi berbasis web menggunakan HTML, CSS, PHP, dan koneksi ke database. Mencakup konsep client-server, form handling, dan manajemen sesi.',
    ];

  } elseif ($input === 'basis data') {
    $hasil = [
      'laboratorium'  => 'Software Engineering Laboratory',
      'nama_matkul'   => 'Basis Data',
      'kode'          => 'SEL-202',
      'sks'           => 3,
      'deskripsi'     => 'Membahas konsep sistem manajemen basis data relasional, perancangan ERD, normalisasi, bahasa SQL (DDL, DML, DCL), serta optimasi query dan transaksi data.',
    ];

  } else {
    // Mata kuliah tidak ditemukan
    $error = true;
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Informasi Mata Kuliah Laboratorium</title>
  <style>
    /* ── Reset & Base ── */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

    body {
      font-family: 'Inter', Arial, sans-serif;
      font-size: 14px;
      background: #F4F6FF;
      color: #1E1B4B;
      padding: 24px;
      min-height: 100vh;
    }

    h2 {
      font-size: 1.15rem;
      margin-bottom: 18px;
      color: #1E1B4B;
      font-weight: 600;
    }

    /* Watermark info */
    .watermark {
      font-size: 11px;
      color: #9CA3AF;
      margin-bottom: 20px;
    }

    /* ── Form ── */
    .form-wrap {
      background: #FFFFFF;
      border: 1px solid #E2E4F0;
      border-radius: 12px;
      padding: 22px;
      max-width: 480px;
      margin-bottom: 22px;
      box-shadow: 0 2px 12px rgba(108,99,255,0.07);
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
      font-size: 13px;
      color: #6B7280;
    }

    input[type="text"] {
      width: 100%;
      padding: 9px 12px;
      border: 1.5px solid #E2E4F0;
      border-radius: 8px;
      font-size: 14px;
      margin-bottom: 14px;
      background: #F4F6FF;
      color: #1E1B4B;
      outline: none;
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    input[type="text"]::placeholder { color: #9CA3AF; }

    input[type="text"]:focus {
      border-color: #6C63FF;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(108,99,255,0.12);
    }

    input[type="submit"] {
      padding: 9px 24px;
      background: linear-gradient(135deg, #6C63FF, #8B7FFF);
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 13px;
      font-weight: 600;
      transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
    }

    input[type="submit"]:hover {
      background: linear-gradient(135deg, #5a52e0, #7a70f0);
      transform: translateY(-1px);
      box-shadow: 0 4px 14px rgba(108,99,255,0.3);
    }

    /* ── Fieldset hasil ── */
    fieldset {
      max-width: 560px;
      border: 1px solid #E2E4F0;
      border-radius: 12px;
      padding: 18px 22px;
      background: #FFFFFF;
      box-shadow: 0 2px 12px rgba(108,99,255,0.07);
    }

    legend {
      font-weight: 600;
      padding: 0 8px;
      font-size: 13px;
      color: #6C63FF;
      background: #fff;
    }

    .info-row {
      margin-bottom: 8px;
      font-size: 13px;
      color: #1E1B4B;
      line-height: 1.5;
    }

    .info-row span {
      color: #4B5563;
    }

    /* Error message */
    .error-msg {
      background: #FEF2F2;
      border: 1px solid #FECACA;
      color: #DC2626;
      border-radius: 8px;
      padding: 10px 14px;
      max-width: 560px;
      font-size: 13px;
      font-style: italic;
    }
  </style>
</head>
<body>

  <p class="watermark">Ahmad Fathir Dzianurrizqi – 202432076 | Laporan 3 Pemrograman Web</p>

  <h2>Informasi Mata Kuliah Laboratorium</h2>

  <!-- ─── Form ─── -->
  <div class="form-wrap">
    <form method="POST" action="matkul.php">
      <label for="nama_matkul">Nama Mata Kuliah :</label>
      <input
        type="text"
        id="nama_matkul"
        name="nama_matkul"
        placeholder="Contoh: Pemrograman Web"
        value="<?php echo htmlspecialchars(isset($_POST['nama_matkul']) ? $_POST['nama_matkul'] : ''); ?>"
      />
      <input type="submit" value="Cari" />
    </form>
  </div>

  <!-- ─── Output ─── -->
  <?php if ($disubmit): ?>
    <?php if ($hasil): ?>
      <fieldset>
        <legend>Hasil Pencarian</legend>
        <p class="info-row">Laboratorium &nbsp;: <span><?php echo htmlspecialchars($hasil['laboratorium']); ?></span></p>
        <p class="info-row">Nama Mata Kuliah : <span><?php echo htmlspecialchars($hasil['nama_matkul']); ?></span></p>
        <p class="info-row">Kode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span><?php echo htmlspecialchars($hasil['kode']); ?></span></p>
        <p class="info-row">SKS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span><?php echo $hasil['sks']; ?> SKS</span></p>
        <p class="info-row">Deskripsi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span><?php echo htmlspecialchars($hasil['deskripsi']); ?></span></p>
      </fieldset>

    <?php elseif ($error): ?>
      <p class="error-msg">
        Mata kuliah "<em><?php echo htmlspecialchars($_POST['nama_matkul']); ?></em>" tidak ditemukan.
      </p>

    <?php else: ?>
      <p class="error-msg">Input tidak boleh kosong.</p>
    <?php endif; ?>
  <?php endif; ?>

</body>
</html>