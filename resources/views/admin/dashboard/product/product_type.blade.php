
<h4 class="ui header">Sản phẩm theo loại</h4>

<div class="ui grid stackable">
    <div class="ten wide column">
        <div class="ui segment">
            <canvas id="product-type-chart"></canvas>
        </div>
    </div>

    <div class="six wide column">
        <table class="ui very compact table celled striped center aligned" id="product-type-table">
            <thead>
            <tr><th>STT</th><th>Loại sản phẩm</th><th>Số lượng</th></tr>
            </thead>
            <tbody></tbody>
            <tfoot>
            <tr><th colspan="2"><strong>Tổng cộng</strong></th><th>{{ $total }}</th></tr>
            </tfoot>
        </table>
    </div>
</div>

@push('script')
    <script>
        let types = JSON.parse('{!! $productTypes !!}');
        let labels = [], data = [];
        let tbody = '';
        types.forEach((type, idx) => {
            labels.push(type.label);
            data.push(type.value);
            tbody += tableRow(idx, type);
        });

        $('#product-type-table').find('tbody').html(tbody);

        let ctx = document.getElementById("product-type-chart").getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 0, 233, 0.2)',
                        'rgba(120, 135, 0, 0.2)',
                        'rgba(135, 28, 0, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 0, 233, 1)',
                        'rgba(120, 135, 0, 1)',
                        'rgba(135, 28, 0, 1)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                legend: {
                    display: false
                },
                responsive: true,
                tooltips: {mode: 'index', intersect: true,},
                hover: {mode: 'nearest', intersect: true},
                scales: {
                    xAxes: [{display: true, scaleLabel: {display: true, labelString: 'Loại sản phẩm'}}],
                    yAxes: [{display: true, scaleLabel: {display: true, labelString: 'Số lượng'}}]
                }
            }
        });

        function tableRow(idx, data) {
            return `<tr><td>${idx+1}</td><td class='left aligned'>${data.label}</td><td>${data.value}</td></tr>`;
        }
    </script>
@endpush