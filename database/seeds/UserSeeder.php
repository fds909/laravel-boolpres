<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        $user = new User();

        $user->name = 'admin';
        $user->email = 'admin@posts.it';
        $user->password = bcrypt('admin');

        $user->save();
    }
}
