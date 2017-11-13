<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Weather') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/weather.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.css" type="text/css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.0.1/sweetalert.min.js"></script>
</head>
<body>
    <script>
        $( document ).ready(function(){
            $( document ).on('click', '.deletable', function(e){
                    e.preventDefault();
                    var button = $(this);
                    var custom = '';
                    if (button.attr('data-custom')){
                            var custom = "\n" + button.data('custom');
                    }
                    swal({
                            title: "Jesteś pewny?",
                            text: "Usuniętego obiektu nie będzie można przywrócić!" + custom,
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Tak, jestem pewny!",
                            cancelButtonText: "Anuluj!",
                            closeOnConfirm: true,
                            closeOnCancel: true
                    }, function(c){
                            if (c) {
                                    document.location = button.data('href');
                            }
                    });
            });
        });
    </script>
    @if ( session('success') )
        <script type="text/javascript">
            swal("", "{{ session('success') }}", "success");
        </script>
    @endif
    @if ( session('error') )
            <script type="text/javascript">
                swal("", "{{ session('error') }}", "error");
            </script>
    @endif
    @if (isset($errors))
            <?php $errorss = ''; ?>
            @foreach ($errors->all() as $error)

                <?php $errorss .= $error.'\n'; ?>

            @endforeach
            @if ($errorss != '')
                <script type="text/javascript">
                    swal("", "{{ $errorss }}", "error");
                </script>
            @endif
    @endif
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Weather') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('cities.index') }}">Zarządzanie miastami</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div style="padding-bottom:20px;" class="panel-heading">
                            @yield('title')
                            <div class="pull-right">
                                @yield('buttons')
                            </div>
                        </div>

                        <div class="panel-body">
                            @yield('content')
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
