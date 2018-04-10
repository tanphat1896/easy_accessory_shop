@if(Session::has('success'))
    @push('script')
        <script>
            $.toast({
                heading: 'Thông báo',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                position: 'bottom-right',
                loader: false
            });
        </script>
    @endpush
@endif