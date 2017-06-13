<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="token" name="token" value="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/bootstrap.min.css') !!}

    <!-- MetisMenu CSS -->
    {!! Html::style('css/metisMenu.min.css') !!}

    <!-- Custom CSS -->
    {!! Html::style('css/sb-admin-2.min.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('css/font-awesome.min.css') !!}

    <!-- Custom CSS MAIN -->
    {!! Html::style('css/main.css') !!}

    <!-- Other CSS -->
    @yield('style')

    <!-- Scripts -->
    
</head>
<body>
    <div id="app">

        @if (Auth::guest())

            @include('vendor.navbar-web')

            @yield('content')

        @else
            <div id="wrapper">
                @include('vendor.admin.navbar-admin')
                @include('vendor.admin.main')
            </div><!-- wrapper END -->
        @endif

    </div>
 
    <!-- Scripts -->
    <!-- jQuery -->
    {!! Html::script('js/jquery.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('js/bootstrap.min.js') !!}

    <!-- Metis Menu Plugin JavaScript -->
    {!! Html::script('js/metisMenu.min.js') !!}

    <!-- Custom Theme JavaScript -->
    {!! Html::script('js/sb-admin-2.min.js') !!}
   
    <!-- Other Scripts -->
    @yield('script')
</body>
</html>
