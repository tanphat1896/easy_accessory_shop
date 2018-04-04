<table class="ui table very compact striped celled selectable" id="bang-km">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-km">
                <input type="checkbox">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th class="collapsing">Giảm giá phần trăm</th>
        <th>Hành động</th>
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
            <td>{{ $sale->start() }}</td>
            <td>{{ $sale->end() }}</td>
            <td class="center aligned"><strong>{{ $sale->percent() }}</strong></td>
            <td class="center aligned collapsing">
                <a href="{{ route('khuyen_mai.show', [$sale->id]) }}"
                   class="ui blue label">
                    <i class="eye open fitted icon"></i>
                </a>

                <button type="button" class="ui green label pointer"
                        onclick="$('{{ "#modal-sua-" . $sale->id }}').modal('show')">
                    <i class="edit fitted icon"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>