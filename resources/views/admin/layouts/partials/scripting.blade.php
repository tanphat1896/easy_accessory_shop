<script src="{{ asset('plugin/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('plugin/chartjs/Chart.PieceLabel.min.js') }}"></script>
<script src="{{ asset('plugin/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugin/datatable/dataTables.semanticui.min.js') }}"></script>
<script src="{{ asset('js/admin-script.js') }}"></script>


<script>
    // script đặc biệt cần sử dụng blade
    function toggleSidebar() {
        let wide = '{{ $wideMenu }}';
        let collapsed = wide != '1';
        let sidebarWide = $('#sidebar-wide');
        let sidebarThin = $('#sidebar-thin');
        let mainContainer = $('#main-container');
        let logo = $('#logo');
        return function () {
            if (collapsed) {
                loadWideSidebar(sidebarWide, sidebarThin, mainContainer, logo);
                axios.get('/admin/menu_state/1');
                collapsed = false;
                return;
            }
            loadThinSidebar(sidebarWide, sidebarThin, mainContainer, logo);
            axios.get('/admin/menu_state/0');
            collapsed = true;
        };
    }

    function loadWideSidebar(sidebarWide, sidebarThin, mainContainer, logo) {
        let width = 220;
        let margin = 220;
        let duration = 350;
        $(logo).animate({width: width}, duration);
        $(mainContainer).animate({marginLeft: margin}, duration);
        $('#btn-toggle-menu').find('i').removeClass('right').addClass('left');
        $(sidebarWide).transition('slide right', duration);
        $(sidebarThin).transition('slide right', duration);
    }

    function loadThinSidebar(sidebarWide, sidebarThin, mainContainer, logo) {
        let width = 50;
        let margin = 50;
        let duration = 350;
        $(logo).animate({width: width}, duration);
        $(mainContainer).animate({marginLeft: margin}, duration);
        $('#btn-toggle-menu').find('i').removeClass('left').addClass('right');
        $(sidebarWide).transition('slide right', duration);
        $(sidebarThin).transition('slide right', duration);
    }

    $('#btn-toggle-menu').click(toggleSidebar());

    // (function(e) {
    //     let timeout;
    //     window.addEventListener('resize', function(e) {
    //         clearTimeout(timeout);
    //         timeout = setTimeout(function() {
    //             console.log(e);
    //         }, 300);
    //     });
    // })();

    function buildChart(id, type, dataSource, name, customColors = null) {
        let ctx = document.getElementById(id).getContext('2d');
        let colors = customColors || ['#36A2EB', '#4BC0C0', '#FFCD56', '#FF9F40', '#FF6384','#f57f17','#1565c0', '#004d40', '#827717'];
        // let colors = customColors || ['#56E289', '#E2CF56', '#E256AE', '#56AEE2', '#E28956','#f57f17','#1565c0', '#004d40', '#827717'];
        let dataVals = [], labels = [], bgColors = [];

        dataSource.forEach(function(datum, idx) {
            bgColors.push(colors[idx]);
            dataVals.push(datum.total);
            labels.push(datum[name]);
        });
        let data = {
                datasets: [{
                    data: dataVals,
                    backgroundColor: bgColors
                }],
                labels: labels
            };
        new Chart(ctx, {
            type: type,
            data: data,
            options: {
                pieceLabel: {
                    render: 'percentage',
                    frontColor: ['black'],
                    precision: 2
                }
            }
        });
    }

</script>
