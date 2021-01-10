<?php

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
            'name' => 'Bayam',
            'desc' => 'Harga per ikat',
            'price' => 3500,
            'image' => 'spinach.jpg',
            ],
            [
            'name' => 'Kacang Panjang',
            'desc' => 'Harga per ikat',
            'price' => 2000,
            'image' => 'beans.png',
            ],
            [
            'name' => 'Kangkung',
            'desc' => 'Harga per ikat',
            'price' => 3000,
            'image' => 'kale.jpg',
            ],
            [
            'name' => 'Tomat',
            'desc' => 'Harga per 1kg',
            'price' => 8000,
            'image' => 'tomato.jpg',
            ],
            [
            'name' => 'Tauge',
            'desc' => 'Harga per 100 gram',
            'price' => 4000,
            'image' => 'tauge.png',
            ],
            [
            'name' => 'Bawang merah',
            'desc' => 'Harga per 1kg',
            'price' => 25000,
            'image' => 'shallot.jpg',
            ],
            [
            'name' => 'Bawang Putih',
            'desc' => 'Harga per 1kg',
            'price' => 20000,
            'image' => 'garlic.jpg',
            ],
        ]);
    }
}
