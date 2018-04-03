@extends('frontend.layouts.master')

@section('title', 'Giỏ hàng')

@section('content')
    <div class="ui segment basic">
        <div class="ui container">
            <h3 class="ui dividing header">Giỏ hàng của bạn</h3>

            <table class="ui celled striped table">
                <thead>
                <tr>
                    <th class="center aligned collapsing">STT</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th class="collapsing">Thao tác</th>
                </tr>

                </thead>
                <tbody>
                @php $idx = 1; $total = 0; @endphp
                @foreach($products as $slug => $productBunch)
                    <tr>
                        <td class="center aligned">{{ $idx++ }}</td>
                        <td>{{ $productBunch['product']->getName() }}</td>
                        <td>
                            <form action="{{ route('cart.update', [$slug]) }}"
                                  class="ui form no-padding no-margin force-inline"
                                  method="post" id="{{ 'form-update-amount' . $idx }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="field">
                                    <input type="number" value="{{ $productBunch['amount'] }}"
                                           name="amount"
                                           onchange="$('#{{ 'form-update-amount' . $idx }}').submit()">
                                </div>
                            </form>
                        </td>
                        <td>
                            @php
                                $eachTotal = $productBunch['product']->giaMoiNhat() *
                                            $productBunch['amount'];
                                $total += $eachTotal;
                            @endphp
                            {{ number_format($eachTotal) }}
                        </td>
                        <td class="center-aligned">
                            <form action="{{ route('cart.remove', [$slug]) }}"
                                  method="post"
                                  class="force-inline no-padding no-margin">
                                {{ csrf_field() }}

                                {{ method_field('DELETE') }}

                                <button class="ui red small label pointer">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="3" class="center aligned"><strong>Tổng tiền</strong></th>
                    <th colspan="2"><span class="red text"><strong>{{ number_format($total) }} đ</strong></span></th>
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