<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Skema;
use App\Models\Peserta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Default untuk Login
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // 2. Membuat 5 Data Skema Sertifikasi
        $skema1 = Skema::create([
            'kode_skema' => 'SKM-001',
            'nama_skema' => 'Junior Web Developer',
            'jenis' => 'Okupasi',
            'jumlah_unit' => 6
        ]);

        $skema2 = Skema::create([
            'kode_skema' => 'SKM-002',
            'nama_skema' => 'Network Administrator',
            'jenis' => 'Okupasi',
            'jumlah_unit' => 8
        ]);

        $skema3 = Skema::create([
            'kode_skema' => 'SKM-003',
            'nama_skema' => 'Digital Marketing Specialist',
            'jenis' => 'Klaster',
            'jumlah_unit' => 5
        ]);

        $skema4 = Skema::create([
            'kode_skema' => 'SKM-004',
            'nama_skema' => 'Graphic Designer Junior',
            'jenis' => 'Klaster',
            'jumlah_unit' => 4
        ]);

        $skema5 = Skema::create([
            'kode_skema' => 'SKM-005',
            'nama_skema' => 'Data Analyst',
            'jenis' => 'KKNI',
            'jumlah_unit' => 10
        ]);

        // 3. Membuat 5 Data Peserta (Masing-masing terhubung ke ID Skema di atas)
        Peserta::create([
            'nik' => '3171010000000001',
            'nama_peserta' => 'Ahmad Rian',
            'email' => 'ahmad.rian@email.com',
            'no_hp' => '081234567890',
            'skema_id' => $skema1->id // Terhubung ke Junior Web Developer
        ]);

        Peserta::create([
            'nik' => '3171010000000002',
            'nama_peserta' => 'Siti Aminah',
            'email' => 'siti.aminah@email.com',
            'no_hp' => '082198765432',
            'skema_id' => $skema2->id // Terhubung ke Network Administrator
        ]);

        Peserta::create([
            'nik' => '3171010000000003',
            'nama_peserta' => 'Budi Santoso',
            'email' => 'budi.san@email.com',
            'no_hp' => '085611223344',
            'skema_id' => $skema3->id // Terhubung ke Digital Marketing
        ]);

        Peserta::create([
            'nik' => '3171010000000004',
            'nama_peserta' => 'Citra Lestari',
            'email' => 'citra.les@email.com',
            'no_hp' => '087855667788',
            'skema_id' => $skema4->id // Terhubung ke Graphic Designer
        ]);

        Peserta::create([
            'nik' => '3171010000000005',
            'nama_peserta' => 'Dedi Wijaya',
            'email' => 'dedi.wijaya@email.com',
            'no_hp' => '089922334455',
            'skema_id' => $skema5->id // Terhubung ke Data Analyst
        ]);
    }
}
