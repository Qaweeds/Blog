<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3, 8), true);
        $text = $this->faker->realText(rand(1000, 3000));
        $is_published = rand(1, 5) > 1;
        $created_at = $this->faker->dateTimeBetween('-3 months', '-2 months');
        return [
            'category_id' => rand(1, 11),
            'user_id' => (rand(1, 5) == 5) ? 1 : 2,
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->text(rand(40, 100)),
            'content_raw' => $text,
            'content_html' => $text,
            'is_published' => $is_published,
            'published_at' => $is_published ? $this->faker->dateTimeBetween('-2 months', '-1 days') : null,
            'created_at' => $created_at,
            'updated_at' => $created_at
        ];
    }
}
