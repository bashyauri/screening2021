<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TbAccouncreationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jambNo = '2023' . $this->faker->numerify('########') . $this->faker->lexify('??');

        return [
            'account_id' => $this->faker->unique()->randomNumber(),
            'surname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'm_name' => $this->faker->firstName,
            'programme_id' => $this->faker->randomElement([1, 4]),
            'email' => $this->faker->unique()->safeEmail,
            'p_number' => $this->faker->unique()->phoneNumber,
            'password' => bcrypt('password'),
            'vpassword' => bcrypt('password'),
            'complate' => 0,
            'jamb_no' => $jambNo,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
