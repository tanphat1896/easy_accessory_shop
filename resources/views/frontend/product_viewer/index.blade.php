@extends('frontend.layouts.master')

@section('title', $product->getName())

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
                                Giá: <span class="red-text">{{ number_format($product->giaMoiNhat()) }} đ</span>
                            </h3>

                            <div class="ui divider hidden"></div>

                            <form action="{{ action('CardController@addProductToCart', [$product->id]) }}"
                                  class="ui form" method="post">
                                {{ csrf_field() }}

                                <div class="two fields">
                                    <div class="field">
                                        <label for="">Số lượng</label>
                                        <input type="number" value="1" min="1" max="20" name="amount" id="amount"
                                               onchange="updateTotalPrice()">
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="">Tổng số tiền</label>
                                    <span class="ui green header" id="total-cost">{{ number_format($product->giaMoiNhat()) }} đ</span>
                                </div>

                                <div class="field">
                                    <button class="ui blue button">
                                        <i class="cart icon"></i> Thêm vào giỏ
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="column">
                            Đánh giá:

                            @guest
                                @component('frontend.product_category.components.star')
                                    {{ $product->diem_danh_gia }}
                                @endcomponent
                                (2 đánh giá)
                            @else
                                <span class="ui star rating" data-rating="4" data-max-rating="5"></span>
                            @endguest

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

@push('script')
    <script>
        function updateTotalPrice() {
            let price = parseInt('{{ $product->giaMoiNhat() }}');
            let amount = $('#amount');

            if ($(amount).val() > 20)
                $(amount).val(20);

            let total = price * $(amount).val();
            total  = total.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1,');
            $('#total-cost').text(total + " đ");
        }
    </script>
@endpush