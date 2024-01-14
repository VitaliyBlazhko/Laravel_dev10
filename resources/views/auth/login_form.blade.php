@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>
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
    <form method="POST" action="{{ route('login.authenticator') }}">
        @csrf
        <label>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" >

        </label>
        <a href="{{ route('register.index') }}">Registration</a>
    </form>
@endsection
