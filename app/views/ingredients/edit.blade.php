@extends('templates.master')

@section('content')
{{ HTML::ul($errors->all()) }}

{{ Form::model($ingredient, array('route' => array('ingredients.update', $ingredient->id), 'method' => 'PUT')) }}

  <div class="form-group">
    {{ Form::label('name', 'Nome') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
  </div>

  <div class="form-group">
    {{ Form::label('price', 'Preço') }}
    {{ Form::text('price', null, array('class' => 'form-control')) }}
  </div>

  {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection
