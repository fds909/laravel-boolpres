<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Author;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $author_ids = Author::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $post = new Post();
            $post->author_id = Arr::random($author_ids);
            $post->title = $faker->text(10);
            $post->content = $faker->paragraph(2);
            $post->image = $faker->imageUrl();
            $post->slug = Str::slug($post->title, '-');

            $post->save();
        }
    }
}
