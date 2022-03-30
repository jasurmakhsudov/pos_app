<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            Product::create([
                'name' => 'CОК DENA 1Л BИШНЯ-ЯБЛОКО',
                'barcode' => '4780016370118',
                'cost' => '1000000',
                'price' => '1200000',
                'qty' => '100',
            ]);
            Product::create([
                'name' => 'DENA Odiy',
                'barcode' => '2110126324664',
                'cost' => '1300000',
                'price' => '1500000',
                'qty' => '50',
            ]);
            Product::create([
                'name' => 'DENA qim',
                'barcode' => '2110126324671',
                'cost' => '1600000',
                'price' => '1700000',
                'qty' => '20',
            ]);
            Product::create([
                'name' => 'сок DENA 1л. мохито',
                'barcode' => '4780016370903',
                'cost' => '1100000',
                'price' => '1200000',
                'qty' => '10',
            ]);
            Product::create([
                'name' => 'DENA ПЕРСИК',
                'barcode' => '4780016370095',
                'cost' => '1900000',
                'price' => '2500000',
                'qty' => '70',
            ]);
            Product::create([
                'name' => 'Грушево-яблочный нектар Denazavrik',
                'barcode' => '4780016370866',
                'cost' => '1300000',
                'price' => '1600000',
                'qty' => '14',
            ]);
    }
}
