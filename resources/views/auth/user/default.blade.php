@extends('layouts.main')
@section('title', 'Your Dashboard - '.config('app.name'))
@section('home-active', 'active')
@section('sidebar')
@include('layouts.user-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h1>TextGoesHere</h1>
        <hr>
    </div>
</div>

@endsection
