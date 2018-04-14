<div class="ui mini vertical flip modal" id="modal-them-km">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới khuyến mãi</div>
    <div class="content">
        <form action="{{ route('khuyen_mai.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="gia-tri">Phần trăm giảm giá</label>
                <input type="number" id="gia-tri" name="gia-tri" required min="1" max="99">
            </div>

            <div class="field">
                <label>Ngày bắt đầu</label>
                <input type="date" name="ngay-bat-dau" value="{{ date('Y-m-d') }}">
            </div>

            <div class="field">
                <label>Ngày kết thúc</label>
                <input type="date" name="ngay-ket-thuc" value="{{ date('Y-m-d', strtotime('+5 days')) }}">
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($sales as $stt => $sale)
    <div class="ui mini vertical flip modal" id="{{ "modal-sua-" . $sale->id }}">
        <i class="close icon"></i>
        <div class="blue header">Sửa khuyến mãi</div>
        <div class="content">
            <form action="{{ route('khuyen_mai.update', [$sale->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="gia-tri">Phần trăm giảm giá</label>
                    <input type="number" id="gia-tri" name="gia-tri"
                           value="{{ $sale->percent() }}" required
                           min="1" max="99">
                </div>
                <div class="field">
                    <label>Ngày bắt đầu</label>
                    <input type="date" name="ngay-bat-dau" value="{{ $sale->ngay_bat_dau }}">
                </div>


                <div class="field">
                    <label>Ngày kết thúc</label>
                    <input type="date" name="ngay-ket-thuc" value="{{  $sale->ngay_ket_thuc }}">
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach