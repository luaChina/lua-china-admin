<?php

use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repositories\PostTagRepository $postTagRepository)
    {
        $postTagRepository->create([
            'type' => 'openresty'
        ]);
        $postTagRepository->create([
            'type' => 'lua'
        ]);
    }
}
