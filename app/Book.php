<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'price',
    ];

     /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'categories'
    ];

    /**
     * Get the list of categories attached to the book.
     *
     * @return array
     */
    public function getCategoryNames()
    {
        return $this->categories->pluck('name')->toArray();
    }

    /**
     * Get all the categories that belong to the book.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
