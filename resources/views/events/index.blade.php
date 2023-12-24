@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div>
        <h1>Events page</h1>
        {{ count($events) }}
        <table class="table">
            @if($events)
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Events</th>
                    <th scope="col">Description</th>
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

