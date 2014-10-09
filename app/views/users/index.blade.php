@extends('templates.master')

@section('content')

<a class='btn btn-success pull-right' href="{{ URL::to('ingredients/create') }}">Novo ingrediente</a>
<br/><br/><br/>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <td>ID</td>
      <td>Nome</td>
      <td>Email</td>
      <td>Endereço</td>
      <td>Açoes</td>
    </tr>
  </thead>
  <tbody>
  @foreach($ingredients as $key => $value)
    <tr>
      <td>{{ $value->id }}</td>
      <td>{{ $value->name }}</td>
      <td>{{ $value->price }}</td>
      <td>
        <a class="btn btn-info pull-left" href="{{ URL::to('ingredients/' . $value->id . '/edit') }}">Editar</a>
        {{ Form::open(array('url' => 'ingredients/' . $value->id )) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Excluir', array('class' => 'btn btn-danger pull-left')) }}
        {{ Form::close() }}
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
