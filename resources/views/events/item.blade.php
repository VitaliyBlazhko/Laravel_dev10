@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div class="container">
        <h1>Event page</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-text">{{ $user->name }}</h5>
                <h5 class="card-text">{{ $user->email }}</h5>
                <h3 class="card-title">{{ $event->title }}</h3>
                <h5 class="card-text">{{ $event->notes }}</h5>

                <div class="btn-group" role="group" aria-label="Event Actions">
                    <form action="{{ route('event.update', $event->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                    <form action="{{ route('event.delete', $event->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

