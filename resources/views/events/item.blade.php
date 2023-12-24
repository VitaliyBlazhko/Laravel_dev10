@extends('layouts.app')

@section('title', 'Events')

@section('content')
<div>
    <h1>Event page</h1>

    <h3>{{ $event-> event }}</h3>
    <h5>{{ $event-> description }}</h5>


</div>
@endsection

