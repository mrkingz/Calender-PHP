<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials._head')
    <body>
        <div id="app">
          @yield('navbar')

            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
