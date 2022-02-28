<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class UsersTableSeeder extends Seeder
{
    private $users = [
        [
        'name' => 'admin',
        'email' => 'syota.u1104@gmail.com',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'role' => 4,
        'remember_token' => 'fnuaAu35nt'
        ],
        [
        'name' => 'test',
        'email' => 'test@gmail.com',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'role' => 14,
        'remember_token' => 'AnuaAu35nt'
        ],
];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $user) {
            DB::table("users")->insert($user);
        }
    }
}
