<script>
    $('#btn-toggle-menu').click(function(){

        let wideMenu = $('#wide-menu');
        let thinMenu = $('#thin-menu');

        $(thinMenu).transition('slide right');
        $(wideMenu).transition('slide right');
        if ($(this).data('menu') === "wide") {
            $('#main-container').animate({marginLeft: 50}, 100);
            $(this).data('menu', "thin");
            $('#logo').animate({width: 50}, 100, function() {
                $('#logo').find('img').attr('src', "{{ asset('assets/images/thumb.png') }}");
            });

        } else {
            $('#main-container').animate({marginLeft: 220}, 100);
            $(this).data('menu', "wide");
            $('#logo').animate({width: 220}, 200);
            $('#logo').find('img').attr('src', "{{ asset('assets/images/logo.png') }}");
        }
    });
</script>