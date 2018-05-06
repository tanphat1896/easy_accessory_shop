<div class="ui mini vertical flip modal" id="modal-them-km">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới khuyến mãi con</div>
    <div class="content">
        <form action="{{ route('khuyen_mai.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <input type="hidden" name="parent_id" value="{{ $parentSale->id }}">

            <div class="field">
                <label for="name">Tên khuyến mãi</label>
                <input type="text" id="name" name="name" required value="KM 12% SSD">
            </div>

            <div class="field">
                <label for="gia-tri">Phần trăm giảm giá</label>
                <input type="number" id="gia-tri" name="gia-tri" required min="1" max="99">
            </div>

            <input type="hidden" name="ngay-bat-dau" value="{{ $parentSale->ngay_bat_dau }}">

            <input type="hidden" name="ngay-ket-thuc" value="{{ $parentSale->ngay_ket_thuc }}">

            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($parentSale->children as $stt => $sale)
    <div class="ui mini vertical flip modal" id="{{ "modal-sua-" . $sale->id }}">
        <i class="close icon"></i>
        <div class="blue header">Sửa khuyến mãi</div>
        <div class="content">
            <form action="{{ route('khuyen_mai.update', [$sale->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <input type="hidden" name="parent_id" value="{{ $parentSale->id }}">

                <div class="field">
                    <label for="name">Tên khuyến mãi</label>
                    <input type="text" id="name" name="name" required value="{{ $sale->ten_km }}">
                </div>

                <div class="field">
                    <label for="gia-tri">Phần trăm giảm giá</label>
                    <input type="number" id="gia-tri" name="gia-tri"
                           value="{{ $sale->percent() }}" required
                           min="1" max="99">
                </div>


                <input type="hidden" name="ngay-bat-dau" value="{{ $parentSale->ngay_bat_dau }}">

                <input type="hidden" name="ngay-ket-thuc" value="{{ $parentSale->ngay_ket_thuc }}">

                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach

@include('admin.khuyen_mai.checkdate_script')