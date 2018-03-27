<table class="ui table striped celled selectable" id="bang-slider">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-slider">
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Hình ảnh (Click để phóng to)</th>
        <th class="collapsing">STT</th>
        <th>Hình ảnh</th>
        <th class="collapsing">Chọn</th>
    </tr>
    </thead>
    <tbody>
    @php $total = count($sliders); @endphp
    @for($i = 0; $i < $total; $i += 2)
        <tr>
            <td>
                <div class="ui child checkbox">
                    <input type="checkbox" class="hidden" name="slider-id[]" value="{{ $sliders[$i]->id }}">
                </div>
            </td>
            <td>{{ $i + 1 }}</td>
            <td><a href="#" onclick="$('{{ '#modal-xem-' . $sliders[$i]->id }}').modal('show')">
                    <img class="ui small image" src="{{ asset($sliders[$i]->hinh_anh) }}">
                </a>
            </td>
            @if (!empty($sliders[$i+1]))
                <td>{{ $i + 2 }}</td>
                <td>
                    <a href="#" onclick="$('{{ '#modal-xem-' . $sliders[$i+1]->id }}').modal('show')">
                        <img class="ui small image" src="{{ asset($sliders[$i+1]->hinh_anh) }}">
                    </a>
                </td>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" class="hidden" name="slider-id[]" value="{{ $sliders[$i+1]->id }}">
                    </div>
                </td>
            @else
                <td></td><td></td><td></td>
            @endif
        </tr>
    @endfor
    </tbody>
</table>