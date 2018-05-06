@push('script')
    <script>
        function checkDate(form) {
            let start = $(form).find('[name="ngay-bat-dau"]').val();
            let end = $(form).find('[name="ngay-ket-thuc"]').val();
            if (start < end)
                return true;

            $.toast({
                heading: 'Ngày không hợp lệ',
                text: 'Ngày kết thúc phải lớn hơn ngày bắt đầu!',
                icon: 'error',
                loader: false,
                position: "top-center"
            });

            return false;
        }
    </script>
@endpush