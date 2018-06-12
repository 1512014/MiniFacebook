@extends('layouts.user-layout')

@push('styles')
<link rel="stylesheet" type="text/css" href="/css/custom-home.css">
@endpush
@push('scripts')
<script src="/js/custom-home.js"></script>
@endpush

@section('contacts')
    @include('partial.contacts')
@endsection

@section('groups')
    <li>
        <img src="/img/user1.png">
        <span class="name">Huynh Hong An</span>
    </li>
    <li>
        <img src="/img/user1.png">
        <span class="name">Huynh Hong An</span>
    </li>
    <li>
        <img src="/img/user1.png">
        <span class="name">Huynh Hong An</span>
    </li>
    <li>
        <img src="/img/user1.png">
        <span class="name">Huynh Hong An</span>
    </li><li>
        <img src="/img/user1.png">
        <span class="name">Huynh Hong An</span>
    </li>
    <li>
        <img src="/img/user1.png">
        <span class="name">Huynh Hong An</span>
    </li>
@endsection

@section('sidebar')
    @parent

    {{--<p>This is appended to the master sidebar.</p>--}}
@endsection

@section('content')
    <div class="write-post">
        {!! Form::open(['method'=>'POST', 'action'=>'PostController@store', 'id'=>'post', 'enctype'=>'multipart/form-data']) !!}
        {{ csrf_field() }}

        <div class="form-group post-content">
            {!! Form::textarea('post_content', null, ['class'=>'form-control', 'placeholder' => 'What\'s in your mind...', 'id'=>'content', 'rows'=>3]) !!}
            {!! Form::hidden('user_id', $current_user->id) !!}
        </div>

        <div class="form-group image-upload">
            {!! Form::label('image', 'Upload Image:') !!}
            {!! Form::file('image', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group post-action">
            {!! Form::submit('Post', ['class'=>'btn btn-primary post-btn']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    {{--Add loop posts here--}}
    @foreach ($posts as $post)
    <div class="post-item">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 20px; height: 40px; line-height: 40px">
                <div class="col-sm-7">
                    <img src="{{$post->post_author->avatar}}" class="avatar">
                    <a href="{{route('user-detail', ['id' => $post->post_author->id])}}"><span class="user-name">{{$post->post_author->name}}</span></a>
                </div>
                @if($post->user_id === $current_user->id)
                <div class="col-sm-2">
                    <span class="posted-time">8 hrs</span>
                </div>
                <div class="col-sm-3">
                    <form action="{{ route('posts.destroy' , $post->id)}}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-delete-post" onclick="return confirm('Are you sure?')">Delete Post</button>
                    </form>

                </div>
                @else
                    <div class="col-sm-5" style="text-align: right">
                        <span class="posted-time">8 hrs</span>
                    </div>
                @endif
            </div>
            <div class="row content-container">
                <div class="col-sm-12">
                    <p>{{$post->post_content}}</p>
                </div>
            </div>
            @if($post->image_path != null)
            <div class="row image-container">
                <div class="col-sm-12">
                    <img class="post-image" src="{{$post->image_path}}">
                </div>
            </div>
            @endif
            <div class="row react">
                <div class="col-sm-12">
                <ul class="react">
                    <li><a href="#" class="btn btn-default">Like</a> </li>
                    <li><a href="#" class="btn btn-default">Comment</a> </li>
                </ul>
                </div>
            </div>

            <div class="row comment-container">
                <div class="col-sm-1">
                    <img src="{{$current_user->avatar}}" class="avatar">
                </div>
                <div class="col-sm-10">
                    <input type="text" class="comment form-control" placeholder="Leave a comment...">
                </div>
                <div class="col-sm-1" style="text-align: center; font-size: 13px; padding: 0">
                    <button type="button" class="upload btn btn-default"><i class="fas fa-camera"></i></button>
                </div>

            </div>

            @foreach($post->comments as $comment)
            {{--Add loops comments here--}}
            <div class="row comment-item">
                <div class="col-sm-1">
                    <img src="{{$comment->comment_author->avatar}}" class="avatar">
                </div>
                <div class="col-sm-11">
                    <p> <a href="{{route('user-detail', ['id' => $comment->comment_author->id])}}"><span class="comment-owner">{{$comment->comment_author->name}}</span></a>{{$comment->comment_content}}</p>
                </div>
            </div>
            {{--End loop comments--}}
            @endforeach


        </div>
    </div>
    @endforeach
    {{--End loop posts--}}
@endsection