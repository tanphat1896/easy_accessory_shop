<div class="ui segment">
    <div class="ui four statistics">
        <div class="statistic">
            <div class="value">
                <i class="box icon"></i>
                {{ \App\Helper\Statistic::totalProduct() }}
            </div>
            <div class="label">
                Sản phẩm
            </div>
        </div>

        <div class="statistic">
            <div class="value">
                <i class="comments outline icon"></i>
                {{ \App\Helper\Statistic::totalCommentNotApproved() }}
            </div>
            <div class="label">
                Bình luận chưa duyệt
            </div>
        </div>

        <div class="statistic">
            <div class="value">
                <i class="clipboard icon"></i>
                {{ \App\Helper\Statistic::totalOrder() }}
            </div>
            <div class="label">
                Đơn hàng
            </div>
        </div>
    </div>
</div>