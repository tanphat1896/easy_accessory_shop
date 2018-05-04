<table class="ui table very compact striped celled selectable center aligned" id="bang-km">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-km">
                <input type="checkbox">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Tên khuyến mãi con</th>
        <th>Giảm giá</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    @foreach($parentSale->children as $idx => $sale)
        <tr>
            <td>
                <div class="ui child checkbox">
                    <input type="checkbox" name="khuyen-mai-id[]" value="{{ $sale->id }}">
                </div>
            </td>
            <td>{{ $idx + 1 }}</td>
            <td class="left aligned">{{ $sale->ten_km }}</td>
            <td>{{ $sale->percent() }}%</td>
            <td class="center aligned collapsing">
                <a href="{{ route('khuyen_mai.show', [$sale->id]) }}"
                   class="ui blue label">
                    <i class="eye open fitted icon"></i>
                </a>

                @if (!$parentSale->overdue())
                    <button type="button" class="ui green label pointer"
                            onclick="$('{{ "#modal-sua-" . $sale->id }}').modal('show')">
                        <i class="edit fitted icon"></i>
                    </button>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>

    @if (method_exists($parentSale, 'render'))
        <tfoot>
        <tr class="center aligned"><th colspan="9">
                {{ $parentSale->render('vendor.pagination.smui')}}
            </th></tr>
        </tfoot>
    @endif
</table>