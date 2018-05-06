
<h4 class="ui header">
    <div class="ui dropdown">
        <div class="text">Ngày hôm nay</div>
        <i class="dropdown icon"></i>
        <div class="menu">
            <div class="item" onclick="getAccountByDay('today')">Ngày hôm nay</div>
            <div class="item" onclick="getAccountByDay('yesterday')">Ngày hôm qua</div>
            <div class="item" onclick="$('#specific-day').show()">Ngày cụ thể</div>
        </div>
    </div>
    <div class="ui mini input">
        <input type="date" style="display: none;" id="specific-day" onchange="getAccountByDay(this.value)">
    </div>
</h4>

<div class="ui segment">
    <div class="ui tiny three statistics">
        <div class="statistic">
            <div class="value">
                <i class="dolly yellow circular icon"></i>
                <span id="total-buying">0</span>
            </div>
            <div class="label">
                Mua vào
            </div>
        </div>
        <div class="statistic">
            <div class="value">
                <i class="shipping fast green circular icon"></i>
                <span id="total-revenue">0</span>
            </div>
            <div class="label">
                Bán ra
            </div>
        </div>
        <div class="statistic">
            <div class="value">
                <i class="bottom right corner blue chart line circular icon"></i>
                <span id="redundant">0</span>
            </div>
            <div class="label">
                Hiệu số
            </div>
        </div>
    </div>

</div>

@push('script')
    <script>
        let today = new Date;
        let yesterday = (new Date);
        yesterday.setDate(today.getDate()-1);

        getAccount([today.getFullYear(), (today.getUTCMonth() + 1), today.getDate()]);

        function getAccountByDay(val) {
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
            getAccount(date);
        }

        function getAccount(date) {
            let query = `type=day&year=${date[0]}&month=${date[1]}&dayStart=${date[2]}&dayEnd=${date[2]}`;
            $('#loader').show();
            axios.get('/admin/ajax-request/statistic/account?' + query)
                .then(rs => {
                    updateStatistic(rs.data.data);
                }).catch(e => console.log(e));
        }

        function updateStatistic(data) {
            console.log(data);
            let revenue = data.revenues[0];
            let buying = data.buyings[0];
            $('#total-buying').text(toCurrency(val(buying.value, 6)) + "đ");
            $('#total-revenue').text(toCurrency(val(revenue.value, 6)) + "đ");
            $('#redundant').text(toCurrency(val(revenue.value - buying.value, 6)) + "đ");
        }

        function val(value, factor = 0) {
            return parseFloat(value) * (10 ** factor);
        }
    </script>
@endpush