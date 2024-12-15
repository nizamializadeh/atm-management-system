<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        Account::create([
            'card_name' => 'Nizami Alizada Card',
            'pin' => bcrypt('1234'),
            'balance' => 1000.50,
            'user_id' => 2,
        ]);

        Account::create([
            'card_name' => 'User Card',
            'pin' => bcrypt('1234'),
            'balance' => 500.00,
            'user_id' => 3,
        ]);
    }
}
