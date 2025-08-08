<!DOCTYPE html>
<html lang="vi">
  <head>
    @include('frontend.parts.head')
  </head>
  <body>
    <header class="header">
      @include('frontend.parts.header')
    </header>

    <section id="content-page">
        @yield('content')
    </section>

    


    <footer class="footer">
      @include('frontend.parts.footer')
    </footer>
  </body>
</html>
