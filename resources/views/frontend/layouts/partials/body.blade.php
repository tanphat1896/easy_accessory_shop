<body>

@include('sharing.components.message')

<div class="ui grid tablet computer only">
    <div class="sixteen wide column">
        @include('frontend.layouts.partials.top_segment')

        @include('frontend.layouts.partials.menu.menu')
    </div>
</div>
@include('frontend.layouts.partials.sidebar')
<div class="ui padded grid mobile only">
    <div class="sixteen wide column no-margin no-padding">
        @include('frontend.layouts.partials.menu.mobile')
    </div>
</div>

<div class="pusher">
    @yield('content')
</div>

@include('sharing.components.scrolltop_button')
</body>