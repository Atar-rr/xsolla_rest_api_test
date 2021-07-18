<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('product_types')->insert([
            'name' => 'Игровая валюта',
        ]);

        DB::table('product_types')->insert([
            'name' => 'Игры',
        ]);

        DB::table('product_types')->insert([
            'name' => 'Мерч',
        ]);
    }
}
