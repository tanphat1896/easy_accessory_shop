@extends('frontend.layouts.master')

@section('title', 'Giỏ hàng')

@section('content')
    @include('sharing.components.error')

    <div class="ui segment basic layout-padding clearing">
        {{--<div class="ui blue segment clearing">--}}
            <h3 class="ui dividing header">Giỏ hàng của bạn
                @if(! Auth::guard('customer')->check())
                    <button type="button" class="ui blue basic label pointer small-td-margin no-lr-margin"
                            onclick="$('#modal-auth').modal('show')">
                        Đăng nhập để lưu giỏ hàng của bạn!</button>
                @endif
            </h3>

            <div class="ui basic segment no-padding table-responsive">
                <table class="ui celled striped table center aligned unstackable">
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
                    @php $idx = 1; $total = 0;@endphp
                    @foreach($products as $slug => $productBunch)
                        <tr>
                            <td class="center aligned">{{ $idx++ }}</td>
                            <td class="left aligned">
                                <img src="{{ $productBunch['product']->anh_dai_dien }}" class="ui spaced mini image">
                                {{ $productBunch['product']->getName() }}</td>
                            <td>
                                <form action="{{ route('cart.update', [$slug]) }}"
                                      class="ui form no-padding no-margin force-inline"
                                      method="post" id="{{ 'form-update-amount' . $idx }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="field limit-size">
                                        <input type="number" value="{{ $productBunch['amount'] }}"
                                               name="amount" min="1" max="5"
                                               class="small-lr-padding"
                                               onchange="$('#{{ 'form-update-amount' . $idx }}').submit()">
                                    </div>
                                </form>
                            </td>
                            <td>
                                @php $total += $productBunch['cost']; @endphp
                                {{ number_format($productBunch['cost']) }}
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
                        <th colspan="2" class="center aligned">
                        <span class="ui basic red large label">
                            <strong>{{ number_format($total) }}đ</strong>
                        </span>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <div class="ui divider hidden clearing no-margin no-padding"></div>

            <div class="ui basic segment right floated no-padding no-margin">
                <a href="/" class="ui icon button">
                    <i class="backward icon"></i>
                    <strong>Trở lại</strong>
                </a>

                @if (!empty($products))
                    <a href="{{ route('checkout.index') }}" class="ui blue icon button">
                        <strong>Thanh toán</strong>
                        <i class="forward right icon"></i>
                    </a>
                @endif
            </div>
        {{--</div>--}}
        <div class="ui divider hidden"></div>
    </div>
@endsection
