<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('doctors')->insert([
            [
                'name' => 'Ana',
                'specialty' => 'Cardiologia',
                'professional_license' => '123',
            ],
            [
                'name' => 'Juan',
                'specialty' => 'Neurologia',
                'professional_license' => '1234',
            ],
            [
                'name' => 'Gabriel',
                'specialty' => 'Pediatria',
                'professional_license' => '678',
            ],
        ]);
    }
}
