@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div>
        <h1>User page</h1>
        <h3>{{ $user-> name }}</h3>
        <h5>{{ $user-> email }}</h5>
        <h5>{{ $user-> password }}</h5>


    </div>
@endsection

