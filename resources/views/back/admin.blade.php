<!DOCTYPE html>
<html ng-app="AdminApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <title>Laravel</title>
    <link href="{{ asset('bower_components/bootstrap-css-only/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/local.css') }}" rel="stylesheet" type="text/css" >

    <script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
    <script src="{{ asset('bower_components/angular-resource/angular-resource.min.js') }}"></script>
    <script src="{{ asset('bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js') }}"></script>
</head>
<body ng-controller="AdminController">

AdminPage
{!! HTML::linkRoute('logout', 'logout') !!}


<div ng-repeat="customer in customers">
    <admin-edit info="customer"></admin-edit>
</div>

<!-- AngularJS app-->
    <script src="{{ asset('js/appAdmin.js') }}"></script>
</body>
</html>