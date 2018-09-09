<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Blog</title>
        <!-- Styles -->
    
        {!!Html::style('css/bootstrap.min.css') !!}
       
        {!!Html::style('css/style.css') !!}
        @yield('styles')
    </head>
    <body>

        @include('_partials.nav')
     
    <div class="container">
      
            @include('_partials.message')
             @yield('content')
           
    </div>


      <!-- Scripts -->
   
      {!! Html::script('js/jquery-3.3.1.slim.min.js') !!}
        
      {!! Html::script('js/bootstrap.min.js') !!}
     @yield('scripts')
    </body>
</html>
