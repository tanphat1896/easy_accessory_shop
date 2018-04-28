@php
    $ranges = [
        'ssd' => [
            'min' => 5000000,
            'max' => 30000000
        ],
        'headphone' => [
            'min' => 200000,
            'max' => 3000000
        ],
        'tai-nghe' => [
            'min' => 200000,
            'max' => 3000000
        ],
        'usb' => [
            'min' => 100000,
            'max' => 1000000
        ],
        'ban-phim' => [
            'min' => 200000,
            'max' => 3000000
        ],
    ];
@endphp
<div class="ui basic segment no-padding square-border normal-td-margin">
    <div class="ui dropdown normal-lr-margin" id="price">
        <div class="text">Tất cả giá</div>
        <i class="dropdown icon fitted"></i>
        <div class="menu">
            <a class="item" onclick="filtering('p', 'desc')">
                Giá giảm dần
            </a>
            <a class="item" onclick="filtering('p', 'asc')">
                Giá tăng dần</a>
        </div>
    </div>
    <div class="ui dropdown normal-lr-margin" id="branding">Thương hiệu
        <i class="dropdown icon fitted"></i>
    </div>
    <div class="ui flowing popup bottom center hidden">
        <form class="ui form" onsubmit="filterBrand(event)">
            @foreach(\App\ThuongHieu::all() as $brand)
                <div class="field">
                    <div class="ui checkbox">
                        <label for="{{ $brand->slug }}">{{ $brand->ten_thuong_hieu }}</label>
                        <input type="checkbox" value="{{ $brand->slug }}" class="hidden" id="{{ $brand->slug }}">
                    </div>
                </div>
            @endforeach
            <button class="ui fluid label blue pointer">OK</button>
        </form>
    </div>

    <div class="ui dropdown normal-lr-margin" id="priceAround">Khoảng giá
        <i class="dropdown icon fitted"></i>
    </div>
    <div class="ui flowing popup bottom center hidden">
        <form class="ui tiny form" id="form-price" onsubmit="filterPrice(event)">
            <div class="field">
                <label>Tối thiểu: <span id="label-price-min">0đ </span></label>
                <input type="range" min="0" max="10000000" id="price-min" class="force-hidden">
                <div class="ui range" id="price-min-range"></div>
            </div>
            <div class="field">
                <label>Tối đa: <span id="label-price-max">0đ</span></label>
                <input type="range" min="0" max="10000000" id="price-max" class="force-hidden">
                <div class="ui range" id="price-max-range"></div>
            </div>
            <button class="ui blue fluid label pointer">OK</button>
        </form>
    </div>

    @if (!empty($criteria))

        @foreach($criteria as $key => $criterion)
            @if ($key == 't')
                @foreach($criterion as $each)
                    <div class="ui blue label">
                        {!! $each['text'] !!}
                        <i class="remove icon fitted pointer"
                           onclick="removeFiltering('{{ $key }}', '{{ $each['val'] }}')"></i>
                    </div>
                @endforeach
                @continue
            @endif
            <div class="ui blue label">
                {!! $criterion['text'] !!}
                <i class="remove icon fitted pointer"
                   onclick="removeFiltering('{{ $key }}', '{{ $criterion['val'] }}')"></i>
            </div>
        @endforeach

        <span class="ui red label pointer"
              onclick="window.location.href='{{ route('get_product', [$productType->slug]) }}'">
                <i class="remove icon fitted"></i></span>
    @endif
</div>

@include('frontend.product_category.filter_special_scripting')
@push('script')
    <script>
        $('#option, #branding, #priceAround').popup({
            hoverable: true,
            inline: true,
            delay: {
                show: 200,
                hide: 5000
            },
            on: 'click',
            position: 'bottom left'
        });
        $('#price-min-range').range({
            min: 0,
            max: parseInt('{{ $ranges[$productType->slug]['min'] }}'),
            start: 0,
            onChange: function(val) {
                $('#price-min').val(val);
                $('#label-price-min').text(toCurrency(val) + "đ");
            }
        });
        $('#price-max-range').range({
            min: 0,
            max: parseInt('{{ $ranges[$productType->slug]['max'] }}'),
            start: 0,
            onChange: function(val) {
                $('#price-max').val(val);
                $('#label-price-max').text(toCurrency(val) + "đ");
            }
        });
    </script>
@endpush