<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users = factory(User::class, 2)->create([
        //     'role' => 'admin',
        //     'password' => Hash::make($user->email),
        // ]);
        // $users[0]->update([
        //     ''
        // ]);
        
        $users = User::factory(2)->create([
            'role' => 'admin',
        ]);
        $users[0]->update([
            'name' => 'Patrick',
            'username' => 'Parhode',
            'firstname' => 'KABAMBA',
            'lastname' => 'MUKULWE',
            'email' => 'patrick@gmail.com',
            'phone' => '0827871236',
            'password' => Hash::make('patrick@gmail.com'),
        ]);
        $users[1]->update([
            'name' => 'Fabien',
            'username' => '@Empire',
            'firstname' => 'KAKULE',
            'lastname' => 'KALYAMUNWANI',
            'email' => 'fabien02kaly@gmail.com',
            'phone' => '0831160491',
            'password' => Hash::make('fabien02kaly@gmail.com'),
        ]);
    }
}
