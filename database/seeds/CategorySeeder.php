<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Intervista', 'Recensioni', 'Sport', 'Natura', 'Gossip', 'Comici', 'Spettacolo', 'News', 'Makeup', 'Altro'];

        foreach ($categories as $categoryItem) {
            $category = new Category();
            $category->name = $categoryItem;
            $category->slug = Str::slug($category->name);
            $category->save();
        }
    }
}
