<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;
    private static $order = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'code' => 'CO-' . self::$order++,
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'district' => $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'fax' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'liable' => $this->faker->name(),
            'others' => $this->faker->paragraph()
        ];
    }
}
