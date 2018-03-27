<script src="{{ asset('plugin/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugin/datatable/dataTables.semanticui.min.js') }}"></script>
<script src="{{ asset('js/admin-script.js') }}"></script>


<script>
    // script đặc biệt cần sử dụng blade
    function toggleSidebar() {
        let collapsed = false;
        let sidebar = $('#sidebar');
        let mainContainer = $('#main-container');
        let logo = $('#logo');
        return function () {
            if (collapsed) {
                loadWideSidebar(sidebar, mainContainer, logo);
                collapsed = false;
                return;
            }
            loadThinSidebar(sidebar, mainContainer, logo);
            collapsed = true;
        };
    }

    function loadWideSidebar(sidebar, mainContainer, logo) {
        let width = 220;
        let margin = 220;
        let duration = 250;
        $(logo).find('img').attr('src', "{{ asset('assets/images/logo.png') }}");
        $(logo).animate({width: width}, duration);
        animating(sidebar, mainContainer, width, margin, duration);
        $(sidebar).load('/admin/sidebar-wide').removeClass('icon');
    }

    function loadThinSidebar(sidebar, mainContainer, logo) {
        let width = 50;
        let margin = 50;
        let duration = 250;
        $(logo).animate({width: width}, duration, function() {
            $(logo).find('img').attr('src', "{{ asset('assets/images/thumb.png') }}");
        });
        animating(sidebar, mainContainer, width, margin, duration);
        $(sidebar).load('/admin/sidebar-thin').addClass('icon');
    }

    function animating(sidebar, mainContainer, width, marginLeft, duration) {
        $(sidebar).animate({width: width}, duration);
        $(mainContainer).animate({marginLeft: marginLeft}, duration);
    }

    $('#btn-toggle-menu').click(toggleSidebar());

</script>