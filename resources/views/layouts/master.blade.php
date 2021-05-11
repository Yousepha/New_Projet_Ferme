<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style_dashboard_admin.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <!------ Include the above in your HEAD tag ---------->
  </head>
  
  <body>
    
    <!--wrapper start-->
		<div class="wrapper">

        <!--header menu start-->
        @include('partials.header')
        <!--header menu end-->
      
        <!--sidebar start-->
        @include('partials.sidebar')
        <!--sidebar end-->
        <style>
          .main-container{
          	min-height:100vh;
          }
        </style>
        <!--main container start-->
        <div class="main-container">
            <main class="container">
              @yield('content')
            </main>
      
            @include('partials.footer')

        </div>
        <!--main container end-->
	  	  
    </div>
    <!--wrapper end-->
        
    @include('partials.javascript')

  </body>
</html>