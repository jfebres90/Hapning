@extends('layouts.app')

@section('content')

<h1>hello world</h1>

@foreach ($events as $events)

   <a href="{{ action( 'eventsPageController@show', [$events->event_id] )}}">

      <h2>{{ $events->event_title }}</h2>
   </a>


   {!! Html::image($events->thumb_path.''.$events->image_name) !!}



   <h5>Hosted by: <em>{{$user[$events->user_id]}}</em></h5>
   <p>{{$events->created_at}}</p>
   <p>***{{ $events->description }}</p>
   <p>Start:{{ $events->start }} End: {{ $events->end }}</p>




@endforeach


@stop