<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <title>Book Sharing</title>
  
  @include('frontend.layouts.partials.style')

</head>
<body>

  @include('frontend.layouts.partials.header')
  @yield('content')
  @include('frontend.layouts.partials.footer')
  @include('frontend.layouts.partials.script')

</body>
</html>
