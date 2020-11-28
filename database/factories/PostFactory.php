<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
             'user_id'=> User::factory(),
            'content' => $this->faker->paragraph(),
            'image' => $this->faker->randomElement(['img.jpg','img2.jpg']),
            'category' => $this->faker->randomElement(['Programacion BackEnd','Programacion FrontEnd'])
        ];
    }
}
