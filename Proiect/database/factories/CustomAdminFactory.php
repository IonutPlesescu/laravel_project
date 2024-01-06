<?php

namespace Database\Factories;

use App\Models\CustomAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomAdmin>
 */
class CustomAdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomAdmin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName,
            'parola' => bcrypt('your_password'), // Setați aici parola dorită pentru CustomAdmin
            'email' => $this->faker->unique()->safeEmail,
            'numar_de_telefon' => $this->faker->phoneNumber,
           
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
