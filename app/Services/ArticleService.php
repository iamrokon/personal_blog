<?php
namespace App\Services;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleService
{
    public function store($data)
    {
        DB::transaction(function () use($data) {
            $data = array_merge([
                'user_id' => auth()->user()->id
            ], $data);
            $article = Article::create($data);
            $article->tags()->sync($data['tags']);
        }, 5);
    }

    public function update(Article $article, $data)
    {
        DB::transaction(function () use($article, $data){
            $data = array_merge([
                'user_id' => auth()->user()->id
            ], $data);
            $article = tap($article)->update($data); // As update function returns bool, so for getting id we used tap
            $article->tags()->sync($data['tags']);
        });
    }
}
