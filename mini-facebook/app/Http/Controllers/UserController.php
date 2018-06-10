<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserById($user_id){
        $current_user = Auth::user();
        $user = User::findOrFail($user_id);
        $posts = Post::where('user_id', $user_id)->orderBy('id','desc')->take(10)->get();
        foreach ($posts as $post){
            $post['comments'] = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();
            foreach ($post['comments'] as $comment){
                $comment['comment_author'] = User::where('id', $comment->user_id)->first();
            }
            $author = User::where('id', $post->user_id)->first();
            $post['post_author'] = $author;
        }
        return view('dashboard.user-detail', compact('posts', 'current_user', 'user'));
    }

    public function getFriendList($user_id){
//        $current_user = Auth::user();
//        $user = User::findOrFail($user_id);
//        $posts = Post::where('user_id', $user_id)->orderBy('id','desc')->take(10)->get();
//        foreach ($posts as $post){
//            $post['comments'] = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();
//            foreach ($post['comments'] as $comment){
//                $comment['comment_author'] = User::where('id', $comment->user_id)->first();
//            }
//            $author = User::where('id', $post->user_id)->first();
//            $post['post_author'] = $author;
//        }
//        return view('dashboard.user-detail', compact('posts', 'current_user', 'user'));
        $user = User::findOrFail($user_id);
        return view('dashboard.user.friend-list', compact('user'));
    }

    public function getFriendRequests($user_id){
        $user = User::findOrFail($user_id);
        return view('dashboard.user.friend-request', compact('user'));
    }

    public function getAbout($user_id){
        $user = User::findOrFail($user_id);
        return view('dashboard.user.about', compact('user'));
    }

    public function getAvatarAndCover($user_id){
        $user = User::findOrFail($user_id);
        return view('dashboard.user.change-cover-avatar', compact('user'));
    }
}
