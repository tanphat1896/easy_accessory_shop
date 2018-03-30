{{--modal LICH SU GIA--}}

<div class="ui mini fade modal" id="lich-su-gia">
    <i class="close icon"></i>
    <div class="content">
        <h3 class="ui dividing header">Lịch sử giá</h3>
        <table class="ui very compact striped table">
            <thead><tr><th>Ngày cập nhật</th><th>Giá thành</th></tr></thead>
            <tbody>
            @foreach($sanPham->gia as $gia)
                <tr>
                    <td>{{ $gia->formatDate('ngay_cap_nhat') }}</td>
                    <td><strong>{{ number_format($gia->gia) }} đ</strong></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{--MODAL CAP NHAT GIA--}}

<div class="ui mini fade modal" id="cap-nhat-gia">
    <i class="close icon"></i>
    <div class="content">
        <h3 class="ui dividing header">Cập nhật giá mới</h3>
        <form action="{{ route('gia_san_pham.store', [$sanPham->id]) }}" method="post" class="ui form" id="form-gia">
            {{ csrf_field() }}

            <div class="field">
                <input type="text" id="gia" name="gia" placeholder="Nhập giá mới">
            </div>
            <div class="field">
                <span class="help-text"><i>Chỉ nhập <strong>số</strong>,
                        dấu <strong>phẩy</strong>,
                        dấu <strong>chấm</strong>
                        hoặc <strong>khoảng trắng</strong></i></span>
                <div class="ui basic segment right aligned no-margin no-padding">
                    <button class="ui blue small button">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        $('#form-gia').form({
            fields: {
                gia: {
                    rules: [
                        {type: 'empty', prompt: 'Không được bỏ trống'},
                        {type: 'regExp[/^[,.\s0-9]+$/igm]', prompt: 'Sai định dạng'}
                        ]
                }
            },
            inline:true
        })
    </script>
@endpush