<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.includes.head')
</head>
<body>
<div id="wrapper">
    @include('user.includes.header')
    <div class="dashboard-container">
    @include('user.includes.sidebar')
    @yield('content')
    </div>
</div>
    @include('user.includes.footer')
    @include('user.includes.scripts')
</body>
</html>