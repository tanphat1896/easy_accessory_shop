<div class="ui mini modal" id="modal-them-phieu-nhap">
    <div class="blue header">Thêm mới phiếu nhập</div>
    <div class="content">
        <form action="{{ route('nhap_hang.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="dia-chi">Ngày nhập</label>
                <input type="date" id="ngay-nhap" name="ngay-nhap" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required>
            </div>

            <div class="field">
                <label for="thong-so">Nhà cung cấp</label>
                <select name="nha-cung-cap[]" multiple id="nha-cung-cap" class="ui dropdown">
                    @foreach($nhaCungCaps as $nhaCungCap)
                        <option value="{{ $nhaCungCap->id }}">{{ $nhaCungCap->ten_ncc }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($phieuNhaps as $phieuNhap)
    <div class="ui mini vertical flip modal" id="{{ "modal-sua-" . $phieuNhap->id }}">
        <div class="blue header">Sửa phiếu nhập</div>
        <div class="content">
            <form action="{{ route('nhap_hang.update', [$phieuNhap->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="dia-chi">Ngày nhập</label>
                    <input type="date" id="ngay-nhap" name="ngay-nhap"
                           value="{{ $phieuNhap->ngay_nhap }}" max="{{ date('Y-m-d') }}" required>
                    {{--<script>--}}
                    {{--document.querySelector("#ngay-nhap").valueAsDate = new Date()--}}
                    {{--</script>--}}
                </div>

                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach