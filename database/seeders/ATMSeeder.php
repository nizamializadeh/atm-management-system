<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ATM;

class ATMSeeder extends Seeder
{
    public function run()
    {
        ATM::create([
            'value' => 1,
            'count' => 50,
        ]);
        ATM::create([
            'value' => 5,
            'count' => 30,
        ]);
        ATM::create([
            'value' => 10,
            'count' => 20,
        ]);
        ATM::create([
            'value' => 20,
            'count' => 10,
        ]);
        ATM::create([
            'value' => 50,
            'count' => 10,
        ]);

        ATM::create([
            'value' => 100,
            'count' => 10,
        ]);

        ATM::create([
            'value' => 200,
            'count' => 10,
        ]);
    }
}
