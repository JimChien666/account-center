<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signup page</title>
</head>
<body>
    <h1>signup page</h1>
    <form action="signup" method="POST">
        @csrf
        姓名:<input type="text" name='name'/><br/>
        email：<input type="text" name='email'/><br/>
        密碼：<input type="password" name='password'/><br/>
        密碼確認：<input type="password" name='passwordCheck'/><br/>
        <button type="submit">註冊</button>
    </form>

</body>
</html>
