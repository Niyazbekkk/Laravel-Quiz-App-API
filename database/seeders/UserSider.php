<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSider extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Tolibaev Niyazbek',
                'phone' => '+998907056963',
                'password' => Hash::make('1931'),
                'is_premium' => true,
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ametov Jasurbek',
                'phone' => '+998907055803',
                'password' => Hash::make('5020'),
                'is_premium' => true,
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sabirbaev Batirbek',
                'phone' => '+998990315912',
                'password' => Hash::make('3099'),
                'is_premium' => false,
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
