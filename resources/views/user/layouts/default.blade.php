
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
    <div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
    @yield('content')
    @include('user.includes.footer')
        </div>
    </div>
    </div>
</div>
    @include('user.includes.scripts')
</body>
</html>