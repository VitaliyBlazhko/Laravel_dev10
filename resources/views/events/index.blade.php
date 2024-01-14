@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div>
        <h1>Events page</h1>

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

        <form action="{{ route('event.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" required>
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

            <button type="submit" class="btn btn-primary">Create Event for User</button>
        </form>
        {{ count($events) }}
        <table class="table">
            @if($events)
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">UserID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Dt_start</th>
                    <th scope="col">Dt_end</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)

                    @include('events.partial.raw', ['event' => $event])
                @endforeach

                </tbody>
        </table>
        @else
            Data is empty
        @endif
    </div>
@endsection

