<?php

namespace Database\Seeders;

use App\Models\Programme;
use Illuminate\Database\Seeder;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programmes = [
            ['name' => 'National Diploma', 'abv' => 'ND'],
            ['name' => 'Nigeria Certificate in Education', 'abv' => 'NCE']
        ];
        Programme::insert($programmes);
    }
}
