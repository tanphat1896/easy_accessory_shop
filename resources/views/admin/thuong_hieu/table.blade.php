<table class="ui table very compact striped celled selectable display" id="bang-thuong-hieu">
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
    </tbody>
</table>

@if (method_exists($brands, 'render'))
    <div class="ui basic segment center aligned no-padding">
        {{ $brands->render('vendor.pagination.smui') }}
    </div>
@endif