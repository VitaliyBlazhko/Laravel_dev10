@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div class="container">
        <h1>Event page</h1>
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
                <h5 class="card-text">{{ $user->name }}</h5>
                <h5 class="card-text">{{ $user->email }}</h5>
                <h3 class="card-title">{{ $event->title }}</h3>
                <h5 class="card-text">{{ $event->notes }}</h5>
                <form action="{{ route('event.update') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="notes">Notes:</label>
                        <textarea class="form-control" id="notes" name="notes" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="dt_start">Start Date:</label>
                        <input type="text" class="form-control" id="dt_start" name="dt_start">
                    </div>

                    <div class="form-group">
                        <label for="dt_end">End Date:</label>
                        <input type="text" class="form-control" id="dt_end" name="dt_end">
                    </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                <div class="btn-group" role="group" aria-label="Event Actions">

                    @can('delete-event', $event)
                    <form action="{{ route('event.delete', $event->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection

