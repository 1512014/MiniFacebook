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

@section('profile-images')
    @include('partial.profile-images')
@endsection

@section('content')
    <div class="friend-list">
        <ul class="friend-list">
            {{--Loops friends here--}}
            @foreach($friends as $friend)
            <li>
                <div class="container">
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="image-container">
                               <img src="{{$friend->user_data->avatar}}">
                           </div>
                           <div class="user-info">
                               <p class="user-name"><a href="{{route('user-detail', ['id'=>$friend->user_data->id])}}">{{$friend->user_data->name}}</a></p>
                           </div>
                       </div>
                       <div class="col-sm-6 button-container" style="text-align: right">
                           @if($current_user->id != $user->id)
                               @if($friend->is_mutual)
                                   <p class="mutual-friend">Mutual Friend</p>
                               @else
                               @endif
                           @else
                               @if($friend->status == 1)
                                   {{--<button type="button" class="btn btn-default friend-list-buttons">--}}
                                       {{--<i class="fas fa-user-plus"></i> Add Friend--}}
                                   {{--</button>--}}
                               @elseif($friend->status == 2)
                                   <button type="button" class="btn btn-default friend-list-buttons">
                                       <i class="fas fa-trash"></i> Remove Friend
                                   </button>
                               @endif
                           @endif



                       </div>
                   </div>
                </div>
            </li>
            @endforeach
            {{--End loops friends--}}

        </ul>
    </div>
@endsection
