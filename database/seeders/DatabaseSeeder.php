<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleSeeder::class);
        $this->call(ProgrammeSeeder::class);
        User::factory()->create();

        //        User::factory()->create([
        //            'name' => 'admin',
        //            'email' => 'admin@softui.com',
        //            'password' => Hash::make('secret')
        //        ]);
    }
}
