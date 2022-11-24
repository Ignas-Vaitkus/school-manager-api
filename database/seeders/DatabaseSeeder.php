<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles[] = new Role();
        $roles[] = new Role();
        $roles[0]->name = 'admin';
        $roles[1]->name = 'user';
        $roles[0]->save();
        $roles[1]->save();

        $user = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' => $roles[0]->id
        ]);

        \App\Models\School::create([
            'code' => 123456789,
            'name' => 'Saules gimnazija',
            'address' => 'Savanoriu pr. XX',
        ]);
    }
}
