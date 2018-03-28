<script src="{{ asset('plugin/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugin/datatable/dataTables.semanticui.min.js') }}"></script>
<script src="{{ asset('js/admin-script.js') }}"></script>


<script>
    // script đặc biệt cần sử dụng blade
    function toggleSidebar() {
        let collapsed = false;
        let sidebarWide = $('#sidebar-wide');
        let sidebarThin = $('#sidebar-thin');
        let mainContainer = $('#main-container');
        let logo = $('#logo');
        return function () {
            if (collapsed) {
                loadWideSidebar(sidebarWide, sidebarThin, mainContainer, logo);
                collapsed = false;
                return;
            }
            loadThinSidebar(sidebarWide, sidebarThin, mainContainer, logo);
            collapsed = true;
        };
    }

    function loadWideSidebar(sidebarWide, sidebarThin, mainContainer, logo) {
        let width = 220;
        let margin = 220;
        let duration = 250;
        $(logo).find('img').attr('src', "{{ asset('assets/images/logo.png') }}");
        $(logo).animate({width: width}, duration);
        $(mainContainer).animate({marginLeft: margin}, duration);
        $(sidebarWide).transition('slide right', duration);
        $(sidebarThin).transition('slide right', duration);
    }

    function loadThinSidebar(sidebarWide, sidebarThin, mainContainer, logo) {
        let width = 50;
        let margin = 50;
        let duration = 250;
        $(logo).animate({width: width}, duration, function() {
            $(logo).find('img').attr('src', "{{ asset('assets/images/thumb.png') }}");
        });
        $(mainContainer).animate({marginLeft: margin}, duration);
        $(sidebarWide).transition('slide right', duration);
        $(sidebarThin).transition('slide right', duration);
    }

    $('#btn-toggle-menu').click(toggleSidebar());

</script>