<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    @include('partials.style')
  </head>
  <body>
    <div class="container">
        @yield('content')
    </div>
        @include('partials.script')
  </body>
</html>