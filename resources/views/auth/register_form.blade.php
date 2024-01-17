@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    <h1>Registration</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <label>
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Password">
            <input type="submit" value="Register" >
        </label>
        <a href="{{ route('login') }}">Login</a>
    </form>
@endsection
