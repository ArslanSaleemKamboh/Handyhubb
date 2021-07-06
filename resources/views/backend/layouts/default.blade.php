<!DOCTYPE html>
<html lang="en">
<head>
   @include('backend.includes.head')
   @livewireStyles
</head>
<body class="  pace-done">
<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
   <div id="page-loader" class="fade show">
   <span class="spinner"></span>
   </div>
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
@include('backend.includes.header')
@include('backend.includes.sidebar')
@yield('content');
@include('backend.includes.footer')
</div>
@include('backend.includes.scripts')
@livewireScripts
</body>
</html>