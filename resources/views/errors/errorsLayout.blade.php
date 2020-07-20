<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>@yield('title')</title>
   {{-- Bootstrap stylesheets --}}
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'/>
</head>
<body>
   <div class="error__wrapper bg-light">
      <div class="error container vh-100 d-flex justify-content-center align-items-center">
         <div class="error__code__img mw-50 d-flex flex-column align-items-center p-3 border border-info border-top-0 border-bottom-0 border-left-0">
            <div class="error__img__wrapper mw-100">
            <img class="error__img mw-100" src="{{ url('error_images/pngwave.png') }}" alt="error__img">
            </div>
            <h1 class="error__code mw-100 text-danger">Error @yield('code')</h1>
            <h2 class="error__subtitle mw-100">@yield('subtitle')</h2>
         </div>
         <div class="error__description__btn mw-50 d-flex flex-column align-items-center p-3">
            <div class="error__description mw-100 mb-5">@yield('description')</div>
            <a class="btn btn-success" href="{{ url('/') }}" class="error__btn">Torna alla homepage</a>
         </div>
      </div>
   </div>
</body>
</html>