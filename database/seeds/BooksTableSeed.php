<?php

use App\Book;
use App\Category;
use Illuminate\Database\Seeder;

class BooksTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = Book::create([
            'id' => 1,
            'isbn' => '978-1491918661',
            'title' => 'Learning PHP, MySQL & JavaScript: With jQuery, CSS, & HTML5',
            'author' => 'Robin Nixon',
            'price' => 9.99
        ]);

        $book->categories()->attach([1,2]);

        $book = Book::create([
            'id' => 2,
            'isbn' => '978-0596804848',
            'title' => 'Ubuntu: Up and Runnig: A Power User\'s Desktop Guide',
            'author' => 'Robin Nixon',
            'price' => 12.99
        ]);

        $book->categories()->attach([3]);

        $book = Book::create([
            'id' => 3,
            'isbn' => '978-1118999875',
            'title' => 'Linux Bible',
            'author' => 'Christopher Negus',
            'price' => 19.99
        ]);

        $book->categories()->attach([3]);

        $book = Book::create([
            'id' => 4,
            'isbn' => '978-0596517748',
            'title' => 'Javascript: The Good Parts',
            'author' => 'Douglas Crockford',
            'price' => 8.99
        ]);

        $book->categories()->attach([2]);
    }
}
