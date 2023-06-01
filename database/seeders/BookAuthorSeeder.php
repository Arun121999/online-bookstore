<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class BookAuthorSeeder extends Seeder
{
    public function run()
    {
        $books = Book::pluck('id')->all();
        $authors = Author::pluck('id')->all();

        foreach ($books as $bookId) {
            shuffle($authors);
            $randomAuthors = array_slice($authors, 0, rand(1, 3));

            foreach ($randomAuthors as $authorId) {
                Book::find($bookId)->authors()->attach($authorId);
            }
        }
    }
}
