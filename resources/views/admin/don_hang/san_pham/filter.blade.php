<a class="ui green small button normal-td-margin" id="dh-filter">
    <i class="filter icon"></i>Bộ lọc</a>

@if($filtered)
    <a class="ui red label" href="{{ route('san_pham.index') }}">Xóa lọc</a>
@endif


{{--form filter--}}

<div class="ui flowing popup bottom left transition hidden">
    <form method="get" class="ui small form">

        <div class="field">
            <label for="">Tình trạng đơn hàng</label>
            <select name="tinh-trang" class="ui search dropdown no-margin-left">
                <option value="all">Tất cả</option>

                @foreach($donHangs as $donHang)
                    <option value="{{ $donHang->id }}"
                            {{ !empty($filterData["tinh-trang"])
                                    && $filterData["tinh-trang"]->id === $donHang->id
                                    ? 'selected': '' }}>>
                        @if($donHang->tinh_trang == 0)
                            Chưa duyệt
                        @elseif($donHang->tinh_trang == 1)
                            Đang vận chuyển
                        @else
                            Đã giao hàng
                        @endif
                    </option>
                @endforeach

            </select>
        </div>

        <div class="field">
            <button class="ui fluid green button">Lọc</button>
        </div>
    </form>
</div>
