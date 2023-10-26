<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item')->insert([
            'nama'=>'Monitor',
            'nomor_item'=>'1',
            'kategori'=>'Elektronik',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('item')->insert([
            'nama'=>'Mouse',
            'nomor_item'=>'2',
            'kategori'=>'Elektronik',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('item')->insert([
            'nama'=>'Printer',
            'nomor_item'=>'3',
            'kategori'=>'Elektronik',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
