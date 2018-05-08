
<div class="ui segment">
    <canvas id="revenue-chart"></canvas>
</div>

@push('script')
    <script>
        // dữ liệu cho xuất pdf
        let title = 'Thống kê thu chi theo ';
        let cols = [], rows = [];


        let type, year, month, quarter, dayStart, dayEnd;

        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            lred: 'rgba(255, 99, 132, .2)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            lyellow: 'rgba(255, 205, 86, .2)',
            green: '#3CB371',
            blue: 'rgb(54, 162, 235)',
            lblue: 'rgb(54, 162, 235, .2)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };

        renderChart();

        let needShow = {
            year: [],
            quarter: ['year'],
            month: ['year'],
            day: ['year', 'month', 'day-start', 'day-end']
        };

        function show() {
            let type = $('#type').val();
            if (type === 'all')
                return $('.will-hide').hide();
            $('.will-hide').hide();
            needShow[type].forEach((e) => $('#select-' + e).show());
        }

        function renderChart(e = null) {
            if (e !== null)
                e.preventDefault();

            cleanData();

            let chartId = 'revenue-chart';
            let query = getQueryData();

            // console.log(query);

            axios.get('/admin/ajax-request/statistic/account?' + query)
                .then(rs => {
                    createLineChart(chartId, rs.data);
                    renderTable(rs.data);
                })
                .catch(err => console.log(err));
        }

        function cleanData() {
            cols = ['Mua vao', 'Ban ra', 'Hieu so'];
            title = 'Thống kê thu chi theo ';
            rows = [];
        }

        function getQueryData() {
            type = $('#type').val();
            year = $('#year').val();
            month = $('#month').val();
            quarter = $('#quarter').val();
            dayStart = $('#day-start').val();
            dayEnd = $('#day-end').val();

            let data = {type, year, month, quarter, dayStart, dayEnd};
            return Object.keys(data).map(key => (key + "=" + data[key])).join('&');
        }

        let ctx, chart = null;
        let config = {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    type: 'line',
                    label: 'Bán ra - mua vào',
                    borderColor: window.chartColors.yellow,
                    borderWidth: 2,
                    data: []
                }, {
                    type: 'bar',
                    label: 'Mua vào',
                    borderColor: window.chartColors.red,
                    backgroundColor: window.chartColors.lred,
                    data: [],
                    borderWidth: 2
                }, {
                    type: 'bar',
                    label: 'Bán ra',
                    borderColor: window.chartColors.blue,
                    backgroundColor: window.chartColors.lblue,
                    data: [],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                tooltips: {mode: 'index', intersect: true,},
                hover: {mode: 'nearest', intersect: true},
            }
        };

        function createLineChart(id, source) {
            // console.log(source);
            if (ctx == null)
                ctx = document.getElementById(id).getContext('2d');

            let labels = [],
                values = {
                    revenues: [],
                    buyings: [],
                    redundancies: []
                };

            let revenues = source.data.revenues;
            let buyings = source.data.buyings;

            for (let i = 0; i < revenues.length; i++) {
                let rev = getValidValue(revenues[i]);
                let buy = getValidValue(buyings[i]);
                labels.push(revenues[i].label);
                values.revenues.push(rev);
                values.buyings.push(buy);
                values.redundancies.push({
                    x: i + 1,
                    y: (rev - buy).toFixed(2)
                });

                // them data cho export
                rows.push([revenues[i].label, buy, rev, (rev-buy).toFixed(2)]);
            }

            let scales = {
                xAxes: [{display: true, scaleLabel: {display: true, labelString: source.axes.x}}],
                yAxes: [{display: true, scaleLabel: {display: true, labelString: source.axes.y}}]
            };

            // them ten cot
            cols.unshift(toAscii(source.axes.x));
            title += source.axes.x.toLowerCase();
            if (type == 'month' || type == 'quarter')
                title += ' nam ' + year;
            if (type == 'day')
                title += ' trong thang ' + month + "/" + year;

            config.data.labels = labels;
            config.data.datasets[0].data = values.redundancies;
            config.data.datasets[1].data = values.buyings;
            config.data.datasets[2].data = values.revenues;
            config.options.scales = scales;

            (chart == null) ? chart = new Chart(ctx, config) : chart.update();
        }

        function getValidValue(item) {
            return item == null ? 0 : item.value;
        }
    </script>
@endpush