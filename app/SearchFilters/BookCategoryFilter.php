<?php

namespace App\SearchFilters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class BookCategoryFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property) : Builder
    {
        return $query->whereHas('categories', function (Builder $query) use ($value) {
            $query->where('name', $value);
        });
    }
}