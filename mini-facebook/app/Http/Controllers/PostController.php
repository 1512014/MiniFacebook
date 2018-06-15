<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Friend;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $current_user = Auth::user();
        $current_user_friends = UserController::getCurrentUserFriends();
        $friend_ids = [$current_user->id];
        foreach ($current_user_friends as $current_user_friend){
            array_push($friend_ids, $current_user_friend->user_data->id);
        }
//        dd($current_user_friends);
//        dd($friend_ids);
        $posts = Post::whereIn('user_id', $friend_ids)->orderBy('id','desc')->take(10)->get();
        foreach ($posts as $post){
            $post['comments'] = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();
            foreach ($post['comments'] as $comment){
                $comment['comment_author'] = User::where('id', $comment->user_id)->first();
            }
            $author = User::where('id', $post->user_id)->first();
            $post['post_author'] = $author;
        }
        $groups = GroupController::getCurrentUserGroups();
        return view('dashboard.home', compact('posts', 'current_user', 'current_user_friends', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //to store post_content, use: real_escape_string();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $image = $request->file('image');
        if($image){
            $path = public_path(). '/img/posts/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            $input['image_path'] = '/img/posts/' .  $filename;
        }

        Post::create($input);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $image = $request->file('image');
        if($image){
            $path = public_path(). '/img/posts/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            $input['image_path'] = '/img/posts/' .  $filename;
        }
        else {
            $post = Post::findOrFail($id);
            $input['image_path'] = $post->image_path;
        }

        $post = Post::where('id', $id);
        $post->update($input);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id);

        $post->delete();
        $comments->delete();

        return redirect(route('posts.index'));
    }

    public function getPostById($post_id){
        $post = Post::findOrFail($post_id);

        echo json_encode($post);
        die;
    }

    public function updateContent(Request $request){
        $input = json_decode($request->getContent(), true);

        $post = Post::where('id', $input['post_id']);
        $post->update(['post_content' => $input['post_content']]);
        $post = $post->first();
        echo json_encode($post);
        die;
    }


}
