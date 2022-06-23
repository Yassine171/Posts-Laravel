<?php

namespace Database\Factories;
use App\Models\post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     *@var string
     * @return array
     */
     protected $model = post::class;
    public function definition()
    {
         $title=$this->faker->realText($maxNbChars = 50, $indexSize = 2);
            return [
                'title' => $title,
                'slug' => Str::Slug($title),
                'body' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
                'image' => $this->faker->imageUrl(640,480)
            ];
             }
}
