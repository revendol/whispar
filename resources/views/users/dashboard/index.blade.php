@extends('users.layouts.master')

@section('title',' Wispar | Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('users.dashboard.sidebar')
            </div>
            <div class="col-md-7">
                @include('users.dashboard.content')
            </div>
            <div class="col-md-2">
                Rightbar
            </div>
        </div>
    </div>

@endsection
