<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login page</title>
</head>
<body>
    @include('account.nav')
    <h1>login page</h1>
    @if ($errors->has('fail'))
        <div class="fail">{{ $errors->first('fail') }}</div>
    @endif
    {{ Form::open(['url'=>'login', 'method'=>'post']) }}
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email') }}
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
        {{ Form::submit('Login') }}
    {{ Form::close() }}
</body>
</html>
