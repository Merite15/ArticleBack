<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): void {}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request): void {}

    /**
     * Display the specified resource.
     */
    public function show(Article $article): void {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): void {}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): void {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): void {}
}
