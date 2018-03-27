<body>
@include ('admin.layouts.partials.navbar')

{{--@include ('admin.layouts.components.sidebar_thin')--}}

{{--@include ('admin.layouts.components.sidebar_wide')--}}

@include('admin.layouts.partials.sidebar')

<div class="ui basic segment" id="main-container">

@yield('content')

</div>
</body>