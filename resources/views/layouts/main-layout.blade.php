<!doctype html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>
  <body>
        <header>
            @include('includes.header')
        </header>
        <aside>
            @include('includes.sidebar')
        </aside>
        <main id="main" class="main">
            @yield('content')
        </main>
        <footer>
            @include('includes.footer')
        </footer>
  </body>
</html>
