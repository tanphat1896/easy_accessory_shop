<script>
    function toCurrency(number) {
        return number.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1,');
    }
</script>
@stack('script')