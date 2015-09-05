<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/local.css') }}" rel="stylesheet" type="text/css" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/local.js') }}"></script>


</head>
<body>

MainPage
<a href="javascript:void(0)" id="askhelp">help</a>
<div id="modal_form">
    <span id="modal_close">[close]</span>
    <form method="POST" action="/help" id="helpform">
        {!! csrf_field() !!}
        name: <br />
        <input type="text" name="name"><br />
        phone: <br />
        <input type="phone" name="phone"><br />
        <button type="submit">send</button>
    </form>
    <div id="error"></div>
</div>
<div id="overlay"></div>

</body>
</html>