@extends('layouts.app')

@section('title', 'Category')

@section('content')
    <div class="container">
        <h1>Category page</h1>
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
        <div class="card">
            <div class="card-body">
                <h5 class="card-text">{{ $category->name }}</h5>
                <h5 class="card-text">{{ $category->description }}</h5>
            </div>
            <form action="{{ route('categories.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input class="form-control" id="description" name="description" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <div class="btn-group" role="group" aria-label="Category Actions">

                <form action="{{ route('categories.delete', $category->id) }}" method="GET">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        </div>
    </div>
@endsection
