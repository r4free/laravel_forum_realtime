<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.defaults.head')
    <body>
       <div id="app">

           @include('layouts.defaults.header')
           <main>
               @yield('content')
            </div>
        </main>
        @include('layouts.defaults.footer')
    </body>
    @include('layouts.defaults.scripts')
</html>
