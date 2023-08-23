<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    
    {{-- style --}}
    @stack('prepend-style')
         @include('includes.style')
    @stack('addon-style')
  </head>

  <body>
    <!-- Page Content -->
    @yield('content')
    <!-- Scripts -->
    @stack('prepend-scripst')
        @include('includes.scripts')
    @stack('addon-scripts')
  </body>
</html>
