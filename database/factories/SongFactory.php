<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(15),
            'image' => 'assets/frontend/images/origin.png',
            'song'=>$this->faker->text(100),
            'artist_id'=>Artist::all()->random()->id,
            'album_id'=>Album::all()->random()->id,
            'tag_id'=>Tag::all()->random()->id,
            'status' => mt_rand(1, 2),
        ];
    }
}
