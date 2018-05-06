<table class="ui compact table celled striped center aligned" id="account-table">
    <thead>
    <tr><th id="duration"></th><th>Chưa duyệt</th><th>Đã duyệt</th><th>Đã giao hàng</th></tr>
    </thead>
    <tbody>

    </tbody>
</table>

@push('script')
    <script>
        function renderTable(source) {
            let uncheck = source.data.uncheck;
            let checked = source.data.checked;
            let delivered = source.data.delivered;
            $('#duration').text(source.axes.x);
            let tbody = buildTableBody(uncheck, checked, delivered);
            $('#account-table').find('tbody').html(tbody);
        }

        function buildTableBody(uncheck, checked, delivered) {
            let tbody = '';
            let uncheckSum = 0, checkSum = 0, delSum = 0;
            for (let i = 0; i < delivered.length; i++) {
                tbody += buildRow(uncheck[i], checked[i], delivered[i]);
                uncheckSum += parseFloat(uncheck[i].value);
                checkSum += parseFloat(checked[i].value);
                delSum += parseFloat(delivered[i].value);
            }
            tbody += `<tr>
                <td><strong>Tổng cộng:</strong></td>
                <td><strong>${uncheckSum}</strong></td>
                <td><strong>${checkSum}</strong></td>
                <td><strong>${delSum}</strong></td>
            </tr>`;
            return tbody;
        }

        function buildRow(u, c, d) {
            if (u.value == 0 && c.value == 0 && d.value == 0)
                return '';
            let tr = '';
            tr += `<tr>
                <td><strong>${u.label}</strong></td>
                <td>${u.value}</td>
                <td>${c.value}</td>
                <td>${d.value}</td>
            </tr>`;
            return tr;
        }
    </script>
@endpush
