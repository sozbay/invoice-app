<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer')->insert([

            [
                'name' => 'sefa',
                'surname' => 'özbay',
                'email' => 'sozbay23@gmail.com',
                'address' => 'Bağcılar / İstanbul',
                'phone' => '05377362323'
            ],
            [
            'name' => 'Ali',
            'surname' => 'Demir',
            'email' => 'test@gmail.com',
            'address' => 'Esenler / İstanbul',
            'phone' => '05377362323'
        ],
            [
                'name' => 'Ahmet Çelik',
                'surname' => 'deneme',
                'email' => 'deneme@gmail.com',
                'address' => 'Tuzla / İstanbul',
                'phone' => '05376754671'
            ]

        ]);
    }
}
