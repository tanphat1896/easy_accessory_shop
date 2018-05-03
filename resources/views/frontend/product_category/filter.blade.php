@php
    $ranges = config('filter');
    $brands = \App\ThuongHieu::getByProductType($productType->slug);
    $brandCount = $brands->count();
@endphp
<div class="ui basic segment no-padding square-border normal-td-margin">
    <div class="ui dropdown normal-lr-margin" id="price">
        <div class="text">Tất cả giá</div>
        <i class="dropdown icon fitted"></i>
        <div class="menu">
            <a class="item" onclick="filtering('p', 'desc')">Giá giảm dần
                <i class="arrow down fitted icon"></i>
            </a>
            <a class="item" onclick="filtering('p', 'asc')">Giá tăng dần
                <i class="arrow up fitted icon"></i></a>
        </div>
    </div>
    <div class="ui dropdown normal-lr-margin" id="branding">Thương hiệu
        <i class="dropdown icon fitted"></i>
    </div>
    <div class="ui flowing popup bottom center hidden">
        <form class="ui form" onsubmit="filterBrand(event)">
            @for($idx = 0; $idx < $brandCount; $idx += 2)
                <div class="two fields">
                    @if(!empty($brands[$idx]))
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="{{ $brands[$idx]->slug }}">{{ $brands[$idx]->ten_thuong_hieu }}</label>
                                <input type="checkbox" value="{{ $brands[$idx]->slug }}" class="hidden"
                                       id="{{ $brands[$idx]->slug }}">
                            </div>
                        </div>
                    @endif
                    @if (!empty($brands[$idx+1]))
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="{{ $brands[$idx + 1]->slug }}">{{ $brands[$idx + 1]->ten_thuong_hieu }}</label>
                                <input type="checkbox" value="{{ $brands[$idx + 1]->slug }}" class="hidden"
                                       id="{{ $brands[$idx + 1]->slug }}">
                            </div>
                        </div>
                    @endif
                </div>
            @endfor
            <button class="ui fluid label blue pointer">OK</button>
        </form>
    </div>

    <div class="ui dropdown normal-lr-margin" id="priceAround">Khoảng giá
        <i class="dropdown icon fitted"></i>
    </div>
    <div class="ui flowing popup bottom center hidden">
        <form class="ui tiny form" id="form-price" onsubmit="filterPrice(event)">
            <div class="field">
                <label for="price-min">Tối thiểu:</label>
                <input type="number" min="0" max="10000000" id="price-min"
                       style="min-width: 150px;"
                       value="{{ $ranges[$productType->slug]['min'] }}">
            </div>
            <div class="field">
                <label for="price-max">Tối đa: </label>
                <input type="number" min="0" max="100000000" id="price-max"
                       value="{{ $ranges[$productType->slug]['max'] }}">
            </div>
            <button class="ui blue fluid label pointer">OK</button>
        </form>
    </div>

    @if (!empty($criteria))

        @foreach($criteria as $key => $criterion)
            @if ($key == 'pt') @continue @endif
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
    </script>
@endpush