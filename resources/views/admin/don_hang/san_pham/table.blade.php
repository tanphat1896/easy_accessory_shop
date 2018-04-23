<div class="ui bottom attached tab segment" data-tab="second">

    {{--<form action="{{ route('anh_san_pham.store') }}" method="post" enctype="multipart/form-data">--}}
    {{--{{csrf_field()}}--}}
    {{--<input type="text" name="sanpham-id" value="{{ $sanPham->id }}">--}}
    {{--<input type="file" name="file">--}}
    {{--<button>OK</button>--}}
    {{--</form>--}}

    <table class="ui table striped celled" id="san-pham-don-hang">
        <thead>
        <tr>
            <th class="collapsing">STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Tổng giá</th>
        </tr>
        </thead>
        <tbody>
        @foreach($chiTietDonHangs as $stt => $chiTietDonHang)
            <tr>
                <td>{{ $stt + 1 }}</td>
                <td>{{ \App\SanPham::find($id)->ten_san_pham }}</td>
                <td>{{ $chiTietDonHang->so_luong }}</td>
                <td>{{ number_format($chiTietDonHang->don_gia) }} đ</td>
                <td>{{ number_format($chiTietDonHang->don_gia * $chiTietDonHang->so_luong) }} đ</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>