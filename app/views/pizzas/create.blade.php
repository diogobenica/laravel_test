@extends('templates.master')

@section('content')
  {{ HTML::ul($errors->all()) }}

  {{ Form::open(array('url' => 'pizzas')) }}

    <div class="form-group">
      {{ Form::label('name', 'Nome') }}
      {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('ingredient_id[]', 'Ingrediente') }}
      {{ Form::select('ingredient_id[]', $ingredients_array, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('ingredient_id[]', 'Ingrediente') }}
      {{ Form::select('ingredient_id[]', $ingredients_array, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('ingredient_id[]', 'Ingrediente') }}
      {{ Form::select('ingredient_id[]', $ingredients_array, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('ingredient_id[]', 'Ingrediente') }}
      {{ Form::select('ingredient_id[]', $ingredients_array, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('ingredient_id[]', 'Ingrediente') }}
      {{ Form::select('ingredient_id[]', $ingredients_array, null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}
@endsection
