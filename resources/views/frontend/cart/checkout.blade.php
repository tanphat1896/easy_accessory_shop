@extends('frontend.layouts.master')

@section('title', 'Thanh toán')

@section('content')
    <div class="ui segment basic">
        <div class="ui container">
            <h1 class="ui dividing header">Thanh toán</h1>

            <div class="ui blue horizontal divider header">Phương thức thanh toán</div>
            <div class="ui big positive message">
                Tổng số tiền: <strong>1.370.000</strong> VND
            </div>
            <div class="ui form">
                <div class="four fields">
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type-checkout" id="cash" checked>
                            <label for="cash"><strong>Tiền mặt khi nhận hàng</strong></label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type-checkout" id="ngan-luong">
                            <label for="online"><strong>Thanh toán qua Ngân lượng</strong></label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="type-checkout" id="bao-kim">
                            <label for="online"><strong>Thanh toán qua Bảo kim</strong></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui blue horizontal divider clearing header">Thông tin khách hàng</div>

            <button class="ui basic blue button"
                    onclick="$('#modal-auth').modal('show');">
                <strong>Đã có tài khoản?</strong>
            </button>

            <form action="" class="ui basic form segment no-lr-padding">
                <div class="two fields">
                    <div class="field required">
                        <label for="name">Họ và tên</label>
                        <input type="text" id="name">
                    </div>
                    <div class="field required">
                        <label for="email">Email</label>
                        <input type="text" id="email">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field required">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" id="phone">
                    </div>

                    <div class="field required">
                        <label for="city">Tỉnh/Thành phố</label>
                        <select name="city" id="city" class="ui search dropdown no-margin ">
                            <option value="ct">Cần Thơ</option>
                            <option value="dt">Đồng Tháp</option>
                            <option value="vl">Vĩnh Long</option>
                            <option value="vl">TP. HCM</option>
                            <option value="vl">TP. Đà Năng</option>
                            <option value="vl">Hà Nội</option>
                        </select>
                    </div>
                </div>

                <div class="field required">
                    <label for="address">Địa chỉ nhận hàng</label>
                    <input type="text" id="address">
                </div>

                <div class="field">
                    <button class="ui large fluid blue button"><strong>Đặt hàng</strong></button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.ui.radio.checkbox').checkbox();
    </script>
@endpush