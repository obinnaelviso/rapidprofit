@extends('layouts.main')
@section('title', 'My Dashboard - '.' Admin '.config('app.name'))
@section('home-active', 'active')
@section('sidebar')
@include('layouts.admin-sidebar')
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <h1>Home Overview</h1>
        <hr>
    </div>
</div>

@endsection
