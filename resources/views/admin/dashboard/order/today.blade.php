
<h4 class="ui header">
    <div class="ui dropdown">
        <div class="text">Ngày hôm nay</div>
        <i class="dropdown icon"></i>
        <div class="menu">
            <div class="item" onclick="getOrderByDay('today')">Ngày hôm nay</div>
            <div class="item" onclick="getOrderByDay('yesterday')">Ngày hôm qua</div>
            <div class="item" onclick="$('#specific-day').show()">Ngày cụ thể</div>
        </div>
    </div>
    <div class="ui mini input">
        <input type="date" style="display: none;" id="specific-day" onchange="getOrderByDay(this.value)">
    </div>
</h4>

<div class="ui segment">
    <div class="ui tiny five statistics">
        <div class="statistic">
            <div class="value">
                <i class="clipboard outline icon"></i>
                <span id="total-order">0</span>
            </div>
            <div class="label">
                Tổng số đơn hàng
            </div>
        </div>
        <div class="statistic">
            <div class="value">
                <i class="icons">
                    <i class="clipboard outline icon"></i>
                    <i class="bottom right corner yellow exclamation circle icon"></i>
                </i>
                <span id="uncheck-order">0</span>
            </div>
            <div class="label">
                Chưa duyệt
            </div>
        </div>
        <div class="statistic">
            <div class="value">
                <i class="icons">
                    <i class="clipboard outline icon"></i>
                    <i class="bottom right corner blue clock icon"></i>
                </i>
                <span id="checked-order">0</span>
            </div>
            <div class="label">
                Đã duyệt
            </div>
        </div>
        <div class="statistic">
            <div class="value">
                <i class="icons">
                    <i class="clipboard outline icon"></i>
                    <i class="bottom right corner green check circle icon"></i>
                </i>
                <span id="delivered-order">0</span>
            </div>
            <div class="label">
                Đã giao hàng
            </div>
        </div>
        <div class="statistic">
            <div class="value">
                VND
                <span id="total-revenue">0</span>
            </div>
            <div class="label">
                Tổng tiền
            </div>
        </div>
    </div>

</div>

@push('script')
    <script>
        let today = new Date;
        let yesterday = (new Date);
        yesterday.setDate(today.getDate()-1);

        getOrder([today.getFullYear(), (today.getUTCMonth() + 1), today.getDate()]);

        function getOrderByDay(val) {
            if (val == '')
                return;
            let values = {
                today: [today.getFullYear(), (today.getUTCMonth() + 1), today.getDate()],
                yesterday: [yesterday.getFullYear(), yesterday.getUTCMonth() + 1, yesterday.getDate()]
            };
            let date = null;
            if (values[val] == null)
                date = val.split('-');
            else {
                date = values[val];
                $('#specific-day').hide();
            }
            getOrder(date);
        }

        function getOrder(date) {
            let query = `type=day&year=${date[0]}&month=${date[1]}&dayStart=${date[2]}&dayEnd=${date[2]}`;
            $('#loader').show();
            axios.get('/admin/ajax-request/statistic/order?' + query)
                .then(rs => {
                    updateStatistic(rs.data.data);
                    // $('#loader').hide();
                    console.log(rs.data.data);
                }).catch(e => console.log(e));
        }

        function updateStatistic(data) {
            let uncheck = data.uncheck[0];
            let checked = data.checked[0];
            let delivered = data.delivered[0];
            $('#total-order').text(val(uncheck.value) + val(checked.value) + val(delivered.value));
            $('#total-revenue').text(toCurrency(val(uncheck.extra, 6) + val(checked.extra, 6) + val(delivered.extra, 6)));
            $('#uncheck-order').text(uncheck.value);
            $('#checked-order').text(checked.value);
            $('#delivered-order').text(delivered.value);
        }

        function val(value, factor = 0) {
            return parseFloat(value) * (10 ** factor);
        }
    </script>
@endpush