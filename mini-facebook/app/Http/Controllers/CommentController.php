<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addNewComment(Request $request){
        $input = json_decode($request->getContent(), true);
        Comment::create($input);
        $user = Auth::user();
        echo json_encode($user);
        die;
    }
}
