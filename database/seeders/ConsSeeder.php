<?php

namespace Database\Seeders;

use App\Models\Consultation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsSeeder extends Seeder
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
            Consultation::create([
                'con_section' => 'General',
                'con_content' => 'consultation by seeder'.$i,
                'username' => 'first',
            ]);
        }
    }
}
