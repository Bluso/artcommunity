<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\postcontent;
use App\collection;
use App\comment;
use App\UserLikePost;
use App\UserLikeComment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = user::all();
        $collections = collection::all();
        $posts = postcontent::orderBy('id', 'DESC')->get();
        $comments = comment::all();
        $user_like_posts = UserLikePost::all();
        $user_like_comments = UserLikeComment::all();

        return view('home')->with(array('users' => $users, 'collections' => $collections,
                                        'posts' => $posts, 'comments' => $comments,
                                        'user_like_posts' => $user_like_posts,
                                        'user_like_comments' => $user_like_comments));
    }
}
