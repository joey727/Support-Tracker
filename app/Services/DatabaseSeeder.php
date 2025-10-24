<?php
namespace App\Services;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Activity;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create sample users and activities
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        Activity::create([
            'title' => 'Daily SMS count in comparison to SMScount from logs',
            'description' => 'Compare daily SMS counters reported by the system vs logs.',
        ]);
    }
}
