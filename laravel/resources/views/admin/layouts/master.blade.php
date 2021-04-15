<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('admin.layouts.head')
    
@section('body')
    <body>

        @include('admin.layouts.header')

        @yield('contenido')

    </body>
@show

</html>