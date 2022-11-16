<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = ['Pop', 'Rock', 'Metal', 'Country', 'Auto', 'Moto', 'Elettrico', 'Arte', 'Moda', 'Teatro', 'Viaggio'];

        foreach ($tags as $tagModel) {
            $tag = new Tag();
            $tag->name = $tagModel;
            $tag->slug = Str::slug($tag->name);
            $tag->save();
        }
    }
}
