<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repositories\PostRepository $postRepository, \App\Repositories\UserRepository $userRepository, \App\Repositories\CommentRepository $commentRepository)
    {
        $faker = Faker\Factory::create();
        $posts = $postRepository->get();
        $users = $userRepository->get();
        foreach ($posts as $post) {
            foreach ($users as $user) {
                $commentRepository->create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'content' => $faker->paragraph()
                ]);
            }
        }
    }
}
