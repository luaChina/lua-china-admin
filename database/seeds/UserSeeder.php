<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Repositories\UserRepository $userRepository)
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 32; $i++) {
            $userRepository->create([
                'name'     => $faker->name(),
                'avatar'   => $faker->imageUrl(),
                'email'    => $faker->safeEmail,
                'phone'    => $faker->phoneNumber,
                'password' => bcrypt('123456')
            ]);
        }
    }
}
