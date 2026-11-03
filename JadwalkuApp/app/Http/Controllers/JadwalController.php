<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Menampilkan daftar seluruh jadwal perkuliahan BAAK UCIC.
     * Konsep: Composition — data jadwal dirakit di Controller lalu dikirim ke View.
     */
    public function index()
    {
        $daftarJadwal = [
            [
                'id'          => 1,
                'id_jadwal'   => 'JDW-001',
                'mataKuliah'  => 'Pemrograman Berorientasi Objek',
                'dosen'       => 'Hilman Lesmana, S.T., M.S.F.',
                'ruangan'     => 'R.301',
                'waktu'       => 'Senin, 08:00 - 10:30 WIB',
                'sks'         => 3,
                'tipe'        => 'Teori',
                'deskripsi'   => 'Kuliah Teori Tatap Muka (Gedung A Kesambi, Kapasitas 45 Kursi)',
                'status_ruang'=> true,
            ],
            [
                'id'          => 2,
                'id_jadwal'   => 'JDW-002',
                'mataKuliah'  => 'Basis Data Lanjut',
                'dosen'       => 'Sari Rahmawati, M.Kom.',
                'ruangan'     => 'LAB.KOMP-01',
                'waktu'       => 'Selasa, 13:00 - 15:30 WIB',
                'sks'         => 3,
                'tipe'        => 'Praktikum',
                'deskripsi'   => 'Praktikum Laboratorium Komputer (Lab Software Engineering, 35 Unit PC)',
                'status_ruang'=> true,
            ],
            [
                'id'          => 3,
                'id_jadwal'   => 'JDW-003',
                'mataKuliah'  => 'Kecerdasan Buatan (AI)',
                'dosen'       => 'Dr. Irwan Setiawan, M.T.',
                'ruangan'     => 'Zoom Cloud UCIC',
                'waktu'       => 'Kamis, 09:30 - 12:00 WIB',
                'sks'         => 3,
                'tipe'        => 'Daring',
                'deskripsi'   => 'Perkuliahan Daring via Zoom Video Conference',
                'status_ruang'=> true,
            ],
        ];

        $tahunAkademik = 'Semester Ganjil 2026/2027';
        $fakultas      = 'Fakultas Teknologi Informasi';
        $totalSks      = array_sum(array_column($daftarJadwal, 'sks'));

        return view('jadwal.index', compact('daftarJadwal', 'tahunAkademik', 'fakultas', 'totalSks'));
    }

    /**
     * Menampilkan detail satu jadwal berdasarkan ID.
     * Konsep: Route dengan parameter — Polymorphism divisualisasikan via @if di Blade.
     */
    public function show(string $id)
    {
        $semuaJadwal = [
            1 => [
                'id'          => 1,
                'id_jadwal'   => 'JDW-001',
                'mataKuliah'  => 'Pemrograman Berorientasi Objek',
                'dosen'       => 'Hilman Lesmana, S.T., M.S.F.',
                'ruangan'     => 'R.301',
                'waktu'       => 'Senin, 08:00 - 10:30 WIB',
                'sks'         => 3,
                'tipe'        => 'Teori',
                'deskripsi'   => 'Kuliah Teori Tatap Muka (Gedung A Kesambi, Kapasitas 45 Kursi)',
                'aktivasi'    => 'Fasilitas AC, proyektor, dan sound system kelas telah disiapkan.',
                'akses'       => 'Presensi kartu mahasiswa / QR Code di pintu ruang R.301.',
                'status_ruang'=> true,
            ],
            2 => [
                'id'          => 2,
                'id_jadwal'   => 'JDW-002',
                'mataKuliah'  => 'Basis Data Lanjut',
                'dosen'       => 'Sari Rahmawati, M.Kom.',
                'ruangan'     => 'LAB.KOMP-01',
                'waktu'       => 'Selasa, 13:00 - 15:30 WIB',
                'sks'         => 3,
                'tipe'        => 'Praktikum',
                'deskripsi'   => 'Praktikum Laboratorium Komputer (Lab Software Engineering, 35 Unit PC)',
                'aktivasi'    => "Server lokal aktif, koneksi LAN stabil, dan lisensi 'MySQL Workbench & PostgreSQL' telah diverifikasi.",
                'akses'       => 'Login akun mahasiswa UCIC pada workstation di laboratorium LAB.KOMP-01.',
                'status_ruang'=> true,
            ],
            3 => [
                'id'          => 3,
                'id_jadwal'   => 'JDW-003',
                'mataKuliah'  => 'Kecerdasan Buatan (AI)',
                'dosen'       => 'Dr. Irwan Setiawan, M.T.',
                'ruangan'     => 'Zoom Cloud UCIC',
                'waktu'       => 'Kamis, 09:30 - 12:00 WIB',
                'sks'         => 3,
                'tipe'        => 'Daring',
                'deskripsi'   => 'Perkuliahan Daring via Zoom Video Conference',
                'aktivasi'    => 'Room meeting Zoom Video Conference telah dibuka dan link terhubung ke LMS.',
                'akses'       => 'Tautan: https://kuliah.ucic.ac.id/room/ai-meeting-jdw003 (Gunakan email resmi kampus).',
                'status_ruang'=> true,
            ],
        ];

        $jadwal = $semuaJadwal[$id] ?? null;

        return view('jadwal.show', compact('jadwal', 'id'));
    }
}
