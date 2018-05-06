<table class="ui table very compact striped celled selectable center aligned" id="bang-km">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-km">
                <input type="checkbox">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Tên chương trình khuyến mãi</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th class=" collapsing">Hành động</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $idx => $sale)
        <tr>
            <td>
                <div class="ui child checkbox">
                    <input type="checkbox" name="khuyen-mai-id[]" value="{{ $sale->id }}">
                </div>
            </td>
            <td>{{ $idx + 1 }}</td>
            <td class="left aligned">{{ $sale->ten_km }}</td>
            <td>{{ $sale->start() }}</td>
            <td>{{ $sale->end() }}</td>
            <td class="left aligned">
                <a href="{{ route('khuyen_mai.show', [$sale->id]) }}"
                   class="ui tiny blue label">
                    <i class="eye open fitted icon"></i>
                </a>

                @if(! $sale->overdue())
                    <button type="button" class="ui tiny green label pointer"
                            onclick="$('{{ "#modal-sua-" . $sale->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </button>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if (method_exists($sales, 'render'))
    <div class="ui basic segment no-margin-bottom no-padding">
        {{ $sales->render('vendor.pagination.smui')}}
    </div>
@endif