<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Filters\ByCategory;
use App\Filters\BySearch;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\Pipeline;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        try {
            $pipelines = [
                ByCategory::class,
                BySearch::class,
            ];

            $article = Article::query()
                ->with('categories')
                ->latest();

            $articles = Pipeline::send($article)
                ->through($pipelines)
                ->thenReturn()
                ->get();

            return response()->json([
                'message' => 'Liste des articles par filtre',
                'data' => $articles,
            ], Response::HTTP_OK);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Une erreur s\'est produite.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): mixed
    {
        try {
            $article = Article::query()
                ->with('categories')
                ->findOrFail($id);

            return response()->json([
                'message' => 'Details d\'un article',
                'data' => $article,
            ], Response::HTTP_OK);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Une erreur s\'est produite.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): void {}
}
