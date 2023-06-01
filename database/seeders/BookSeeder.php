<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Book::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 10, 100),
                'category_id' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
