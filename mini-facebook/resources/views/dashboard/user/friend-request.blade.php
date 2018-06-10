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
    @include('layouts.profile-images')
@endsection

@section('content')
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
                                <p class="user-name"><a href="{{route('user-detail', ['id'=>Auth::user()->id])}}">Huynh Hong An</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6 button-container" style="text-align: right">
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-user-plus"></i> Accept
                            </button>
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-trash"></i> Remove Request
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
                                <p class="user-name"><a href="{{route('user-detail', ['id'=>Auth::user()->id])}}">Huynh Hong An</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6 button-container" style="text-align: right">
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-user-plus"></i> Accept
                            </button>
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-trash"></i> Remove Request
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
                                <p class="user-name"><a href="{{route('user-detail', ['id'=>Auth::user()->id])}}">Huynh Hong An</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6 button-container" style="text-align: right">
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-user-plus"></i> Accept
                            </button>
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-trash"></i> Remove Request
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
                                <p class="user-name"><a href="{{route('user-detail', ['id'=>Auth::user()->id])}}">Huynh Hong An</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6 button-container" style="text-align: right">
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-user-plus"></i> Accept
                            </button>
                            <button type="button" class="btn btn-default friend-list-buttons">
                                <i class="fas fa-trash"></i> Remove Request
                            </button>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
@endsection
