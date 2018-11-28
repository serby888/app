<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('warehouses')->insert([

            [
                'name' => 'Warehouse A',
                'code' => 'A'
            ],
            [
                'name' => 'Warehouse B',
                'code' => 'B'
            ]

        ]);

        DB::table('items')->insert([

            [
                'name' => 'Produkt 001',
                'price' => '2.50'
            ],
            [
                'name' => 'Produkt 002',
                'price' => '7.25'
            ],
            [
                'name' => 'Produkt 005',
                'price' => '0.50'
            ],
            [
                'name' => 'Produkt 007',
                'price' => '6.25'
            ],
            [
                'name' => 'Produkt 008',
                'price' => '1.56'
            ],
            [
                'name' => 'Produkt 010',
                'price' => '4.23'
            ],
            [
                'name' => 'Produkt 015',
                'price' => '5.22'
            ],

        ]);

        DB::table('states')->insert([

            [
                'item_id' => 1,
                'warehouse_id' => 1,
                'quantity' => 5
            ],
            [
                'item_id' => 1,
                'warehouse_id' => 2,
                'quantity' => 3
            ],
            [
                'item_id' => 2,
                'warehouse_id' => 1,
                'quantity' => 10
            ],
            [
                'item_id' => 2,
                'warehouse_id' => 2,
                'quantity' => 0
            ],
            [
                'item_id' => 3,
                'warehouse_id' => 1,
                'quantity' => 0
            ],
            [
                'item_id' => 3,
                'warehouse_id' => 2,
                'quantity' => 5
            ],
            [
                'item_id' => 5,
                'warehouse_id' => 1,
                'quantity' => 3
            ],
            [
                'item_id' => 5,
                'warehouse_id' => 2,
                'quantity' => 1
            ],
            [
                'item_id' => 7,
                'warehouse_id' => 1,
                'quantity' => 1
            ],
            [
                'item_id' => 7,
                'warehouse_id' => 2,
                'quantity' => 0
            ],
        ]);
    }
}
