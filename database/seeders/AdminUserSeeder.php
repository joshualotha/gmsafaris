<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::create([
            'name' => 'Admin',
            'email' => 'admin@gmsafaris.co.tz',
            'password' => Hash::make('password'),
        ]);

        $this->command->info('Admin user created: admin@gmsafaris.co.tz / password');
    }
}
