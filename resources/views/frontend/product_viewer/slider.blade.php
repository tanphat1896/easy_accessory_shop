{{--<div class="fotorama" data-nav="thumbs" data-width="100%">--}}
{{--<a href="/{{ $product->anh_dai_dien }}">--}}
{{--<img src="/{{ $product->anh_dai_dien }}" alt="{{ $product->getName() }}"--}}
{{--class="need-zoom" data-zoom-image="/{{ $product->anh_dai_dien }}">--}}
{{--</a>--}}

{{--@foreach($product->hinhAnhs as $anh)--}}
{{--<a href="/{{ $anh->lien_ket }}">--}}
{{--<img src="/{{ $anh->lien_ket }}" alt="{{ $product->getName() }}"--}}
{{--class="need-zoom" data-zoom-image="/{{ $anh->lien_ket }}">--}}
{{--</a>--}}
{{--@endforeach--}}
{{--</div>--}}

@push('style')
    <style>
        .sp-wrap {
            margin: auto;
            width: 100% !important;
            height: 300px;
            background: none !important;
            border: none !important;
        }
        .sp-large{
            height: 270px !important;
        }
    </style>
@endpush

<link rel="stylesheet" href="{{ asset('plugin/zoom/smooth-products/smoothproducts.css') }}">
    
<div class="sp-wrap">
    <a href="/{{ str_replace('\\', '/', $product->anh_dai_dien) }}">
        <img width="100%" src="/{{ str_replace('\\', '/', $product->anh_dai_dien) }}" alt="{{ $product->getName() }}">
    </a>
    @foreach($product->hinhAnhs as $anh)
        <a href="/{{ str_replace('\\', '/', $anh->lien_ket) }}">
            <img src="/{{ str_replace('\\', '/', $anh->lien_ket) }}" alt="{{ $product->getName() }}">
        </a>
    @endforeach
</div>

@push('script')
    <script>
        $('.sp-wrap').smoothproducts();
    </script>
@endpush