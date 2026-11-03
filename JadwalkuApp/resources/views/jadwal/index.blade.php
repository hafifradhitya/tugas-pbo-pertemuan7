<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Perkuliahan BAAK UCIC</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
        .header { background: #1a3a5c; color: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        .info-bar { background: #e8f4f8; padding: 10px 20px; border-radius: 6px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        th { background: #1a3a5c; color: white; padding: 12px 16px; text-align: left; }
        td { padding: 12px 16px; border-bottom: 1px solid #eee; }
        tr:hover td { background: #f0f7ff; }
        .badge { padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; }
        .badge-teori    { background: #d1ecf1; color: #0c5460; }
        .badge-praktikum{ background: #fff3cd; color: #856404; }
        .badge-daring   { background: #d4edda; color: #155724; }
        .btn { display: inline-block; padding: 6px 14px; background: #1a3a5c; color: white; text-decoration: none; border-radius: 4px; font-size: 13px; }
        .btn:hover { background: #2d6a9f; }
        .footer { margin-top: 20px; text-align: center; color: #888; font-size: 13px; }
    </style>
</head>
<body>

<div class="header">
    <h1 style="margin:0">📅 Sistem Jadwal Perkuliahan BAAK</h1>
    <p style="margin:4px 0 0">Universitas Catur Insan Cendekia (UCIC)</p>
</div>

<div class="info-bar">
    <strong>Tahun Akademik:</strong> {{ $tahunAkademik }} &nbsp;|&nbsp;
    <strong>Fakultas:</strong> {{ $fakultas }} &nbsp;|&nbsp;
    <strong>Total Jadwal:</strong> {{ count($daftarJadwal) }} &nbsp;|&nbsp;
    <strong>Total SKS:</strong> {{ $totalSks }} SKS
</div>

@if (count($daftarJadwal) > 0)
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Jadwal</th>
                <th>Mata Kuliah</th>
                <th>Dosen Pengampu</th>
                <th>Waktu</th>
                <th>Ruangan</th>
                <th>SKS</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarJadwal as $index => $jadwal)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $jadwal['id_jadwal'] }}</strong></td>
                    <td>{{ $jadwal['mataKuliah'] }}</td>
                    <td>{{ $jadwal['dosen'] }}</td>
                    <td>{{ $jadwal['waktu'] }}</td>
                    <td>{{ $jadwal['ruangan'] }}</td>
                    <td style="text-align:center">{{ $jadwal['sks'] }}</td>
                    <td>
                        @if ($jadwal['tipe'] === 'Teori')
                            <span class="badge badge-teori">🏫 Teori</span>
                        @elseif ($jadwal['tipe'] === 'Praktikum')
                            <span class="badge badge-praktikum">💻 Praktikum</span>
                        @elseif ($jadwal['tipe'] === 'Daring')
                            <span class="badge badge-daring">🌐 Daring</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('jadwal.show', $jadwal['id']) }}" class="btn">
                            Detail
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p style="color: red;">Tidak ada jadwal yang tersedia.</p>
@endif

<div class="footer">
    Nama: Radhitya Hafif &nbsp;|&nbsp; NIM: 20251020004 &nbsp;|&nbsp; PBO — Pertemuan 7
</div>

</body>
</html>
