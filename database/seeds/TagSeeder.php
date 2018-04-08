<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repository\TagRepository $tagRepository)
    {
        $tagRepository->create([
            'type' => 'openresty'
        ]);
        $tagRepository->create([
            'type' => 'lua'
        ]);
    }
}
