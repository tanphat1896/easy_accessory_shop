<div class="ui mini vertical flip modal" id="modal-them-thuong-hieu">
    <div class="blue header">Thêm mới thương hiệu</div>
    <div class="content">
        <form action="{{ route('thuong_hieu.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-thuong-hieu">Tên thương hiệu</label>
                <input type="text" id="ten-thuong-hieu" name="ten-thuong-hieu" required>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($brands as $stt => $brand)
    <div class="ui mini vertical flip modal" id="{{ "modal-sua-" . $brand->id }}">
        <div class="blue header">Sửa thương hiệu</div>
        <div class="content">
            <form action="{{ route('thuong_hieu.update', [$brand->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="">Tên thương hiệu</label>
                    <input type="text" value="{{ $brand->ten_thuong_hieu }}" name="ten-thuong-hieu" required>
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach