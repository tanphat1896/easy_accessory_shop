@extends('frontend.layouts.master')

@section('title', 'Thanh toán')

@section('content')
    <div class="ui segment basic">
        <div class="ui container">
            <h2 class="ui dividing header">
                Thanh toán
                <span class="ui blue label pointer" onclick="$('#order-detail').modal('show')">
                    Xem đơn hàng
                </span>
            </h2>

            <form action="{{ route('checkout.store') }}" method="post"
                  class="ui basic form segment no-lr-padding">

                <h4 class="ui blue-text dividing header">Phương thức thanh toán</h4>

                <div class="three fields">

                    {{ csrf_field() }}

                    <input type="hidden" name="total-cost" value="{{ $totalCost }}">

                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type-checkout" value="cash" id="cash" checked>
                            <label for="cash">Tiền mặt khi nhận hàng</label>
                        </div>
                    </div>

                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type-checkout" value="ngan-luong" id="ngan-luong">
                            <label for="online">Thanh toán qua Ngân lượng</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type-checkout" value="bao-kim" id="bao-kim">
                            <label for="online">Thanh toán qua Bảo kim</label>
                        </div>
                    </div>
                </div>

                <h4 class="ui blue-text dividing header">
                    Thông tin khách hàng

                    @if (! Auth::guard('customer')->check())
                        <button type="button" class="ui basic orange label pointer"
                                onclick="$('#modal-auth').modal('show');">
                            <strong>Đã có tài khoản?</strong>
                        </button>
                    @endif

                </h4>

                <div class="three fields">

                    <div class="field required">
                        <label for="name">Họ và tên</label>
                        <input type="text" id="name" name="name" value="Nguyen Van A" required>
                    </div>

                    <div class="field required">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"  value="nva@gmail.com" required>
                    </div>

                    <div class="field required">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" id="phone" name="phone" value="0969696969" required>
                    </div>
                </div>

                <div class="field required">
                    <label for="address">Địa chỉ nhận hàng</label>
                    <textarea name="address" id="address" rows="3" required>Ninh Kieu, Can Tho</textarea>

                </div>

                <div class="field">
                    <button class="ui large fluid blue button">
                        <i class="cart arrow down fitted icon"></i>
                        <strong>Đặt hàng</strong>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="ui scrolling modal" id="order-detail">
        <div class="content">
            <h3 class="ui blue-text dividing header">Thông tin đơn hàng</h3>

            <table class="ui compact table square-border">
                <thead>
                <tr class="center aligned">
                    <th>Mặt hàng</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="/{{ $product['product']->anh_dai_dien }}" class="ui mini image spaced">
                            {{ $product['product']->getName() }}
                        </td>
                        <td class="center aligned">{{ $product['amount'] }}</td>
                        <td>{{ number_format($product['cost']) }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="right aligned"><strong>Tổng cộng</strong></th>
                    <th class="center aligned">{{ $totalAmount }}</th>
                    <th><span class="ui red label">{{ number_format($totalCost) }}đ</span></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.ui.radio.checkbox').checkbox();
    </script>
@endpush