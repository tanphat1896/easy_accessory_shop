@if(Session::has('success'))
    {{--<div class="ui small positive message">--}}
        {{--{{ Session::get('success') }}--}}
        {{--<i class="close icon" onclick="$(this).closest('.message').transition('fade')"></i>--}}
    {{--</div>--}}
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