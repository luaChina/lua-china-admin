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
        if (config('app.env') === 'production') {
            $this->call(AdminSeeder::class);
            $this->call(PostTagSeeder::class);
        } else {
            $this->call(AdminSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(PostTagSeeder::class);
            $this->call(PostSeeder::class);
            $this->call(CommentSeeder::class);
            $this->call(FavorSeeder::class);
        }
    }
}
