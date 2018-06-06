@extends('layouts.app')

@push('scripts')
    <script src="/js/home-script.js"></script>
@endpush

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <h1>Hello world!</h1>
@endsection