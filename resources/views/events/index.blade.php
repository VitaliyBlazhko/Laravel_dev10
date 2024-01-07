@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div>
        <h1>Events page</h1>
        <form action="{{ route('event.create') }}" method="POST">
            @csrf
            @method('POST')
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id">
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

