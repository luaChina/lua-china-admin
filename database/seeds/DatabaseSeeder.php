<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(TagSeeder::class);
         $this->call(PostSeeder::class);
         $this->call(CommentSeeder::class);
         $this->call(FavorSeeder::class);
    }
}
