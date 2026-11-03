<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Jadwal</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
        .card { background: white; border-radius: 8px; padding: 28px; max-width: 700px; margin: auto; box-shadow: 0 2px 8px rgba(0,0,0,0.12); }
        .card-header { background: #1a3a5c; color: white; padding: 16px 20px; border-radius: 6px; margin-bottom: 20px; }
        .row { display: flex; padding: 10px 0; border-bottom: 1px solid #eee; }
        .label { width: 160px; font-weight: bold; color: #555; flex-shrink: 0; }
        .value { flex: 1; }
        .badge { padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; }
        .badge-teori    { background: #d1ecf1; color: #0c5460; }
        .badge-praktikum{ background: #fff3cd; color: #856404; }
        .badge-daring   { background: #d4edda; color: #155724; }
        .status-ok  { color: #28a745; font-weight: bold; }
        .status-no  { color: #dc3545; font-weight: bold; }
        .btn-back { display: inline-block; margin-top: 20px; padding: 8px 18px; background: #1a3a5c; color: white; text-decoration: none; border-radius: 4px; }
        .btn-back:hover { background: #2d6a9f; }
        .not-found { text-align: center; color: #dc3545; }
    </style>
</head>
<body>

<div class="card">

    @if ($jadwal !== null)

        <div class="card-header">
            <h2 style="margin:0">📋 Detail Jadwal: {{ $jadwal['id_jadwal'] }}</h2>
        </div>

        <div class="row">
            <span class="label">Mata Kuliah</span>
            <span class="value"><strong>{{ $jadwal['mataKuliah'] }}</strong></span>
        </div>
        <div class="row">
            <span class="label">Dosen Pengampu</span>
            <span class="value">{{ $jadwal['dosen'] }}</span>
        </div>
        <div class="row">
            <span class="label">Waktu</span>
            <span class="value">{{ $jadwal['waktu'] }}</span>
        </div>
        <div class="row">
            <span class="label">Ruangan</span>
            <span class="value">{{ $jadwal['ruangan'] }}</span>
        </div>
        <div class="row">
            <span class="label">Beban SKS</span>
            <span class="value">{{ $jadwal['sks'] }} SKS</span>
        </div>
        <div class="row">
            <span class="label">Tipe Perkuliahan</span>
            <span class="value">
                @if ($jadwal['tipe'] === 'Teori')
                    <span class="badge badge-teori">🏫 Kuliah Teori</span>
                @elseif ($jadwal['tipe'] === 'Praktikum')
                    <span class="badge badge-praktikum">💻 Praktikum Lab</span>
                @elseif ($jadwal['tipe'] === 'Daring')
                    <span class="badge badge-daring">🌐 Kuliah Daring</span>
                @endif
            </span>
        </div>
        <div class="row">
            <span class="label">Deskripsi</span>
            <span class="value">{{ $jadwal['deskripsi'] }}</span>
        </div>
        <div class="row">
            <span class="label">Persiapan Aktivasi</span>
            <span class="value">{{ $jadwal['aktivasi'] }}</span>
        </div>
        <div class="row">
            <span class="label">Petunjuk Akses</span>
            <span class="value">{{ $jadwal['akses'] }}</span>
        </div>
        <div class="row">
            <span class="label">Status Ruang</span>
            <span class="value">
                @if ($jadwal['status_ruang'])
                    <span class="status-ok">✅ SIAP DIGUNAKAN</span>
                @else
                    <span class="status-no">⚠️ PERLU CEK ULANG</span>
                @endif
            </span>
        </div>

    @else

        <div class="not-found">
            <h2>❌ Jadwal dengan ID {{ $id }} tidak ditemukan.</h2>
        </div>

    @endif

    <a href="{{ route('jadwal.index') }}" class="btn-back">← Kembali ke Daftar Jadwal</a>

</div>

</body>
</html>
