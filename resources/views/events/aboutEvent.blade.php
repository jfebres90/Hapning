@extends('layouts.app')

@section('content')


<h1>hello world</h1>

{!! Html::image($eventImage->thumb_path.''.$eventImage->image_name) !!}

<h2>{{ $eventDetails->event_title }}</h2>

<p>{{ $eventDetails->description }}</p>



@stop