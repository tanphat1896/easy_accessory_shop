<div class="ui mini vertical flip modal" id="modal-them-km">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới khuyến mãi</div>
    <div class="content">
        <form action="{{ route('khuyen_mai.store') }}" class="ui form" method="post"
              onsubmit="return checkDate(this)">

            {{ csrf_field() }}

            <div class="field">
                <label for="name">Tên khuyến mãi</label>
                <input type="text" name="name" required value="KM Ngày quốc tế thiếu nhi">
            </div>

            <div class="field">
                <label>Ngày bắt đầu</label>
                <input type="date" min="{{ date('Y-m-d') }}" name="ngay-bat-dau" value="{{ date('Y-m-d') }}">
            </div>

            <div class="field">
                <label>Ngày kết thúc</label>
                <input type="date" min="{{ date('Y-m-d') }}" name="ngay-ket-thuc" value="{{ date('Y-m-d', strtotime('+5 days')) }}">
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
            <form action="{{ route('khuyen_mai.update', [$sale->id]) }}" class="ui form" method="post"
                  onsubmit="return checkDate(this)">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="name">Tên khuyến mãi</label>
                    <input type="text" name="name" required value="{{ $sale->ten_km }}">
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

@include('admin.khuyen_mai.checkdate_script')