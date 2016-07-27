@extends('layouts.app')

@section('content')


<div class="container">

    <h1>Create an event</h1>

    <hr/>
{!! Form::open(['url' => 'events', 'files' => 'true' ]) !!}


    <div class="form-group">
    {!! Form::label('event_title', 'Event Title: ') !!}
    {!! Form::text('event_title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('description', 'Description: ') !!}
    {!! Form::Textarea('description',null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category: ') !!}
        {!! Form::select('category_id',array('Select category',1=>$categories[1],
        2 =>$categories[2],3=>$categories[3],4=>$categories[4],5=>$categories[5]),null,
        ['class' => 'form-control','selected' =>'Select category']) !!}
    </div>


    <div class="form-group">

        {!! Form::label('file', 'Upload an image:') !!}
        {!! Form::file('file', null, array('required', 'class'=>'form-control')) !!}

    </div>

    <div class="form-group">
    {!! Form::label('startDate', 'Start Date/time: ') !!}
    {!! Form::input('date','startDate', \Carbon\Carbon::now(), ['class' => 'form-control' ]) !!}
    {!! Form::input('time','startTime', date('12:00'), ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('endDate', 'End Date/time: ') !!}
        {!! Form::input('date','endDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        {!! Form::input('time', 'endTime',date('12:00'), ['class' => 'form-control']) !!}
    </div>




    <div class="form-group">
    {!! Form::submit('Submit event',['class' => 'btn btn-primary form-control'] ) !!}
    </div>




{!! Form::close() !!}
    @include ('errors.list')
</div>



@stop