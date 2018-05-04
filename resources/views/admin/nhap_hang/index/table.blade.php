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
        <th>Nhà cung cấp</th>
        <th class="collapsing">Số lượng sản phẩm</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
    </tr>
    </thead>

    <tbody>

        @foreach($phieuNhaps as $stt => $phieuNhap)
            <tr>
                @if($phieuNhap->isEmpty())
                    <td class="collapsing">
                        <div class="ui child checkbox">
                            <input type="checkbox" class="hidden" name="phieu-nhap-id[]" value="{{ $phieuNhap->id }}">
                        </div>
                    </td>
                @else
                    <td class="collapsing"></td>
                @endif
                <td>{{ $stt + 1 }}</td>
                <td>{{ \App\PhieuNhap::find($phieuNhap->id)->Admin->name }}</td>
                <td>{{ $phieuNhap->ngay_nhap }}</td>
                <td>{{ \App\PhieuNhap::find($phieuNhap->id)->NhaCungCap->ten_ncc }}</td>
                <td>{{ $phieuNhap->so_san_pham }}</td>
                <td>
                    @if ($phieuNhap->da_cap_nhat == true)
                        <i class="check fitted green icon"></i>
                        <span style="color: green"> Đã cập nhật vào kho</span>
                    @else
                        <i class="warning fitted red icon"></i>
                        <span style="color: red"> Chưa cập nhật vào kho</span>
                    @endif
                </td>
                <td  class="collapsing">
                    <a href="{{ route('nhap_hang.show',[$phieuNhap->id]) }}"
                       class="ui small blue label">
                        <i class="eye open fitted icon"></i>
                    </a>
                    <a href="#" onclick="$( '{{ '#modal-sua-'.$phieuNhap->id }}' ).modal('show')"
                       class="ui small green label">
                        <i class="edit fitted icon"></i>
                    </a>
                    {{--<a href="{{ route('nhap_hang.show',[$phieuNhap->id]) }}" class="ui small blue label">Xem</a>--}}
                    {{--<a href="#" class="ui small teal label"--}}
                       {{--onclick="$( '{{ '#modal-sua-'.$phieuNhap->id }}' ).modal('show')">Sửa</a>--}}
                </td>
            </tr>
        @endforeach

    </tbody>

    @if (method_exists($phieuNhaps, 'render'))
        <tfoot>
        <tr class="center aligned"><th colspan="9">
                {{ $phieuNhaps->render('vendor.pagination.smui')}}
            </th></tr>
        </tfoot>
    @endif

</table>

@push('script')
    <script>
        // bindDataTable('bang-nhap-hang');
    </script>
@endpush