<div class="ui bottom attached tab segment" data-tab="third">
    <form action="" class="ui form static">
        <div class="ui padded grid">
            <div class="ten wide column">

                @foreach($sanPham->thongSos as $thongSo)
                    <div class="inline field">
                        <label for="" class="label-fixed">{{ $thongSo->getName() }}</label>
                        <input type="text" value="{{ $thongSo->pivot->gia_tri }}">
                    </div>
                @endforeach
            </div>
        </div>
    </form>
</div>