<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pizzaria Online</title>
  <link rel="stylesheet" href="/bootstrap.min.css">
  <script src="/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'users')) }}

      <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('password', 'Senha') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('full_address', 'Endereço') }}
        {{ Form::text('full_address', Input::old('full_address'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

  </div>
</body>
</html>
