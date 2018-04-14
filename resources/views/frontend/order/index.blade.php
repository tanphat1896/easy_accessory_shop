@extends('frontend.layouts.master')

@section('title', 'Kiểm tra đơn hàng')

@section('content')
    <div class="ui basic segment layout-padding">

        @if (empty($order))
            <h3 class="ui header dividing">Kiểm tra đơn hàng:</h3>

            <form action="{{ route('order.show', ['s']) }}" class="ui small form">
                <div class="inline fields">
                    <div class="inline field">
                        <label>Mã đơn hàng:</label>
                        <input type="text" name="code" placeholder="Mã đơn hàng của bạn" value="DH_5acb7de430dfd">
                    </div>
                    <div class="field">
                        <button class="ui small blue button ">Kiểm tra</button>
                    </div>
                </div>
            </form>
        @else

            @include('frontend.order.detail')

        @endif
    </div>
@endsection