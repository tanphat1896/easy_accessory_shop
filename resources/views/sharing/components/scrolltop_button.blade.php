<style>
    #scrolltop {
        position: fixed;
        right: 10px;
        bottom: 15px;
        z-index: 1000;
    }
</style>

<button type="button" id="scrolltop" class="ui tiny blue icon button" style="display: none;">
    <i class="chevron up icon"></i></button>

@push('script')
    <script>
        let showButton = function () {
            let id_button = '#scrolltop';
            let offset = 220;
            return function () {
                $(this).scrollTop() > offset ? $(id_button).show() : $(id_button).hide();
            }
        };
        $(window).scroll(showButton());

        $('#scrolltop').click(function (event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, 500);
        });
    </script>
@endpush