<script>
    $('#btn-toggle-menu').click(function(){

        let wideMenu = $('#wide-menu');
        let thinMenu = $('#thin-menu');

        $(thinMenu).transition('slide right', 500);
        $(wideMenu).transition('slide right', 500);
        if ($(this).data('menu') === "wide") {
            $('#main-container').animate({marginLeft: 50}, 300);
            $(this).data('menu', "thin");
            $('#logo').animate({width: 50}, 300, function() {
                $('#logo').find('img').attr('src', "{{ asset('assets/images/thumb.png') }}");
            });

        } else {
            $('#main-container').animate({marginLeft: 220}, 300);
            $(this).data('menu', "wide");
            $('#logo').animate({width: 220}, 300);
            $('#logo').find('img').attr('src', "{{ asset('assets/images/logo.png') }}");
        }
    });
</script>