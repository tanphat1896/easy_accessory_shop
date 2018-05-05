<body>
@include ('admin.layouts.partials.navbar')

@include('admin.layouts.partials.sidebar')

<div class="ui basic segment" id="main-container" style="margin-left: {{ $wideMenu ? '220px': '50px' }}">

@yield('content')

</div>

@include('sharing.components.scrolltop_button')
</body>