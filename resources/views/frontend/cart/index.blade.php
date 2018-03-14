@extends('frontend.layouts.master')

@section('title', 'Giỏ hàng')

@section('content')
    <div class="ui segment basic">
        <div class="ui container">
            <h3 class="ui dividing header">Giỏ hàng của bạn</h3>

            <table class="ui celled striped table">
                <thead>
                <tr>
                    <th>Số TT</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>SSD Flextor 128GB</td>
                    <td>
                        <div class="ui mini input no-margin">
                            <input type="number" value="1">
                        </div>
                    </td>
                    <td>1.370.000</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="3">Tổng tiền</th>
                    <th><span class="red text"><strong>1.370.000</strong></span></th>
                </tr>
                </tfoot>
            </table>

            <div class="ui divider hidden clearing no-margin no-padding"></div>

            <div class="ui basic segment right floated no-padding no-margin">
                <a href="/" class="ui icon button">
                    <i class="backward icon"></i>
                    <strong>Tiếp tục mua sắm</strong>
                </a>
                <a href="/checkout" class="ui blue icon button">
                    <strong>Thanh toán</strong>
                    <i class="forward right icon"></i>
                </a>
            </div>
        </div>
    </div>
@endsection