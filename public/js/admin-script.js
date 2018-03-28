$('.need-popup').popup({position: 'bottom left'});

function confirmDelete() {
    if ($('.ui.child.checkbox input:checked').length < 1)
        return false;

    return confirm('Bạn chắc chắn xóa các mục vừa chọn?');
}

function bindSelectAll(id) {
    let selector = $('#' + id);
    $(selector).checkbox({
        onChange() {
            let checked = $(selector).find('input').prop('checked');
            $('.ui.child.checkbox').checkbox(checked ? 'check': 'uncheck');
        }
    });
}

function bindDataTable(tableId) {
    $('#' + tableId).DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ dòng mỗi trang",
            "zeroRecords": "Không có dữ liệu",
            "info": "<strong>Trang _PAGE_ / _PAGES_</strong>",
            "infoEmpty": "<strong>Không có dữ liệu</strong>",
            "infoFiltered": "(lọc từ _MAX_ dòng)",
            "search": "",
            "paginate": {
                "next":       "<strong>&raquo;</strong>",
                "previous":   "<strong>&laquo;</strong>"
            },
        }
    });
    let search = $('.dataTables_filter.ui.input');
    $(search).find('input').attr('placeholder', 'Tìm kiếm').detach().appendTo($(search));
}