<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        // $posts = Post::paginate(3);
        // $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(3);
        // return view('main.index', compact('posts', 'likedPosts'));

        return redirect()->route('post.index');
    }
}
