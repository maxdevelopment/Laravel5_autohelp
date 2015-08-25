<form method="POST" action="/auth">
    {!! csrf_field() !!}
    login:
    <input type="text" name="login">
    password:
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>

@if($errors->has())
    @foreach ($errors->all() as $error)
        ZZZ<div>{{ $error }}</div>
    @endforeach
@endif

@if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
@endif