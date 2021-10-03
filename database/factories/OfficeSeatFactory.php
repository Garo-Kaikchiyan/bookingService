<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\OfficeSeat;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficeSeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OfficeSeat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName(),
            'office_id' => Office::factory(),
        ];
    }
}
