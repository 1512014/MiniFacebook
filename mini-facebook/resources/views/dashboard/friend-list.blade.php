@extends('layouts.user-layout')

@push('styles')
<link rel="stylesheet" type="text/css" href="/css/custom-home.css">
<link rel="stylesheet" type="text/css" href="/css/custom-user-detail.css">
<link rel="stylesheet" type="text/css" href="/css/custom-friend-list.css">
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

@section('profile-images')
    <div class="profile-images">
        <img class="cover" src="/img/cover1.jpg">
        <div class="avatar-container">
            <img class="avatar" src="/img/user1.png">
        </div>
        <ul class="friend-option">
            <li><a href="#">About</a> </li>
            <li><a href="{{route('friend-list')}}">Friends</a> </li>
        </ul>

        <div class="btn-group profile-image-buttons">
            <button type="button" class="btn btn-default">
                <i class="fas fa-user-plus"></i> Add Friend
            </button>
            <button type="button" class="btn btn-default">
                <i class="fas fa-comment"></i> Message
            </button>
        </div>

    </div>
@endsection

@section('friends')
    <div class="friend-list">
        <ul class="friend-list">
            {{--Loops friends here--}}
            <li>
                <div class="container">
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="image-container">
                               <img src="/img/user1.png">
                           </div>
                           <div class="user-info">
                               <p class="user-name"><a href="{{route('user-detail')}}">Huynh Hong An</a></p>
                           </div>
                       </div>
                       <div class="col-sm-6 button-container" style="text-align: right">
                           <button type="button" class="btn btn-default friend-list-buttons">
                               <i class="fas fa-user-plus"></i> Add Friend
                           </button>
                           <button type="button" class="btn btn-default friend-list-buttons">
                               <i class="fas fa-trash"></i> Remove Friend
                           </button>
                       </div>
                   </div>
                </div>



            </li>
            {{--End loops friends--}}

            <li>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="image-container">
                                <img src="/img/user1.png">
                            </div>
                            <div class="user-info">
                                <p class="user-name"><a href="#">Huynh Hong An</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6 button-container" style="text-align: right">
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-user-plus"></i> Add Friend
                            </button>
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-trash"></i> Remove Friend
                            </button>
                        </div>
                    </div>
                </div>



            </li>
            <li>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="image-container">
                                <img src="/img/user1.png">
                            </div>
                            <div class="user-info">
                                <p class="user-name"><a href="#">Huynh Hong An</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6 button-container" style="text-align: right">
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-user-plus"></i> Add Friend
                            </button>
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-trash"></i> Remove Friend
                            </button>
                        </div>
                    </div>
                </div>



            </li>
            <li>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="image-container">
                                <img src="/img/user1.png">
                            </div>
                            <div class="user-info">
                                <p class="user-name"><a href="#">Huynh Hong An</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6 button-container" style="text-align: right">
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-user-plus"></i> Add Friend
                            </button>
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-trash"></i> Remove Friend
                            </button>
                        </div>
                    </div>
                </div>



            </li>

        </ul>
    </div>
@endsection
