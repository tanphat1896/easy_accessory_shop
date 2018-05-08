<div class="ui mini modal" id="modal-them-phieu-nhap-san-pham">
    <div class="blue header">Thêm mới sản phẩm</div>
    <div class="content">
        <form action="{{ route('chi_tiet_nhap_hang.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <input type="hidden" id="phieu-nhap-id" name="phieu-nhap-id" value="{{ $id }}">

            <label for="ten-san-pham">Sản phẩm</label>
            <div class="field">
                <select id="ten-san-pham" name="ten-san-pham" class="ui search dropdown">
                    @foreach(\App\SanPham::all() as $sanPham)
                        {{ $check = false }}
                        @foreach($chiTietPhieuNhaps as $chiTietPhieuNhap)
                            @if($chiTietPhieuNhap->san_pham_id == $sanPham->id)
                                {{$check = true}}
                            @endif
                        @endforeach
                        @if ($check == true)
                            @continue
                        @endif
                        <option value="{{ $sanPham->id }}">
                            {{ $sanPham->ten_san_pham }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="so-luong">Số lượng</label>
                <input type="number" id="so-luong-input" name="so-luong" value="5" required min="1" max="100" autofocus>
            </div>

            <div class="field">
                <label for="don-gia">Đơn giá</label>
                <input type="number" id="don-gia-input" name="don-gia" value="100000" required min="1000" max="100000000">
            </div>

            <div class="field">
                <button class="ui blue fluid button">
                    <strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($chiTietPhieuNhaps as $chiTietPhieuNhap)
    <div class="ui mini vertical flip modal" id="{{ "modal-sua-" . $chiTietPhieuNhap->id }}">
        <div class="blue header">Sửa chi tiết phiếu nhập</div>
        <div class="content">
            <form action="{{ route('chi_tiet_nhap_hang.update', [$chiTietPhieuNhap->id]) }}"
                  class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <label for="ten-san-pham">Sản phẩm</label>
                <div class="field">
                    <select id="ten-san-pham" name="ten-san-pham" class="ui dropdown">
                        <option value="{{ $chiTietPhieuNhap->san_pham_id }}">
                            {{ \App\SanPham::find($chiTietPhieuNhap->san_pham_id)->ten_san_pham }}
                        </option>
                        @foreach(\App\SanPham::all() as $sanPham)
                            {{ $check = false }}
                            @foreach($chiTietPhieuNhaps as $CTPhieuNhap)
                                @if($CTPhieuNhap->san_pham_id == $sanPham->id)
                                    {{$check = true}}
                                @endif
                            @endforeach
                            @if ($check == true)
                                @continue
                            @endif
                            <option value="{{ $sanPham->id }}">
                                {{ $sanPham->ten_san_pham }}
                            </option>
                        @endforeach
                        {{--@foreach(\App\SanPham::all() as $sanPham)--}}
                            {{--<option value="{{ $sanPham->id }}"--}}
                                    {{--{{ ($chiTietPhieuNhap->san_pham_id == $sanPham->id) ? 'selected' : '' }}>--}}
                                {{--{{ $sanPham->ten_san_pham }}--}}
                            {{--</option>--}}
                        {{--@endforeach--}}
                    </select>
                </div>

                <div class="field">
                    <label for="so-luong">Số lượng</label>
                    <input type="number" id="so-luong" name="so-luong"
                           value="{{ $chiTietPhieuNhap->so_luong }}" required min="1" max="100" autofocus>
                </div>

                <div class="field">
                    <label for="don-gia">Đơn giá</label>
                    <input type="number" id="don-gia" name="don-gia"
                           value="{{ $chiTietPhieuNhap->don_gia }}" required min="1000" max="100000000">
                </div>

                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach