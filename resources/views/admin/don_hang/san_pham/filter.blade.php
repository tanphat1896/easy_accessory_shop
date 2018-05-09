<a class="ui green small button" id="dh-filter">
    <i class="filter icon"></i>Bộ lọc</a>

{{--@if($filtered)--}}
    {{--<a class="ui red label" href="{{ route('san_pham.index') }}">Xóa lọc</a>--}}
{{--@endif--}}


{{--form filter--}}

<div class="ui flowing popup bottom left transition hidden">
    <form method="get" class="ui small form" action="{{ route('don_hang.index') }}">

        <div class="field">
            <label for="">Tình trạng đơn hàng</label>
            <select name="tinh-trang" class="ui dropdown no-margin-left" id="tinh-trang">
                <option value="-1">Tất cả</option>

                <option value="0">Chưa duyệt</option>
                <option value="1">Đang vận chuyển</option>
                <option value="2">Đã giao hàng</option>
                <option value="3">Đã hủy</option>

            </select>
        </div>

        <div class="field">
            <button href="" class="ui fluid green button">Lọc</button>
        </div>
    </form>
</div>