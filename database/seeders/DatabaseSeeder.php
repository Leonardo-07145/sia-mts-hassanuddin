<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guru;
use App\Models\User;
use App\Models\Gender;
use App\Models\Pendidikan;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Mapel;
use App\Models\Jadwal;
use App\Models\Hari;
use App\Models\JenisPembayaran;
use App\Models\JenisPresensi;
use App\Models\JenisTahunAjaran;
use App\Models\Presensi;
use App\Models\Nilai;
use App\Models\TanggalPresensi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Petugas TU',
            'email' => 'tu@gmail.com',
            'password' => Hash::make('12345')
        ]);

        User::create([
            'name' => 'Kesiswaan',
            'email' => 'kesiswaan@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 1
        ]);

        User::create([
            'kelas_id' => 1,
            'name' => 'Wali Kelas 7',
            'email' => 'walikelas7@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 2,
        ]);

        User::create([
            'kelas_id' => 2,
            'name' => 'Wali Kelas 8',
            'email' => 'walikelas8@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 2,
        ]);

        User::create([
            'kelas_id' => 3,
            'name' => 'Wali Kelas 9',
            'email' => 'walikelas9@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 2,
        ]);

        User::create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepalasekolah@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 3,
        ]);

        Guru::create([
            'nuptk' => '1',
            'nama' => 'Leonardo',
            'tgl_lahir' => '1991-10-11',
            'gender_id' => 1,
            'pendidikan_id' => 2,
            'alamat' => 'Dawarblandong',
            'no_telp' => '0932493241'
        ]);

        Guru::create([
            'nuptk' => '12',
            'nama' => 'Alex',
            'tgl_lahir' => '1992-10-11',
            'gender_id' => 2,
            'pendidikan_id' => 1,
            'alamat' => 'Gedeg',
            'no_telp' => '0932493242'
        ]);

        Guru::create([
            'nuptk' => '1245',
            'nama' => 'Tegar',
            'tgl_lahir' => '1993-10-11',
            'gender_id' => 1,
            'pendidikan_id' => 1,
            'alamat' => 'Dawarblandong',
            'no_telp' => '0932493243'
        ]);

        Guru::create([
            'nuptk' => '12345',
            'nama' => 'Habib',
            'tgl_lahir' => '1994-10-11',
            'gender_id' => 2,
            'pendidikan_id' => 2,
            'alamat' => 'Jetis',
            'no_telp' => '0932493244'
        ]);

        Gender::create([
            'nama' => 'Laki-laki'
        ]);

        Gender::create([
            'nama' => 'Perempuan'
        ]);
        
        Kelas::create([
            'nama' => 7
        ]);

        Kelas::create([
            'nama' => 8
        ]);
        
        Kelas::create([
            'nama' => 9
        ]);

        Pendidikan::create([
            'nama' => 'SMA'
        ]);

        Pendidikan::create([
            'nama' => 'S1'
        ]);

        Pendidikan::create([
            'nama' => 'S2'
        ]);

        Pendidikan::create([
            'nama' => 'S3'
        ]);

        Siswa::create([
            'gender_id' => 1,
            'kelas_id' => 1,
            'nisn' => '0908091',
            'email' => 'habib@gmail.com',
            'password' => Hash::make('1999-10-11'),
            'nama' => 'Habib',
            'alamat' => 'Dawarblandong',
            'tgl_lahir' => '1999-10-11',
            'no_telp' => '0932493243'
        ]);

        Siswa::create([
            'gender_id' => 2,
            'kelas_id' => 1,
            'nisn' => '0908092',
            'email' => 'fitri@gmail.com',
            'password' => Hash::make('1999-10-11'),
            'nama' => 'Fitri',
            'alamat' => 'Dawarblandong',
            'tgl_lahir' => '1999-10-11',
            'no_telp' => '0932493243'
        ]);

        Siswa::create([
            'gender_id' => 1,
            'kelas_id' => 2,
            'nisn' => '0908093',
            'email' => 'alex@gmail.com',
            'password' => Hash::make('1999-10-11'),
            'nama' => 'Alex',
            'alamat' => 'Jetis',
            'tgl_lahir' => '1999-10-11',
            'no_telp' => '0932493243'
        ]);

        Siswa::create([
            'gender_id' => 2,
            'kelas_id' => 2,
            'nisn' => '0908094',
            'email' => 'suliati@gmail.com',
            'password' => Hash::make('1999-10-11'),
            'nama' => 'Suliati',
            'alamat' => 'Gedeg',
            'tgl_lahir' => '1999-10-11',
            'no_telp' => '0932493243'
        ]);

        Siswa::create([
            'gender_id' => 1,
            'kelas_id' => 3,
            'nisn' => '0908095',
            'email' => 'indy@gmail.com',
            'password' => Hash::make('1999-10-11'),
            'nama' => 'Indy',
            'alamat' => 'Gedeg',
            'tgl_lahir' => '1999-10-11',
            'no_telp' => '0932493243'
        ]);

        Siswa::create([
            'gender_id' => 2,
            'kelas_id' => 3,
            'nisn' => '0908096',
            'email' => 'anin@gmail.com',
            'password' => Hash::make('1999-10-11'),
            'nama' => 'Anin',
            'alamat' => 'Dawarblandong',
            'tgl_lahir' => '1999-10-11',
            'no_telp' => '0932493243'
        ]);

        JenisPembayaran::create([
            'nama' => 'Pengembangan Madrasah',
            'harga' => 50000
        ]);

        JenisPembayaran::create([
            'nama' => 'Kegiatan Keorganisasian',
            'harga' => 40000
        ]);

        JenisPembayaran::create([
            'nama' => 'Kegiatan Ekstra Kurikuler',
            'harga' => 45000
        ]);

        JenisPembayaran::create([
            'nama' => 'Buku Lembar Kerja Siswa',
            'harga' => 70000
        ]);

        JenisPembayaran::create([
            'nama' => 'Atribut Madrasah',
            'harga' => 20000
        ]);

        JenisTahunAjaran::create([
            'nama' => '2021/2022'
        ]);

        JenisTahunAjaran::create([
            'nama' => '2022/2023'
        ]);

        JenisTahunAjaran::create([
            'nama' => '2023/2024'
        ]);

        Pembayaran::create([
            'siswa_id' => 1,
            'jenispembayaran_id' => 1,
            'jenistahunajaran_id' => 2,
            'tgl_pembayaran' => '2023-05-11'
        ]);

        Pembayaran::create([
            'siswa_id' => 1,
            'jenispembayaran_id' => 2,
            'jenistahunajaran_id' => 2,
            'tgl_pembayaran' => '2023-05-09'
        ]);

        Pembayaran::create([
            'siswa_id' => 2,
            'jenispembayaran_id' => 3,
            'jenistahunajaran_id' => 2,
            'tgl_pembayaran' => '2023-05-10'
        ]);

        Pembayaran::create([
            'siswa_id' => 2,
            'jenispembayaran_id' => 4,
            'jenistahunajaran_id' => 2,
            'tgl_pembayaran' => '2023-05-15'
        ]);

        Pembayaran::create([
            'siswa_id' => 3,
            'jenispembayaran_id' => 1,
            'jenistahunajaran_id' => 2,
            'tgl_pembayaran' => '2023-05-20'
        ]);
        
        Pembayaran::create([
            'siswa_id' => 3,
            'jenispembayaran_id' => 2,
            'jenistahunajaran_id' => 2,
            'tgl_pembayaran' => '2023-05-18'
        ]);

        Hari::create([
            'nama' => 'Senin'
        ]);

        Hari::create([
            'nama' => 'Selasa'
        ]);

        Hari::create([
            'nama' => 'Rabu'
        ]);

        Hari::create([
            'nama' => 'Kamis'
        ]);
        
        Hari::create([
            'nama' => 'Jumat'
        ]);

        Hari::create([
            'nama' => 'Sabtu'
        ]);

        Mapel::create([
            'nama' => 'IPA'
        ]);

        Mapel::create([
            'nama' => 'Akidah Akhlak'
        ]);

        Mapel::create([
            'nama' => 'Bahasa Indonesia'
        ]);

        Mapel::create([
            'nama' => 'Bahasa Inggris'
        ]);

        Mapel::create([
            'nama' => 'Matematika'
        ]);

        Mapel::create([
            'nama' => 'Bahasa Arab'
        ]);

        Jadwal::create([
            'kelas_id' => 1,
            'guru_id' => 3,
            'hari_id' => 1,
            'mapel_id' => 1,
            'jam_mulai' => '07:00',
            'jam_berakhir' => '08:00'
        ]);

        Jadwal::create([
            'kelas_id' => 1,
            'guru_id' => 1,
            'hari_id' => 1,
            'mapel_id' => 2,
            'jam_mulai' => '08:00',
            'jam_berakhir' => '09:00'
        ]);

        Jadwal::create([
            'kelas_id' => 2,
            'guru_id' => 2,
            'hari_id' => 1,
            'mapel_id' => 3,
            'jam_mulai' => '07:00',
            'jam_berakhir' => '08:00'
        ]);

        Jadwal::create([
            'kelas_id' => 2,
            'guru_id' => 1,
            'hari_id' => 1,
            'mapel_id' => 4,
            'jam_mulai' => '08:00',
            'jam_berakhir' => '09:00'
        ]);

        Jadwal::create([
            'kelas_id' => 3,
            'guru_id' => 3,
            'hari_id' => 1,
            'mapel_id' => 3,
            'jam_mulai' => '07:00',
            'jam_berakhir' => '08:00'
        ]);

        Jadwal::create([
            'kelas_id' => 3,
            'guru_id' => 1,
            'hari_id' => 1,
            'mapel_id' => 6,
            'jam_mulai' => '08:00',
            'jam_berakhir' => '09:00'
        ]);

        JenisPresensi::create([
            'nama' => 'Masuk'
        ]);

        JenisPresensi::create([
            'nama' => 'Sakit'
        ]);

        JenisPresensi::create([
            'nama' => 'Izin'
        ]);

        JenisPresensi::create([
            'nama' => 'Alpa'
        ]);

        TanggalPresensi::create([
            'walikelas_id' => 3,
            'tgl_presensi' => '2023-05-18'
        ]);

        TanggalPresensi::create([
            'walikelas_id' => 3,
            'tgl_presensi' => '2023-05-19'
        ]);

        Presensi::create([
            'tgl_presensi_id' => 1,
            'siswa_id' => 1,
            'jenispresensi_id' => 1,
        ]);

        Presensi::create([
            'tgl_presensi_id' => 2,
            'siswa_id' => 1,
            'jenispresensi_id' => 1,
        ]);

        Nilai::create([
            'siswa_id' => 1,
            'mapel_id' => 1,
            'tugas1' => 80,
            'tugas2' => 87,
            'harian1' => 78,
            'harian2' => 85,
            'uts' => 89,
            'uas' => 90,
        ]);
    }
}
