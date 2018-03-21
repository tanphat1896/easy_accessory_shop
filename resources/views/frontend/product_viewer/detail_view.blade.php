@extends('frontend.layouts.master')

@section('title', 'Chi tiết mặt hàng')

@push('style')
    <link rel="stylesheet" href="{{ asset('plugin/fotorama/fotorama.css') }}">
@endpush
@push('script')
    
@endpush

@section('content')
<div class="ui basic segment no-margin-top">
    <div class="ui container">

        @include('frontend.product_viewer.breadcrumb')

        <div class="ui divider hidden"></div>

        <div class="ui grid stackable">
            <div class="five wide column">
                @include('frontend.product_viewer.slider')
            </div>
            <div class="eleven wide column">

                <h3 class="ui dividing header">
                    USB Apacer 8GB
                    <span class="ui tiny red label"> Giảm giá 30% </span>
                </h3>
                <div class="ui two columns grid stackable">
                    <div class="column">

                        <h3 class="ui green header">Giá: 140.000 đ
                        </h3>

                        <div class="ui divider hidden"></div>

                        <form action="{{ action('CardController@addProductToCart', [1]) }}" class="ui form" method="post">
                            {{ csrf_field() }}
                            <div class="four fields">
                                <div class="field">
                                    <label for="">Số lượng</label>
                                    <input type="number" value="1">
                                </div>
                                <div class="field">
                                    <label for="">Tổng số tiền</label>
                                    <span class="ui green header">140.000 đ</span>
                                </div>
                            </div>

                            <div class="field">
                                <button class="ui blue button">
                                    <i class="cart icon"></i> Thêm vào giỏ
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="column">
                        Đánh giá: <span class="ui star rating" data-rating="4"></span> (2 đánh giá)

                        <ul class="ui blue list">
                            <li>Bảo hành chính hãng 12 tháng</li>
                            <li>Giao hàng miễn phí</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection