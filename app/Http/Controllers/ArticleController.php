<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Article::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $credentials = $request->validated();
        $credentials["slug"] = Str::slug($credentials["title"]) . "-" . Str::random(5);
        $article = Article::create($credentials);
        return response()->json([
            "message" => "Article created successfully",
            "article" => $article
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return response()->json($article->load("category")->load("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $credentials = $request->validated();
        if (isset($credentials["title"])) {
            $credentials["slug"] = Str::slug($credentials["title"]) . "-" . Str::random(5);
        }
        $article->update($credentials);
        return response()->json([
            "message" => "Article updated successfully",
            "article" => $article
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json([
            "message" => "Article deleted successfully"
        ]);
    }
}
