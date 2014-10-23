@extends('templates.master')

@section('content')
  {{ HTML::ul($errors->all()) }}

  {{ Form::open(array('url' => 'sales')) }}

    <div class="form-group">
      {{ Form::label('pizza_id[]', 'Pizza') }}
      {{ Form::select('pizza_id[]', $pizzas_array, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('pizza_id[]', 'Pizza') }}
      {{ Form::select('pizza_id[]', $pizzas_array, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('pizza_id[]', 'Pizza') }}
      {{ Form::select('pizza_id[]', $pizzas_array, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('pizza_id[]', 'Pizza') }}
      {{ Form::select('pizza_id[]', $pizzas_array, null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('pizza_id[]', 'Pizza') }}
      {{ Form::select('pizza_id[]', $pizzas_array, null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}
@endsection
