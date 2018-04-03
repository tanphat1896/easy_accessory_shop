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

</script>
