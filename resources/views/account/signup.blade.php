<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signup page</title>
</head>
<body>
    @include('account.nav')
    <h1>signup page</h1>
    @isset($error)
        <span style="color:red;">{{ $error }}</span>
    @endisset

    @if ($errors->has('fail'))
        <div class="fail">{{ $errors->first('fail') }}</div>
    @endif
    {{ Form::open(['url'=>'signup', 'method'=>'post']) }}
        {{ Form::label('name', '姓名') }}
        {{ Form::text('name') }}<br/>
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email') }}<br/>
        {{ Form::label('password', '密碼') }}
        {{ Form::password('password') }}<br/>
        {{ Form::label('password_check', '密碼確認') }}
        {{ Form::password('password_check') }}<br/>
        {{ Form::submit('註冊') }}
    {{ Form::close() }}

</body>
</html>
