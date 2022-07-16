<!doctype html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>
  <body>
    @include('includes.login-head')
        <main>
            @yield('content')
        </main>
        <footer>
            @include('includes.login-foot')
        </footer>
  </body>
</html>
