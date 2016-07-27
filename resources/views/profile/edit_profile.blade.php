@extends('layouts.app')

@section('content')

<h1> Your almost Done</h1>
<h3>Update your profile to meet your interest </h3>

    {!! Form::open(['url' => 'register']) !!}


    <div class="form-group">
        {!! Form::label('city', 'City: ') !!}
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('state', 'State: ') !!}
        {!! Form::text('state', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('interest', 'What events are you interested in: ') !!}
        {!! Form::text('interest', null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Register',['class' => 'btn btn-primary form-control'] ) !!}
    </div>



    {!! Form::close() !!}


@stop