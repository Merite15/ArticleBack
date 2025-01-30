<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class ImportArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): mixed
    {
        $jsonPath = database_path('feed.json');

        $json = File::get($jsonPath);

        $articles = json_decode($json, true);

        foreach ($articles as $data) {
            $categoryName = $data['categories']['primary'] ?? ($data['categories']['additional'][0] ?? null);

            $category = Category::firstOrCreate(['name' => $categoryName]);

            $article = Article::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'title' => $data['title'],
                    'content' => $data['content'][0]['content'] ?? '',
                    'featured_media' => $data['media'][0]['media']['attributes']['url'] ?? null,
                    'primary_category_id' => $category->id
                ]
            );

            foreach ($data['categories']['additional'] as $additionalCategoryName) {
                $additionalCategory = Category::firstOrCreate(
                    ['name' => $additionalCategoryName]
                );

                $article->categories()->syncWithoutDetaching([$additionalCategory->id]);
            }
        }

        return response()->json(['message' => 'Article importés avec succès'], Response::HTTP_OK);
    }
}
