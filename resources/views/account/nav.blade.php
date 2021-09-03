@if(!Auth::check())
<div style="float:right;">
    <a href="login">登入</a>
    <a href="signup">註冊</a>
</div>
@endif
@if(Auth::check())
<div style="float:right;">
    <span>你好，{{ Auth::user()->name }}</span>
    <a href="logout">登出</a>
</div>
@endif
