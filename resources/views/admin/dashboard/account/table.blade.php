<table class="ui very compact table celled striped center aligned" id="account-table">
    <thead>
    <tr><th id="duration"></th><th>Mua vào</th><th>Bán ra</th><th>Hiệu số</th></tr>
    </thead>
    <tbody>

    </tbody>
</table>

@push('script')
    <script>
        function renderTable(source) {
            let revenues = source.data.revenues;
            let buyings = source.data.buyings;
            $('#duration').text(source.axes.x);
            let tbody = buildTableBody(revenues, buyings);
            $('#account-table').find('tbody').html(tbody);
        }

        function buildTableBody(revenues, buyings) {
            let tbody = '';
            let revenueSum = 0, buyingSum = 0, roi = 0;
            for (let i = 0; i < revenues.length; i++) {
                tbody += buildRow(revenues[i], buyings[i]);
                revenueSum += parseFloat(revenues[i].value);
                buyingSum += parseFloat(buyings[i].value);
                roi += (revenues[i].value - buyings[i].value);
            }
            tbody += `<tr>
                <td><strong>Tổng cộng:</strong></td>
                <td><strong>${buyingSum.toFixed(2)}</strong></td>
                <td><strong>${revenueSum.toFixed(2)}</strong></td>
                <td><strong>${roi.toFixed(2)}</strong></td>
            </tr>`;
            return tbody;
        }

        function buildRow(revenue, buying) {
            if (revenue.value == 0 && buying.value == 0)
                return '';
            let tr = '';
            tr += `<tr>
                <td><strong>${revenue.label}</strong></td>
                <td>${buying.value}</td>
                <td>${revenue.value}</td>
                <td>${(revenue.value - buying.value).toFixed(2)}</td>
            </tr>`;
            return tr;
        }
    </script>
@endpush
