<?php

use Illuminate\Database\Seeder;
use App\Models\Author;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $genders = ['male', 'female', 'other'];

        for ($i = 0; $i < 5; $i++) {
            $author = new Author();
            $current_gender = Arr::random($genders);
            $author->gender = $current_gender;

            $author->name = $faker->firstName($gender = $current_gender);
            $author->surname = $faker->lastName();

            $author->save();
        }
    }
}
