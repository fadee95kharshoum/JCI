<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $clientRole = Role::where('name', 'client')->first();
       
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'balance'=> 1000,
            'rate'=>'silver'

        ]);

        $client = User::create([
            'name' => 'client',
            'email' => 'client@client.com',
            'password' => Hash::make('12345678'),
            'balance'=> 0,
            'rate'=>'selver'
        ]);
        $admin->roles()->attach($adminRole);
        $client->roles()->attach($clientRole);
    }
}
