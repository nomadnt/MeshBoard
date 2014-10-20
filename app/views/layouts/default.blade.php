<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="nomadnt.com">
    <meta name="robots" content="all" />
    
    <title>MeshBoard</title>
    <link href='http://fonts.googleapis.com/css?family=Nova+Square:300,400,600,700' rel='stylesheet' type='text/css'>

    <!--Le HTML5 shim, for IE6-8 support of HTML5 elements--> 
    <!--[if lt IE 9]>
      {{ HTML::script('//html5shim.googlecode.com/svn/trunk/html5.js') }}
    <![endif]-->

    <!-- Stylesheet Section -->
    @section('styles')
    {{ HTML::style(asset('css/bootstrap.min.css')) }}
    {{ HTML::style(asset('css/bootstrap-theme.min.css')) }}
    {{ HTML::style(asset('css/style.css')) }}
    @show

    <!-- Favicon and touch section -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>
</head>
<body>
  <div id="wrap">
    @section('navbar')
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">{{ trans('Toggle navigation') }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">MeshBoard</a>
        </div>

        <div class="collapse navbar-collapse">
          <!-- Left menu -->
          <ul class="nav navbar-nav">
            <li>
              <a href="{{ url('network') }}">
                <i class="glyphicon glyphicon-tasks"></i> {{ trans('Networks') }}
              </a>
            </li>
          </ul>

          <!-- Right menu -->
          @if(Auth::check())
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                {{ Auth::user()->email }}
              </a>
              <ul class="dropdown-menu">          
                <li>
                  <a href="{{ url('user/profile') }}">
                    <i class="glyphicon glyphicon-cog"></i> {{trans('User Profile')}}
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="{{ url('user/logout') }}">
                    <i class="glyphicon glyphicon-off"></i> {{trans('Logout')}}
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          @endif
        </div>
      </div>
    </nav>
    @show

    <div class="container">
      @yield('content')
    </div>
  </div>

  <div id="footer">
    <div class="container">
      <p class="text-muted">Powered by <a href="http://nomadnt.com/">Nomad NT</a></p>
    </div>
  </div>

  @section('scripts')

  {{ HTML::script('js/jquery.min.js') }}
  {{ HTML::script('js/bootstrap.min.js') }}
  {{-- HTML::script('js/app.js') --}}

  @show
</body>
</html>