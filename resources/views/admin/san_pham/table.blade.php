<table class="ui celled striped table" id="bang-sp">
    <thead>
    <tr>
        <th class="collapsing">STT</th>
        <th class="collapsing">Mã SP</th>
        <th>Tên SP</th>
        <th class="collapsing">Số lượng</th>
        <th>Ngày thêm</th>
        <th>Tình trạng</th>
        <th>Chi tiết</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sanPhams as $stt => $sanPham)
        <tr>
            <td>{{ $stt + 1 }}</td>
            <td>{{ $sanPham->ma_san_pham }}</td>
            <td>{{ $sanPham->ten_san_pham }}</td>
            <td>{{ $sanPham->so_luong }}</td>
            <td>{{ \Carbon\Carbon::parse($sanPham->ngay_tao)->format('d/m/Y') }}</td>
            <td>{{ $sanPham->tinh_trang }}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>