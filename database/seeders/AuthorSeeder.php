<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Faker\Factory as Faker;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Author::create([
                'name' => $faker->name,
            ]);
        }
    }
}
