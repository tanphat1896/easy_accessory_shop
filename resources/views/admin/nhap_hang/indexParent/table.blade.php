<table class="ui table very compact striped celled selectable" id="bang-nhap-hang">

    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-phieu-nhap" >
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Người nhập hàng</th>
        <th>Ngày nhập</th>
        <th>Số nhà cung cấp</th>
        <th>Tình trạng</th>
        <th class="collapsing">Xem</th>
        <th class="collapsing">Sửa</th>
    </tr>
    </thead>

    <tbody>

        @foreach($phieuNhaps as $stt => $phieuNhap)
            <tr>
                @if($phieuNhap->soNCC() == 0)
                    <td class="collapsing">
                        <div class="ui child checkbox">
                            <input type="checkbox" class="hidden" name="phieu-nhap-id[]" value="{{ $phieuNhap->id }}">
                        </div>
                    </td>
                @else
                    <td class="collapsing"></td>
                @endif
                <td>{{ $stt + 1 }}</td>
                <td>{{ $phieuNhap->tenNhanVien() }}</td>
                <td>{{ $phieuNhap->ngay_nhap }}</td>
                <td>
                    {{ $phieuNhap->soNCC() }}
                </td>
                <td>
                    @if ($phieuNhap->daCapNhat())
                        <i class="check fitted green icon"></i>
                        <span style="color: green"> Đã cập nhật vào kho</span>
                    @else
                        <i class="warning fitted red icon"></i>
                        <span style="color: red"> Chưa cập nhật vào kho</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('nhap_hang_index_child',[$phieuNhap->id]) }}"
                       class="ui small blue label">
                        <i class="eye open fitted icon"></i>
                    </a>
                </td>
                <td>
                    <a href="#" onclick="$( '{{ '#modal-sua-'.$phieuNhap->id }}' ).modal('show')"
                       class="ui small green label">
                        <i class="edit fitted icon"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@if (method_exists($phieuNhaps, 'render'))
    <div class="ui basic segment center aligned no-padding">
        {{ $phieuNhaps->render('vendor.pagination.smui')}}
    </div>
@endif

@push('script')
    <script>
        // bindDataTable('bang-nhap-hang');
    </script>
@endpush