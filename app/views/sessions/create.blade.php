<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pizzaria Online</title>
  <link rel="stylesheet" href="/bootstrap.min.css">
  <script src="/bootstrap.min.js"></script>
  <style>
  .form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin .checkbox {
    font-weight: normal;
  }
  .form-signin .form-control {
    position: relative;
    height: auto;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
    padding: 10px;
    font-size: 16px;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  </style>
</head>
<body>
  <div class="container">
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'sessions', 'style' => 'width: 500px; margin: auto;', 'class' => 'form-signin', 'role' => 'form')) }}
      <h2 class="form-signin-heading">Faça login</h2>

      <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('password', 'Senha:') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
      </div>

      <a class="btn btn-info pull-left" href="{{ URL::to('users/create') }}">Cadastre-se</a>&nbsp;
      {{ Form::submit('Entrar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
  </div>
</body>
</html>
