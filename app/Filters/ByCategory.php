<?php

declare(strict_types=1);

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ByCategory
{
    public function __construct(public Request $request) {}

    public function handle(Builder $query, Closure $next)
    {
        $query->when(
            $this->request->filled('category'),
            function ($query) {
                $category = $this->request->category;

                $query->whereHas('categories', function ($query) use ($category) {
                    $query->where('name', 'like', "%{$category}%");
                });
            }
        );

        return $next($query);
    }
}
