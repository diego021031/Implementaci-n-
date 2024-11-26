<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::insert([
            [
                'name' => 'categoria1',
                'url_clean' => 'categoria_1'
            ],
            [
                'name' => 'categoria2',
                'url_clean' => 'categoria_2'
            ],
            [
                'name' => 'categoria3',
                'url_clean' => 'categoria_3'
            ],
            [
                'name' => 'categoria4',
                'url_clean' => 'categoria_4'
            ],
            [
                'name' => 'categoria5',
                'url_clean' => 'categoria_5'
            ],
        ]);
    }
}
