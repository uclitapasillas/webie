<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'Siemens', 'description' => 'Siemens México', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pizzato', 'description' => 'Pizzato Italia', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
