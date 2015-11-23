<!DOCTYPE html>
<html ng-app="AutoHelp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <title>AutoProblema.by</title>
    <link href="{{ asset('bower_components/bootstrap-css-only/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/local.css') }}" rel="stylesheet" type="text/css" >

    <script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
    <script src="{{ asset('bower_components/angular-animate/angular-animate.min.js') }}"></script>
    <script src="{{ asset('bower_components/angular-messages/angular-messages.min.js') }}"></script>
    <script src="{{ asset('bower_components/angular-resource/angular-resource.min.js') }}"></script>
    <script src="{{ asset('bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js') }}"></script>
</head>
<body ng-controller="MainController">
<div class="container">
    <div class="jumbotron custom_block">
        <div class="container">
            <h2><% txt.jumbotronTitle %></h2>
            <p><% txt.jumbotronMsg %></p>
            <button class="btn btn-success btn-lg" ng-click="open()"><% txt.jumbotronBtn %></button>
        </div>
    </div>
    <div class="custom_block">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <blockquote class="custom_quote">
                <p><% txt.quoteLeft %></p>
                <footer><% txt.quoteLeftText %></footer>
            </blockquote>
            <service-left></service-left>
        </div>
        <div class="col-xs-12 col-md-6">
            <blockquote class="custom_quote">
                <p><% txt.quoteRight %></p>
                <footer><% txt.quoteRightText %></footer>
            </blockquote>
            <service-right></service-right>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <service-bottom></service-bottom>
        </div>
    </div>
    </div>
<footer class="footer">
    <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>
    <a href="http://maxdev.by" target="_blank">&nbsp;<% txt.footerText %></a>
</footer>
</div>
<!-- AngularJS app-->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>