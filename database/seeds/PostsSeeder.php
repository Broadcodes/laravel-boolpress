<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Posts;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) {
            $post = new Posts();
            $post->title = $faker->sentence(3);
            $post->description = $faker->paragraph();

            $slug = Str::slug($post->title);
            $slug_base = $slug;
            $counter = 1;
            $existingPost = Posts::where('slug', $slug)->first();
            while($existingPost){
                $slug = $slug_base . '_' . $counter;
                $counter++;
                $existingPost = Posts::where('slug', $slug)->first();
            }

            $post->slug = $slug;

            $post->save();
        }
    }
}
