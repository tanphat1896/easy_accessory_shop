@extends('frontend.layouts.master')

@section('title', $product->getName())

@php
// reduce eloquent query
$price = $product->giaMoiNhat();
@endphp

@section('content')
    <div class="ui basic segment no-margin-top">
        <div class="ui container">

            <div class="ui divider hidden"></div>

            <div class="ui grid stackable">

                <div class="four wide column">
                    @include('frontend.product_viewer.slider')
                </div>

                <div class="column"></div>

                <div class="eleven wide column">

                    <h3 class="ui dividing header">
                        {{ $product->getName() }}
                        {{--<span class="ui tiny red label"> Giảm giá 30% </span>--}}
                    </h3>
                    <div class="ui two columns grid stackable">
                        <div class="column">

                            <h3 class="ui header">
                                Giá: <span class="red-text">{{ number_format($price) }} đ</span>
                            </h3>

                            <div class="ui divider hidden"></div>

                            {{--Kiểm tra ngừng kinh doanh --}}


                            @if ($product->so_luong < 1)
                                @include('frontend.product_viewer.partial.out_of_stock')
                            @elseif ($product->tinh_trang > 0)
                                @include('frontend.product_viewer.partial.form_order')
                            @else
                                <div class="ui basic red big label">Ngừng kinh doanh</div>
                            @endif

                        </div>
                        <div class="column">
                            Đánh giá:

                            @component('sharing.components.star')
                                {{ $product->diem_danh_gia }}
                            @endcomponent
                            ({{ $product->ratingCount() }} đánh giá)

                            @include('frontend.product_viewer.rating')

                            <ul class="ui blue list">
                                <li>Bảo hành chính hãng 12 tháng</li>
                                <li>Giao hàng miễn phí</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            @include('frontend.product_viewer.infomation')
        </div>
    </div>
@endsection

@push('script')
    <script>
        function updateTotalPrice() {
            let price = parseInt('{{ $price }}');
            let amount = $('#amount');

            if ($(amount).val() > 20)
                $(amount).val(20);

            let total = price * $(amount).val();
            total  = total.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1,');
            $('#total-cost').text(total + " đ");
        }
    </script>
@endpush