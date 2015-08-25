<form method="POST" action="/auth">
    {!! csrf_field() !!}
    login:
    <input type="text" name="login">
    password:
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>