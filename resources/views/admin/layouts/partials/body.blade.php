<body>
@include ('admin.layouts.components.navbar')

{{--@include ('admin.layouts.components.sidebar_thin')--}}

{{--@include ('admin.layouts.components.sidebar_wide')--}}

@include('admin.layouts.components.sidebar')

<div class="ui basic segment" id="main-container">

@yield('content')

</div>
</body>