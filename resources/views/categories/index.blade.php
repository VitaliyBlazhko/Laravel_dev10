@extends('layouts.app')

@section('title', 'Category')

@section('content')
    <div>
        <h1>Category page</h1>
        <table class="table">
            @if($categories)
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)

                    @include('categories.partial.raw', ['category' => $category])
                @endforeach

                </tbody>
        </table>
        @else
            Data is empty
        @endif
    </div>
@endsection

