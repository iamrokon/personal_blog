<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        $posts = $user->posts()->latest()->with('user')->paginate(10);
        // dd($posts);
        return view('user.posts.index',[
            'posts' => $posts
        ]);
    }
}
