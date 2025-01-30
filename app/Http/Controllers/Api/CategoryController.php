<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(): mixed
    {
        try {
            $categories = Category::query()->get();

            return response()->json([
                'message' => 'Liste des catégories',
                'data' => $categories,
            ], Response::HTTP_OK);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Une erreur s\'est produite.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
