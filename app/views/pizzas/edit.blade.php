@extends('templates.master')

@section('content')
  {{ HTML::ul($errors->all()) }}

  {{ Form::open(array('url' => 'pizzas/'.$pizza->id)) }}
    {{ Form::hidden('_method', 'PUT') }}

    <div class="form-group">
      {{ Form::label('name', 'Nome') }}
      {{ Form::text('name', $pizza->name, array('class' => 'form-control')) }}
    </div>

    @foreach($pizza->ingredients as $key => $ingredient)
      <div class="form-group">
        {{ Form::label('ingredient_id[]', 'Ingrediente') }}
        {{ Form::select('ingredient_id[]', $ingredients_array, $ingredient->ingredient->id, array('class' => 'form-control')) }}
      </div>
    @endforeach

    @for($i = $pizza->ingredients->count(); $i < 5; $i++)
      <div class="form-group">
        {{ Form::label('ingredient_id[]', 'Ingrediente') }}
        {{ Form::select('ingredient_id[]', $ingredients_array, null, array('class' => 'form-control')) }}
      </div>
    @endfor

    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}
@endsection
