@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">User page</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
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
            <tbody>
            <tr>
                <td>
                    <h1>{{ $user->name }}</h1>
                    <h5>{{ $user->email }}</h5>
                    <h5>{{ $user->password }}</h5>
                </td>
                <td>
                    <form method="POST" action="{{ route('users.update') }}">
                        @csrf
                        <label>
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Password">
                            <input type="submit" value="Update" >
                        </label>
                    </form>

                    <form action="{{ route('users.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('Post')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Title</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Start</th>
                    <th scope="col">End</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td scope="row">{{$event->id}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->notes}}</td>
                        <td>{{$event->dt_start}}</td>
                        <td>{{$event->dt_end}}</td>
                        <td>{{$event->created_at}}</td>
                        <td>{{$event->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            </tbody>
        </table>
    </div>
@endsection

