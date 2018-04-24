@extends('frontend.layouts.master')

@section('title', 'Lịch sử mua hàng')

@section('content')
    <div class="ui basic segment">
        <div class="ui blue segment">
            <h3 class="ui dividing header">Lịch sử đơn hàng
                <i class="spinner loading icon" id="loader" style="display: none;"></i>
            </h3>

            <div class="ui basic segment no-padding no-margin">

                {{--<div class="ui dimmer" id="loader">--}}
                    {{--<div class="ui text loader">Đang tải</div>--}}
                {{--</div>--}}

                <table class="ui table striped celled center aligned" id="order-table">
                    <thead>
                    <tr>
                        <th class="collapsing">STT</th>
                        <th class="collapsing">Mã đơn hàng</th>
                        <th>Tổng số tiền</th>
                        <th>Ngày đặt</th>
                        <th>Tình trạng</th>
                        <th>Ngày duyệt đơn</th>
                        <th class="collapsing">Hình thức thanh toán</th>
                        <th>Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $idx => $order)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td>
                                <a class="pointer" onclick="showOrderDetail('{{ $order->ma_don_hang }}')">
                                    {{ $order->ma_don_hang }}
                                </a>
                            </td>
                            <td>{{ \App\Helper\StringHelper::toCurrencyString($order->tong_tien) }}</td>
                            <td>{{ $order->getLongDate('ngay_dat_hang') }}</td>
                            <td>{!! $order->statusHtml() !!}</td>
                            <td>{{ empty($order->ngay_duyet_don) ? '' : $order->getLongDate('ngay_duyet_don') }}</td>
                            <td>{{ $order->paymentType() }}</td>
                            <td>{{ $order->ghi_chu }}</td>
                        </tr>

                        <div class="ui scrolling modal" id="{{ $order->ma_don_hang }}">
                            <i class="close icon"></i>
                            <div class="content">
                                <h3 class="ui blue-text dividing header">Thông tin đơn hàng: {{ $order->ma_don_hang }}</h3>

                                <div class="order-detail-table"></div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function showOrderDetail(orderCode) {
            let url = '/khach-hang/don-hang/' + orderCode;
            console.log(url);
            $('#loader').show();
            axios.get(url).then(res => {
                let modal =  $('#' + orderCode);
                $(modal).find('.order-detail-table').html(res.data);
                $(modal).modal('show');
                $('#loader').hide();
            });
        }
    </script>
@endpush