<!DOCTYPE html>
<html lang="en">
<head>
    @include('dibrugarh.layout.header')
    @include('dibrugarh.layout.nevbar')
    @include('dibrugarh.layout.link-bar')


</body>
<main>
    @yield('content')
</main>
@include('dibrugarh.layout.footer')
@yield('scripts')
@stack('scripts')
</html>
