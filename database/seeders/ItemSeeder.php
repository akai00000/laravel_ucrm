<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'カット',
                'memo' => 'カットの詳細',
                'price' => 6000,
            ],
            [
                'name' => 'パーマ（カット込）',
                'memo' => 'パーマの詳細',
                'price' => 12000,
            ],
            [
                'name' => 'カラー（カット込）',
                'memo' => 'カラーの詳細',
                'price' => 11000,
            ],
            
        ]);
    }
}
