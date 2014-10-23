@extends('templates.master')

@section('content')

<a class='btn btn-success pull-right' href="{{ URL::to('sales/create') }}">Nova compra</a>
<br/><br/><br/>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <td>Número</td>
      <td>Data</td>
      <td>Pizzas</td>
    </tr>
  </thead>
  <tbody>
  @foreach($sales as $key => $value)
    <tr>
      <td>{{ $value->id }}</td>
      <td>{{ date("d/m/Y",strtotime($value->created_at)) }}</td>
      <td>
      @foreach($value->pizzas as $key => $pizza)
        <span class='label label-info'>{{ $pizza->pizza->name }}</span>
      @endforeach
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
