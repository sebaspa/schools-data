<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;
    private static $order = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        self::$order++;
        Storage::makeDirectory('public/schools/'.self::$order);
        return [
            //
            'code' => 'CO-' . self::$order,
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'district' => $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'fax' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'liable' => $this->faker->name(),
            'image' => $this->faker->image('public/storage/schools/'. self::$order, 1560, 600, 'city', false),
            'others' => $this->faker->paragraph()
        ];
    }
}
