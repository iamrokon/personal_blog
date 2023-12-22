<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::factory()->count(20)->create();
        foreach($articles as $article){
            $tags = Tag::inRandomOrder()->limit(5)->get();
            $article->tags()->sync($tags->pluck('id'));
        }
    }
}
