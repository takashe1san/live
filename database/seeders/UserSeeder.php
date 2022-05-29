<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 10; $i++) { 
            # code...
            User::create([
                'username' => Str::random(10),
                'name'     => 'seeder'.$i,
                'email'    => Str::random(10).'@seeder.com',
                'password' => md5('testuser'),
                'birth'    => date('Y-m-d'),
            ]);
        }
    }
}
