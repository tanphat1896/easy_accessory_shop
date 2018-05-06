@extends('admin.layouts.master')

@section('title', 'Tài chính')

@section('content')
    <div class="ui blue raised segment">

        <h3 class="ui dividing header">Thống kê doanh thu</h3>

        @include('admin.dashboard.account.today')

        <div class="ui divider"></div>

        <h4 class="ui header">Biểu đồ thống kê</h4>

        <form class="ui tiny form" onsubmit="renderChart(event)">
            <div class="inline fields">
                <div class="field" id="select-type">
                    <label>Xem theo: </label>
                    <select name="type" id="type" onchange="show()">
                        <option value="year">Năm</option>
                        <option value="quarter">Quý</option>
                        <option value="month">Tháng</option>
                        <option value="day">Ngày</option>
                    </select>
                </div>
                <div class="field will-hide" id="select-year" style="display: none;">
                    <select name="year" id="year">
                        @for($i = date('Y'); $i >= 2014 ; $i--)
                            <option value="{{ $i }}">Năm {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field will-hide" id="select-quarter" style="display: none;">
                    <select name="quarter" id="quarter">
                        @for($i = 1; $i <= 4 ; $i++)
                            <option value="{{ $i }}">Quý {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field will-hide" id="select-month" style="display: none;">
                    <select name="month" id="month">
                        @for($i = 1; $i <= 12 ; $i++)
                            <option value="{{ $i }}">Tháng {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field will-hide" id="select-day-start" style="display: none;">
                    <label>Từ ngày: </label>
                    <select name="month" id="day-start">
                        @for($i = 1; $i <= 31 ; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field will-hide" id="select-day-end" style="display: none;">
                    <label>Đến ngày: </label>
                    <select name="month" id="day-end">
                        @for($i = 1; $i <= 31 ; $i++)
                            <option value="{{ $i }}" {{ $i == 5 ? 'selected': '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="field" id="btn-view">
                    <button class="ui blue label">OK</button>
                </div>
            </div>
        </form>
        
        <div class="ui grid">

            <div class="ten wide column">

                <h5 class="ui header">Giá trị mua bán theo thời gian (Đơn vị: triệu đồng)</h5>

                @include('admin.dashboard.account.revenue')

            </div>
            <div class="six wide column">

                <h5 class="ui header">&nbsp;</h5>

                @include('admin.dashboard.account.table')

            </div>
        </div>
        @include('admin.dashboard.account.paying')
    </div>
@endsection



@push('script')
    <script>

    </script>
@endpush