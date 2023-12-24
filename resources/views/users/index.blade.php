@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div>
        <h1>Users page</h1>
        {{ count($users) }}
        <table class="table">
            @if($users)
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Users</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)

                    @include('users.partial.raw', ['user' => $user])
                @endforeach

                </tbody>
        </table>
        @else
            Data is empty
        @endif
    </div>
@endsection

