<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pizzaria Online</title>
  <link rel="stylesheet" href="/bootstrap.min.css">
  <script src="/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Pizzaria</a>
      </div>
      <ul class="nav navbar-nav" style="width: 84%;">
        <li class='active'><a href="/pizzas">Pizzas</a></li>
        <li class='active'><a href="/sales">Compras</a></li>
        <li class="pull-right">
        {{ Form::open(array('url' => 'sessions/sair' )) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Sair', array('class' => 'btn btn-warning')) }}
        {{ Form::close() }}
        </li>
      </ul>
    </div><!-- /.container-fluid -->
  </nav>
  <div class='container'>
    @yield('content')
  </div>
</body>
</html>
