
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
                @include('partials.dashboard')
                @include('partials.footer')
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    @include('partials.scripts')
</body>
</html>