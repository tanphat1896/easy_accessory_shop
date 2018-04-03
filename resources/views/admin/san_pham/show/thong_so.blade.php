<h5 class="ui dividing header">Thông số kỹ thuật
    <button type="button" onclick="$('#modal-cap-nhat-tskt').modal('show')"
            class="ui blue label pointer">Cập nhật</button>
</h5>

<table class="ui blue striped table">
    <thead>
    <tr><th>Thông số</th>
        <th>Giá trị</th></tr>
    </thead>
    <tbody>
    @foreach($sanPham->thongSos as $thongSo)
        <tr>
            <td>{{ $thongSo->getName() }}</td>
            <td>{{ $thongSo->pivot->gia_tri }}</td>
        </tr>
    @endforeach
    </tbody>
</table>