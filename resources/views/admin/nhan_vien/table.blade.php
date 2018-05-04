<table class="ui table very compact striped celled selectable" id="bang-nhan-vien">

    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-nhan-vien" >
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Tài khoản</th>
        <th>Thao tác</th>
    </tr>
    </thead>

    <tbody>

    @foreach($nhanViens as $stt => $nhanVien)
        <tr>
            <td class="collapsing">
                <div class="ui child checkbox">
                    <input type="checkbox" class="hidden" name="phieu-nhap-id[]" value="{{ $nhanVien->id }}">
                </div>
            </td>
            <td>{{ $stt + 1 }}</td>
            <td>
                <a href="{{ route('nhap_hang_index', [$nhanVien->id]) }}"
                   data-tooltip="Đi đến bảng nhập hàng của {{ $nhanVien->name }}">
                {{ $nhanVien->name }}
                </a>
            </td>
            <td>{{ $nhanVien->email }}</td>
            <td>{{ $nhanVien->phone }}</td>
            <td>{{ $nhanVien->username }}</td>
            <td class="collapsing">
                <a href="#" onclick="$( '{{ '#modal-sua-'.$nhanVien->id }}' ).modal('show')"
                   class="ui small green label">
                    <i class="edit fitted icon"></i>
                </a>
                <a href="#"
                class="ui small blue label need-popup" data-content="Đặt lại mật khẩu"
                   onclick="$( '{{ '#modal-reset-'.$nhanVien->id }}' ).modal('show')">
                <i class="refresh open fitted icon"></i>
                </a>
                {{--<a href="{{ route('nhap_hang.show',[$phieuNhap->id]) }}" class="ui small blue label">Xem</a>--}}
                {{--<a href="#" class="ui small teal label"--}}
                {{--onclick="$( '{{ '#modal-sua-'.$phieuNhap->id }}' ).modal('show')">Sửa</a>--}}
            </td>
        </tr>
    @endforeach

    </tbody>

</table>

@push('script')
    <script>
        // bindDataTable('bang-nhap-hang');
    </script>
@endpush