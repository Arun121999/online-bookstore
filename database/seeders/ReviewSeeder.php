<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Book;
use App\Models\User;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $books = Book::pluck('id')->all();
        $users = User::pluck('id')->all();

        foreach ($books as $bookId) {
            foreach ($users as $userId) {
                Review::create([
                    'user_id' => $userId,
                    'book_id' => $bookId,
                    'rating' => $faker->numberBetween(1, 5),
                    'review' => $faker->paragraph,
                ]);
            }
        }
    }
}
