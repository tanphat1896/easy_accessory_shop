<script>
    function redirectTo(url) {
        window.location.href = url;
    }
    function pressEnter(event, callback) {
        if (event.keyCode === 13)
            callback();
    }
    function toCurrency(number) {
        return number.toString().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1,');
    }
</script>
@stack('script')