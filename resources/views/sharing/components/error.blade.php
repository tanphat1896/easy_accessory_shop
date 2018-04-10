@if(Session::has('error'))
    @push('script')
        <script>
            $.toast({
                heading: 'Lỗi!',
                text: '{{ Session::get('error') }}',
                icon: 'error',
                position: 'bottom-right',
                loader: false
            });
        </script>
    @endpush
@endif