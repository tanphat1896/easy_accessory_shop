<table class="ui celled striped table" id="bang-sp">
    <thead>
    <tr>
        <th class="collapsing">STT</th>
        <th class="collapsing">Mã SP</th>
        <th>Tên SP</th>
        <th class="collapsing">Số lượng</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sanPhams as $stt => $sanPham)
        <tr>
            <td>{{ $stt + 1 }}</td>
            <td>{{ $sanPham->ma_san_pham }}</td>
            <td>{{ $sanPham->ten_san_pham }}</td>
            <td>{{ $sanPham->so_luong }}</td>
            <td>{{ $sanPham->tinhTrang() }}</td>
            <td>
                <a href="{{ route('san_pham.show', [$sanPham->id]) }}" class="ui small blue label ">Xem</a>
                <a href="{{ route('san_pham.edit', [$sanPham->id]) }}" class="ui small teal label ">Sửa</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>