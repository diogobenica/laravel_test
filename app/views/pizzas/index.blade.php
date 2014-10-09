@extends('templates.master')

@section('content')

<a class='btn btn-success pull-right' href="{{ URL::to('pizzas/create') }}">Nova pizza</a>
<br/><br/><br/>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <td>ID</td>
      <td>Nome</td>
      <td>Ingredientes</td>
      <td>Ações</td>
    </tr>
  </thead>
  <tbody>
  @foreach($pizzas as $key => $value)
    <tr>
      <td>{{ $value->id }}</td>
      <td>{{ $value->name }}</td>
      <td>
      @foreach($value->ingredients as $key => $ingredient)
        <span class='label label-info'>{{ $ingredient->ingredient->name }}</span>
      @endforeach
      </td>
      <td>
        <a class="btn btn-info pull-left" style="margin-right: 6px;" href="{{ URL::to('pizzas/' . $value->id . '/edit') }}">Editar</a>
        {{ Form::open(array('url' => 'pizzas/' . $value->id )) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Excluir', array('class' => 'btn btn-danger pull-left')) }}
        {{ Form::close() }}
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
