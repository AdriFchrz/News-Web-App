<?php

namespace App\Database\Seeds;

use Faker\Factory;

class UserSeederTest extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => password_hash($faker->password, PASSWORD_DEFAULT),
            ];

            $this->db->table('users')->insert($data);
        }
    }
}
