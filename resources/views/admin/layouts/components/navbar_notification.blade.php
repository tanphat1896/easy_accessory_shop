@php
$totalOrderUncheck = \App\Helper\Statistic::totalOrder('uncheck');
@endphp
<div href="" class="ui dropdown icon item">
    <i class="bell icon"></i>
    <span class="ui small floating red circular label">1</span>
    <div class="menu">
        @if (!empty($totalOrderUncheck))
            <a class="item"><span class="ui blue label">{{ $totalOrderUncheck }}</span>đơn hàng chưa duyệt</a>
        @endif
    </div>
</div>