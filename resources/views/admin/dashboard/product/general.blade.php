<div class="ui bottom attached tab segment {{ Request::has('lim') ? '': 'active' }}" data-tab="first">

    <div class="ui segment">
        <div class="ui tiny five statistics">

            <div class="statistic">
                <div class="value">
                    <i class="box icon"></i>
                    {{ $total }}
                </div>
                <div class="label">
                    Sản phẩm
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="box icon"></i>
                        <i class="bottom right corner green bookmark icon"></i>
                    </i>
                    {{ $new }}
                </div>
                <div class="label">
                    Sản phẩm Mới
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="box icon"></i>
                        <i class="bottom right corner red certificate icon"></i>
                    </i>
                    {{ $sale }}
                </div>
                <div class="label">
                    Đang khuyến mãi
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="box icon"></i>
                        <i class="bottom right corner yellow exclamation circle icon"></i>
                    </i>
                    {{ $outOfStock }}
                </div>
                <div class="label">
                    Hết hàng
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="box icon"></i>
                        <i class="bottom right corner red times circle outline icon"></i>
                    </i>
                    {{ $stopBusiness }}
                </div>
                <div class="label">
                    Ngừng kinh doanh
                </div>
            </div>
        </div>
    </div>

    @include('admin.dashboard.product.product_type')
</div>