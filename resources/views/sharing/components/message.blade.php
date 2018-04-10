@if(Session::has('message'))
    @push('script')
        <script>
            $.toast({
                heading: 'Thông báo',
                text: '{{ Session::get('message') }}',
                icon: 'info',
                position: 'bottom-right',
                loader: false
            });
        </script>
    @endpush
@endif