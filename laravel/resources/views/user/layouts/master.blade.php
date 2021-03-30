<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('user.layouts.head')
    
@section('body')
    <body>

        @include('user.layouts.header')

        @yield('contenido')

        @include('layouts.footer')
    </body>
@show

</html>