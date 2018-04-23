
<div class="ui grid stackable computer only">
    
    <div class="ten wide column">
        <div class="fotorama" data-autoplay="1s">
            @foreach($sliders as $slider)
                <a href="{{ asset($slider->hinh_anh) }}">
                    <img src="{{ asset($slider->hinh_anh) }}">
                </a>
            @endforeach
        </div>
    </div>

    <div class="six wide column">
        @include('frontend.index.news')
    </div>
</div>