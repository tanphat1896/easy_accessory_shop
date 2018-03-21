@extends('frontend.layouts.master')

@section('title', 'Trang chủ')

@section('content')
    <div class="ui basic segment">
        
        @include('frontend.layouts.partials.slider_news')

        @include('frontend.product_category.ssd')

        @include('frontend.product_category.usb')

        <div class="ui top attached segment"> Sản phẩm hot </div>
        <div class="ui attached segment">
            blblablabal
        </div>

        <div class="ui top attached segment"> Khuyen mai </div>
        <div class="ui attached segment">
            blblablabal
        </div>

    </div>
@endsection

@push('script')
    <script>
        $('.ui.search').search({
            source: [
                {title: 'Apacer fds fsda fdsa', price: "200.000 VND", image: '{{ asset('assets/images/uploaded/products/usb/usb-31-16gb-apacer-ah356-anhava-200x200.jpg') }}'},
                {title: 'Sony fds fsda fdsa', price: "250.000 VND", image: '{{ asset('assets/images/uploaded/products/usb/usb-31-16gb-apacer-ah356-anhava-200x200.jpg') }}'},
                {title: 'Sandisk fds fsda fdsa', price: "165.000 VND", image: '{{ asset('assets/images/uploaded/products/usb/USB-apacer-AH328-300-nowatermark-200x200.jpg') }}'},
                {title: 'Transcend fds fsda fdsa', price: "190.000 VND", image: '{{ asset('assets/images/uploaded/products/usb/usb-8gb-20-apacer-ah112-200x200.jpg') }}'},
                {title: 'Blabla fds fsda fdsa', price: "100.000 VND", image: '{{ asset('assets/images/uploaded/products/usb/usb-sandisk-sdcz50-8gb-20-xanh-duong-200x200.jpg') }}'},
            ]
        });

        $('.ui.rating').rating('disable');
    </script>
@endpush