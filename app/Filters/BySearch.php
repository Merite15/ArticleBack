<?php

declare(strict_types=1);

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BySearch
{
    public function __construct(public Request $request) {}

    public function handle(Builder $query, Closure $next)
    {
        $query->when(
            $this->request->filled('title'),
            function ($query) {
                $title = $this->request->title;
                $query->where('title', 'like', "%{$title}%");
            }
        );

        $query->when(
            $this->request->filled('content'),
            function ($query) {
                $content = $this->request->content;
                $query->where('content', 'like', "%{$content}%");
            }
        );

        return $next($query);
    }
}
