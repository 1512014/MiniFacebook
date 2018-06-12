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

