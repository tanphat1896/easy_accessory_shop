@extends('frontend.layouts.master')

@section('title', 'Thanh toán')

@section('content')
    <div class="ui segment basic layout-padding">
        {{--<div class="ui blue segment">--}}
            <div class="ui basic segment">
                <h2 class="ui header center aligned">
                    Thanh toán
                </h2>

                <div class="ui stackable grid">
                    <div class="four wide column">
                        <div class="ui basic segment no-lr-padding">
                            <h4 class="ui blue-text dividing header">Tổng số tiền:</h4>

                            <span class="ui red big label">{{ number_format($totalCost) }}đ</span>

                            <div class="ui divider hidden"></div>

                            <div class="ui blue label pointer" onclick="$('#order-detail').modal('show')">
                                Xem đơn hàng
                            </div>
                        </div>
                    </div>

                    <div class="twelve wide column">
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
                                        <input type="radio" name="type-checkout" value="nganluong" id="ngan-luong">
                                        <label for="online">Thanh toán qua Ngân lượng</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="type-checkout" value="baokim" id="bao-kim">
                                        <label for="online">Thanh toán qua Bảo kim</label>
                                    </div>
                                </div>
                            </div>

                            <h4 class="ui blue-text dividing header">
                                Thông tin khách hàng

                                @if (! Auth::guard('customer')->check())
                                    <button type="button" class="ui basic blue label pointer no-lr-margin small-td-margin"
                                            onclick="$('#modal-auth').modal('show');">
                                        <strong>Đã có tài khoản?</strong>
                                    </button>
                                @endif

                            </h4>

                            <div class="three fields">

                                @if (Auth::guard('customer')->check())
                                    <input type="hidden" name="customer-id" value="{{ Auth::guard('customer')->user()->id }}">

                                    <div class="field required">
                                        <label for="name">Họ và tên</label>
                                        <input type="text" id="name" name="name" required
                                               value="{{ Auth::guard('customer')->user()->name }}">
                                    </div>

                                    <div class="field required">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" required
                                               value="{{ Auth::guard('customer')->user()->email }}">
                                    </div>

                                    <div class="field required">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" id="phone" name="phone" required
                                               value="{{ Auth::guard('customer')->user()->phone }}" >
                                    </div>
                                @else
                                    <div class="field required">
                                        <label for="name">Họ và tên</label>
                                        <input type="text" id="name" name="name" required value="Nguyen Van A">
                                    </div>

                                    <div class="field required">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" required value="nva@gmail.com">
                                    </div>

                                    <div class="field required">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" id="phone" name="phone" required value="0969696969" >
                                    </div>
                                @endif

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
            </div>
        {{--</div>--}}
    </div>

    <div class="ui scrolling modal" id="order-detail">
        <div class="content">
            <h3 class="ui blue-text dividing header">Thông tin đơn hàng</h3>

            <table class="ui compact table square-border">
                <thead>
                <tr class="center aligned">
                    <th>Mặt hàng</th>
                    <th>Đơn giá</th>
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
                        <td>{{ number_format($product['product']->giaMoiNhat()) }}đ</td>
                        <td class="center aligned">{{ $product['amount'] }}</td>
                        <td class="center aligned">{{ number_format($product['cost']) }}đ</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="right aligned" colspan="2"><strong>Tổng cộng</strong></th>
                    <th class="center aligned">{{ $totalAmount }}</th>
                    <th class="center aligned"><span class="ui red label">{{ number_format($totalCost) }}đ</span></th>
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