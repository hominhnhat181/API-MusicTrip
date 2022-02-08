<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Album_Tag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class Album_TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album_Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'album_id'=>Album::all()->random()->id,
            'tag_id'=>Tag::all()->random()->id,

        ];
    }
}
