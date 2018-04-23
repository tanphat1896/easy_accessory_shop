<div class="ui small borderless menu no-margin square-border">
    <div class="ui item dropdown">
        <div class="text">Tất cả giá</div>
        <i class="dropdown icon"></i>
        <div class="menu">
            <a class="item"
               href="{{ route('get_product', ['slug' => $productType->slug, 'filter' => 'price=desc']) }}">
                Giá giảm dần
            </a>
            <a class="item"
               href="{{ route('get_product', ['slug' => $productType->slug, 'filter' => 'price=asc']) }}">
                Giá tăng dần</a>
        </div>
    </div>
    <div class="item" id="branding">Thương hiệu</div>
    <div class="ui flowing popup bottom center hidden">
        <div class="ui checkbox">
            <label for="">Samsung</label>
            <input type="checkbox" class="hidden">
        </div>

        <div class="ui checkbox">
            <label for="">Samsung</label>
            <input type="checkbox" class="hidden">
        </div>
    </div>

    <div class="item">Sandisk</div>
    <div class="item">
        <div class="ui blue label">hello</div>
        <div class="ui blue label">hello</div>
        <div class="ui blue label">hello</div>
        <div class="ui blue label">hello</div>
    </div>
    <div class="item pointer" id="option">Tùy chọn<i class="dropdown icon"></i></div>

    <div class="ui flowing popup bottom center hidden">
        <div class="ui three column divided grid">
            <div class="row">
                <div class="column">
                    <h4 class="ui header">Thương hiệu</h4>
                    <form action="">
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="">Samsung</label>
                                <input type="checkbox" class="hidden">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="">Sandisk</label>
                                <input type="checkbox" class="hidden">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="">Flextor</label>
                                <input type="checkbox" class="hidden">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="column">
                    <h4 class="ui header">Dung lượng</h4>
                    <form action="">
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="">128GB</label>
                                <input type="checkbox" class="hidden">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="">256GB</label>
                                <input type="checkbox" class="hidden">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="">512GB</label>
                                <input type="checkbox" class="hidden">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="column">
                    <h4 class="ui header">Loại SSD</h4>
                    <form action="">
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="">Máy PC</label>
                                <input type="checkbox" class="hidden">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <label for="">2.5"</label>
                                <input type="checkbox" class="hidden">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row no-margin">
                <div class="sixteen wide column">
                    <button class="ui tiny fluid blue button"><strong>Tìm kiếm</strong></button>
                </div>
            </div>
        </div>
    </div>

    <div class="item">

    </div>
</div>
@push('script')
    <script>
        let queryPattern = /(.*)\?(.*)/;
        let query = queryPattern.exec(window.location.href);
        let filter = '';
        if (query !== null)
            filter = query[1];

        function filtering(criteria, value) {

        }
        $('#option, #branding').popup({
            hoverable: true,
            inline: true,
            delay: {
                show: 200,
                hide: 800
            },
            on: 'click',
            position: 'bottom left'
        });
    </script>
@endpush