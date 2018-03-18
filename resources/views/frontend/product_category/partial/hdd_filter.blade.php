<div class="ui small borderless menu no-margin square-border">
    <div class="item header">Bộ lọc</div>
    <div class="item">128GB</div>
    <div class="item">256GB</div>
    <div class="item">1TB</div>
    <div class="item">Samsung</div>
    <div class="item">Sandisk</div>
    <div class="item" id="option">Tùy chọn</div>
    <div class="ui flowing popup top left transition hidden">
        <div class="ui three column divided grid">
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
    </div>
</div>
@push('script')
    <script>
        $('#option').popup({
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