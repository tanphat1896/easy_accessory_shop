<div class="ui mini modal" id="modal-them-ncc">
    <div class="blue header">Thêm mới phiếu nhập</div>
    <div class="content">
        <form action="{{ route('nhap_hang_them_child', [$phieuNhapParent->id]) }}" class="ui form" method="post">

            {{ csrf_field() }}

            {{--{{ method_field('PUT') }}--}}

            <div class="field">
                <label for="nha-cung-cap">Nhà cung cấp</label>
                <select name="nha-cung-cap[]" multiple id="nha-cung-cap" class="ui dropdown" required>
                    @foreach($nhaCungCaps as $nhaCungCap)
                        @if($phieuNhapParent->matchedNCC($nhaCungCap->id))
                            @continue
                        @endif
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
            <form action="{{ route('nhap_hang_sua_child', [$phieuNhap->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                {{ method_field('POST') }}

                <div class="field">
                    <label for="nha-cung-cap">Nhà cung cấp</label>
                    <select id="nha-cung-cap" name="nha-cung-cap" class="ui dropdown" required>
                        @foreach($nhaCungCaps as $nhaCungCap)
                            @if(($phieuNhap->nha_cung_cap_id != $nhaCungCap->id) && $phieuNhapParent->matchedNCC($nhaCungCap->id))
                                @continue
                            @endif
                            <option value="{{ $nhaCungCap->id }}"
                                    {{ ($phieuNhap->nha_cung_cap_id == $nhaCungCap->id) ? 'selected' : '' }}>
                                {{ $nhaCungCap->ten_ncc }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach