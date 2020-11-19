<?php

namespace Database\Factories;

use App\Models\Episode;
use App\Models\Cours;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'description'=>$this->faker->paragraphs(3,true),
            'video_url'=>'mavideo.com'.rand(10,255),
            'cours_id'=>Cours::all()->random()->id
        ];
    }
}
