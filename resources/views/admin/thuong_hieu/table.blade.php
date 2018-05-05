<div class="ui basic segment no-padding table-responsive no-margin">
    <table class="ui table very compact striped celled selectable unstackable" id="bang-thuong-hieu">
        <thead>
        <tr>
            <th class="collapsing">
                <div class="ui checkbox" id="chon-het-thuong-hieu">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing">STT</th>
            <th>Tên thương hiệu</th>
            {{--<th>Từ khóa tìm kiếm</th>--}}
            <th class="collapsing">Sản phẩm</th>
            <th class="collapsing">Sửa</th>
            <th class="collapsing">Xóa</th>
        </tr>
        </thead>
        <tbody>
        @php $start = \App\Helper\PagingHelper::numberStart($brands) @endphp
        @foreach($brands as $stt => $brand)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="thuong-hieu-id[]" value="{{ $brand->id }}">
                    </div>
                </td>
                <td>{{ $start++ }}</td>
                <td>{{ $brand->ten_thuong_hieu }}</td>
                <td class="center aligned">
                    <a href="{{ route('san_pham.index') }}?t={{ $brand->slug }}" class="ui tiny blue label">
                        <i class="box fitted icon"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="ui tiny green label"
                       onclick="$('{{ "#modal-sua-" . $brand->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('thuong_hieu.destroy', [0]) }}" class="force-inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="thuong-hieu-id" value="{{ $brand->id }}">
                        <button class="ui tiny red label pointer">
                            <i class="remove icon fitted"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        @if ($brands->isEmpty())
            <tr class="center aligned">
                <td colspan="5">Không có thương hiệu nào</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

@if (method_exists($brands, 'render'))
    <div class="ui basic segment center aligned no-padding no-margin-bottom">
        {{ $brands->render('vendor.pagination.smui') }}
    </div>
@endif

