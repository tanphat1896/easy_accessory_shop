<div class="ui top blue attached segment"><strong>SSD</strong></div>
<div class="ui attached segment">
    <div class="ui six column computer four column tablet stackable grid">
        @foreach($ssds as $ssd)
            <div class="column">
                <div class="ui fluid link card" onclick="window.location.href='/detail'">
                    <div class="image">
                        @if($ssd->so_luong > 5)
                            {{--<div class="ui red right corner  label">Mới</div>--}}
                            <div class="ui red right ribbon  label">Mới</div>
                        @endif
                        {{--<div class="ui dimmer">--}}
                            {{--<div class="content">--}}
                                {{--<div class="center">--}}
                                    {{--<a class="ui icon inverted button"><i class="cart icon"></i></a>--}}
                                    {{--<a class="ui icon inverted button"><i class="eye icon"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <img src="{{ asset($ssd->anh_dai_dien) }}">
                    </div>
                    <div class="content">
                        <p>{{ $ssd->ten_san_pham }}</p>
                        <p>2.000.000</p>
                        <div class="ui star rating disabled" data-rating="4"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>