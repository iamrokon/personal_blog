<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $articles = Article::latest()->with('user','category','tags')->paginate(9);
        return view('home',[
            'articles' => $articles
        ]);
    }
    public function detail($id)
    {
        $article = Article::find($id);
        return view('blog_detail',[
            'article' => $article
        ]);
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
