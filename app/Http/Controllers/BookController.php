<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use App\Http\Resources\BookResource;
use Spatie\QueryBuilder\QueryBuilder;
Use App\SearchFilters\BookCategoryFilter;
use App\Http\Requests\ValidateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = QueryBuilder::for(Book::class)
            ->allowedSorts(['author', 'price', 'title'])
            ->allowedFilters('author', Filter::custom('categories', BookCategoryFilter::class))
            ->get();
            
        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateBookRequest $request)
    {
        $book = Book::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
        ]);

        $categories = $request->category;

        if ($categories && ! empty($categories))
        {
            $category = array_map(function($name) {
                return Category::firstOrCreate(['name' => $name])->id;
            }, $categories);

            $book->categories()->attach($category);
        }
    
        return new BookResource($book);
    }
}
