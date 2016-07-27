@extends('layouts.app')

@section('content')

    <h1>My Events</h1>

    <a href="{{ action('eventsPageController@create') }}">Host an Event</a>

    <h5>Events by: <em>{{$user->user_name}}</em></h5>




    @foreach ($usersEvents as $usersEvents)


        <a href="{{ action( 'eventsPageController@show', [ $usersEvents->event_id ] )  }}">

            <h2>{{ $usersEvents->event_title }}</h2>
        </a>

        <p>{{$usersEvents->created_at}}</p>
        <p>***{{ $usersEvents->start }} End: {{ $usersEvents->end }}</p>


        {!!   Form::open(['route' => ['events.destroy', $usersEvents->event_id], 'method' => 'delete']) !!}
        {!!   Form::submit('Delete') !!}
        {!!   Form::close() !!}

    @endforeach


@stop