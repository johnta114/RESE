<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,10),
            'shop_id' => $this->faker->numberBetween(1,20),
            'reservation_date' => $this->faker->date(),
            'reservation_time' => $this->faker->time(),
            'number_people' => $this->faker->numberBetween(1,6),
        ];
    }
}
