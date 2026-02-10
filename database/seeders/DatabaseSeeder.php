<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Hash;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'hildhan',
            'email' => 'hildhan@gmail.com',
            'password' => Hash::make('hildhan'),
            'peran' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'gery',
            'email' => 'gery@gmail.com',
            'password' => Hash::make('gery'),
            'peran' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'kadek',
            'email' => 'kadek@gmail.com',
            'password' => Hash::make('kadek'),
            'peran' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'penjual',
            'email' => 'penjual@gmail.com',
            'password' => Hash::make('penjual123'),
            'peran' => 'penjual',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'pembeli',
            'email' => 'pembeli@gmail.com',
            'password' => Hash::make('pembeli123'),
            'peran' => 'pembeli',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        
    }
}
