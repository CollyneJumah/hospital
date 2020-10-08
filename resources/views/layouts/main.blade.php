<!DOCTYPE html>
<html lang="en">

@include('partials.header')

<body>
    <div class="main-wrapper">
        <div class="header">
			@include('partials.topnav')
        </div>
        <div class="sidebar" id="sidebar">
            @include('partials.sidebar')
        </div>
        {{-- dashbaord --}}
        <div class="page-wrapper">
            {{-- start yield files --}}
            {{-- @include('partials.dashboard') --}}
            @yield('content')
            {{-- end yield file --}}
            
            @include('partials.footer')
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('partials.scripts')
</body>

</html>