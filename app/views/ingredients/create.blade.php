@extends('templates.master')

@section('content')

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'ingredients')) }}

  <div class="form-group">
    {{ Form::label('name', 'Nome') }}
    {{ Form::text('name', Input::old('name')) }}
  </div>

  <div class="form-group">
    {{ Form::label('price', 'Preço') }}
    {{ Form::text('price', Input::old('price')) }}
  </div>

  {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection
