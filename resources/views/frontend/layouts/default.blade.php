<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.head')
</head>
<body>
<div id="wrapper">
    @include('frontend.includes.header')
    @yield('content')
    @include('frontend.includes.footer')
</div>
    @include('frontend.includes.scripts')
</body>
</html>