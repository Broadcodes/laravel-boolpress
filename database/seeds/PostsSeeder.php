<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) {
            $post = new Post();
            $post->title = $faker->sentence(3);
            $post->description = $faker->paragraph();

            $slug = Str::slug($post->title);
            $slug_base = $slug;
            $counter = 1;
            $existingPost = Post::where('slug', $slug)->first();
            while($existingPost){
                $slug = $slug_base . '_' . $counter;
                $counter++;
                $existingPost = Post::where('slug', $slug)->first();
            }

            $post->slug = $slug;

            $post->save();
        }
    }
}
