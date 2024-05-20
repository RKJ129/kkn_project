<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'adminrahasia',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$OMGO7YqyLLruYsPEGH7roeOh0YSwqxGB7LPvDtm4o/GmH2PYBWmP.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
