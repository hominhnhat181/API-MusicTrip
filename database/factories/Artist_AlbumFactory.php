<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Artist_Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class Artist_AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artist_Album::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artist_id'=>Artist::all()->random()->id,
            'album_id'=>Album::all()->random()->id,
        ];
    }
}
