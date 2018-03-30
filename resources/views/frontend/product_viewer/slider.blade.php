<div class="fotorama" data-nav="thumbs" data-width="100%">
    <a href="/{{ $product->anh_dai_dien }}">
        <img src="/{{ $product->anh_dai_dien }}" alt="{{ $product->getName() }}">
    </a>

    @foreach($product->hinhAnhs as $anh)
        <a href="/{{ $anh->lien_ket }}">
            <img src="/{{ $anh->lien_ket }}" alt="{{ $product->getName() }}">
        </a>
    @endforeach
</div>