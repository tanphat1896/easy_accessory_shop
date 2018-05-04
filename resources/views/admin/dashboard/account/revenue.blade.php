
<div class="ui segment">
    <canvas id="revenue-chart"></canvas>
</div>

@push('script')
    <script>
        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: '#3CB371',
            blue: 'rgb(54, 162, 235)',
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

        function getQueryData() {
            let type, year, month, quarter, dayStart, dayEnd;
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
                    backgroundColor: window.chartColors.red,
                    data: [],
                    borderColor: 'white',
                    borderWidth: 2
                }, {
                    type: 'bar',
                    label: 'Bán ra',
                    backgroundColor: window.chartColors.blue,
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
            console.log(source);
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
                })
            }

            let scales = {
                xAxes: [{display: true, scaleLabel: {display: true, labelString: source.axes.x}}],
                yAxes: [{display: true, scaleLabel: {display: true, labelString: source.axes.y}}]
            };

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