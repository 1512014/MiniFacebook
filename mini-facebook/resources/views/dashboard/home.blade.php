@extends('layouts.user-layout')

@push('styles')
<link rel="stylesheet" type="text/css" href="/css/custom-home.css">
@endpush
@push('scripts')
<script src="/js/custom-home.js"></script>
@endpush

@section('contacts')
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
        <form id="post" method="post" action="/" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group post-content">
                {{--<label for="message">Your comment:</label>--}}
                <textarea rows="3" name="content" id="content" class="form-control" placeholder="What's in your mind..."></textarea>
                <input type="hidden" id="post_id" value="">
            </div>
            <div class="form-group image-upload">
                <label for="image" style="font-weight: bold">Upload Image:</label>
                <input type="file" name="image" id="image" class="form-control">

            </div>
            <div class="image-show">

            </div>
            <div class="form-group post-action">
                <button type="submit" class="btn btn-primary post-btn">Post</button>
            </div>
        </form>
    </div>

    {{--Add loop posts here--}}
    <div class="post-item">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 20px; height: 40px; line-height: 40px">
                <div class="col-sm-10">
                    <img src="/img/user1.png" class="avatar">
                    <a href="#"><span class="user-name">Huynh Hong An</span></a>
                </div>
                <div class="col-sm-2">
                    <span class="posted-time">8 hrs</span>
                </div>
            </div>
            <div class="row image-container">
                <div class="col-sm-12">
                    <img class="post-image" src="/img/post1.jpg">
                </div>

            </div>
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
                    <img src="/img/user1.png" class="avatar">
                </div>
                <div class="col-sm-10">
                    <input type="text" class="comment form-control" placeholder="Leave a comment...">
                </div>
                <div class="col-sm-1" style="text-align: center; font-size: 13px; padding: 0">
                    <button type="button" class="upload btn btn-default"><i class="fas fa-camera"></i></button>
                </div>

            </div>

            {{--Add loops comments here--}}
            <div class="row comment-item">
                <div class="col-sm-1">
                    <img src="/img/user1.png" class="avatar">
                </div>
                <div class="col-sm-11">
                    <p> <a href="#"><span class="comment-owner">TaVy</span></a>This rabit is so cuteeeeeeeeeeeeeeeeee eeeeeeeeeeee</p>
                </div>
            </div>


            <div class="row comment-item">
                <div class="col-sm-1">
                    <img src="/img/user1.png" class="avatar">
                </div>
                <div class="col-sm-11">
                    <p> <a href="#"><span class="comment-owner">TaVy</span></a>Rabbits are small mammals in the family Leporidae of the order Lagomorpha (along with the hare and the pika). Oryctolagus cuniculus includes the European rabbit species and its descendants, the world's 305 breeds[1] of domestic rabbit. Sylvilagus includes thirteen wild rabbit species, among them the seven types of cottontail. The European rabbit, which has been introduced on every continent except Antarctica, is familiar throughout the world as a wild prey animal and as a domesticated form of livestock and pet. With its widespread effect on ecologies and cultures, the rabbit (or bunny) is, in many areas of the world, a part of daily life—as food, clothing, and companion, and as a source of artistic inspiration.</p>
                </div>
            </div>

            <div class="row comment-item">
                <div class="col-sm-1">
                    <img src="/img/user1.png" class="avatar">
                </div>
                <div class="col-sm-11">
                    <p> <a href="#"><span class="comment-owner">TaVy</span></a>anion, and as a source of artistic inspiration.</p>
                </div>
            </div>

            {{--End loop comments--}}
        </div>
    </div>
    {{--End loop posts--}}
@endsection