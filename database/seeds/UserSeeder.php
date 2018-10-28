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
        $userRepository->create([
            'name'     => 'horan',
            'avatar'   => $faker->imageUrl(),
            'email'    => $faker->safeEmail,
            'phone'    => '86_13571899655',
            'password' => md5('123456')
        ]);
        for ($i = 0; $i < 31; $i++) {
            $userRepository->create([
                'name'     => $faker->name(),
                'avatar'   => $faker->imageUrl(),
                'email'    => $faker->safeEmail,
                'phone'    => $faker->phoneNumber,
                'password' => md5('123456')
            ]);
        }
    }
}
