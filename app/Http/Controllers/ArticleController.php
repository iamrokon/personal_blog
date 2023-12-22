<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArticleRequest;
use App\Services\ArticleService;
use App\Models\Category;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::latest()->with('user','category','tags')->paginate(10);
        return view('articles.index',[
            'articles' => $articles
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories','tags'));
    }

    public function store(StoreArticleRequest $request, ArticleService $articleService){
        $articleService->store($request->validated());
        return redirect()->back()->with(['success' => 'Article created successfully!']);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article','categories','tags'));
    }

    public function update(StoreArticleRequest $request, Article $article, ArticleService $articleService)
    {
        $articleService->update($article, $request->validated());
        return redirect()->back()->with(['success' => 'Article updated successfully!']);
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();
        return redirect()->back()->with(['success' => 'Article deleted successfully!']);
    }
}
