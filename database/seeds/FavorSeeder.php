<?php

use Illuminate\Database\Seeder;

class FavorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repository\UserRepository $userRepository, \App\Repository\PostRepository $postRepository, \App\Repository\FavorRepository $favorRepository)
    {
        $users = $userRepository->get();
        $posts = $postRepository->get();
        foreach ($users as $user) {
            $post = $posts->random();
            $favorRepository->create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
        }
    }
}
