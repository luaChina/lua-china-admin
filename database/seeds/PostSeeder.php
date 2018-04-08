<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repository\PostRepository $postRepository, \App\Repository\TagRepository $tagRepository, \App\Repository\UserRepository $userRepository)
    {
        $faker = Faker\Factory::create();
        $tags = $tagRepository->get();
        $users = $userRepository->get();
        foreach ($tags as $tag) {
            foreach ($users as $user) {
                $postRepository->create([
                    'tag_id' => $tag->id,
                    'user_id' => $user->id,
                    'title' => $faker->paragraph(),
                    'content' => $faker->paragraph(),
                    'thumbnail' => $faker->imageUrl(),
                    'read_count' => mt_rand(1, 10000),
                ]);
            }
        }
    }
}
