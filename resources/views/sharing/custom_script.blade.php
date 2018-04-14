<script>
    function toCurrency(number) {
        return number.toString().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1,');
    }
</script>
@stack('script')