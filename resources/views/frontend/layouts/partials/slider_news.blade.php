@push('style')
    <style type="text/css">
        .feed .label {
            width: 60px !important;
        }
        .feed .label img{
            border-radius: 0 !important;
        }
    </style>
@endpush
<div class="ui grid stackable computer only">
    <div class="ten wide column">
        <div class="fotorama" data-autoplay="3s">
            <a href="{{ asset('assets/images/slider/1.png') }}">
                <img src="{{ asset('assets/images/slider/1.png') }}">
            </a>
            <a href="{{ asset('assets/images/slider/22.jpg') }}">
                <img src="{{ asset('assets/images/slider/22.jpg') }}">
            </a>
            <a href="{{ asset('assets/images/slider/2.png') }}">
                <img src="{{ asset('assets/images/slider/2.png') }}">
            </a>
            <a href="{{ asset('assets/images/slider/33.jpg') }}">
                <img src="{{ asset('assets/images/slider/33.jpg') }}">
            </a>
            <a href="{{ asset('assets/images/slider/4.jpg') }}">
                <img src="{{ asset('assets/images/slider/4.jpg') }}">
            </a>
        </div>
    </div>
    <div class="six wide column">
        <div class="ui basic segment no-padding" id="news">
            <div class="ui blue ribbon label">
                <i class="newspaper outline icon"></i>
                Tin tức
            </div>
            <div class="ui feed">
                <div class="event">
                    <div class="label">
                        <img src="{{ asset('assets/images/uploaded/products/ssd/12_5_2_1.jpg') }}">
                    </div>
                    <div class="content">
                        <div class="summary">
                            <a href="#">Sandisk ra mắt SSD 10TB</a>
                            <div class="date">
                                12 giờ trước
                            </div>
                        </div>
                        <div class="extra text">
                            Hãng Sandisk của Mỹ vừa cho ra mắt loại SSD SLC 10TB với giá trên trời.
                        </div>
                    </div>
                </div>
                <div class="event">
                    <div class="label">
                        <img src="{{ asset('assets/images/uploaded/products/ssd/12_5_2_1.jpg') }}">
                    </div>
                    <div class="content">
                        <div class="summary">
                            <a href="#">Sandisk ra mắt SSD 10TB</a>
                            <div class="date">
                                12 giờ trước
                            </div>
                        </div>
                        <div class="extra text">
                            Hãng Sandisk của Mỹ vừa cho ra mắt loại SSD SLC 10TB với giá trên trời.
                        </div>
                    </div>
                </div>
                <div class="event">
                    <div class="label">
                        <img src="{{ asset('assets/images/uploaded/products/ssd/12_5_2_1.jpg') }}">
                    </div>
                    <div class="content">
                        <div class="summary">
                            <a href="#">Sandisk ra mắt SSD 10TB</a>
                            <div class="date">
                                12 giờ trước
                            </div>
                        </div>
                        <div class="extra text">
                            Hãng Sandisk của Mỹ vừa cho ra mắt loại SSD SLC 10TB với giá trên trời.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>