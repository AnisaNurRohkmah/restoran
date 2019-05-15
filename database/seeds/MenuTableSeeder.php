<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Menu::create([
            'namamenu' => 'Ayam Bakar Rica Rica',
            'harga' => 45000
        ]);

        Menu::create([
            'namamenu' => 'Lemon Tea',
            'harga' => 15000
        ]);
    }
}
