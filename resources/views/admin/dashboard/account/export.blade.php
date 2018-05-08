<div class="ui large modal" id="modal-export" style="height: 90%;">
    <i class="close icon"></i>
    <div class="content" style="height: 100%">
        <h4 class="ui dividing header">Xuất dữ liệu</h4>
        <iframe id="iframe" src="" height="90%"  width="100%" frameborder="0"></iframe>
    </div>
</div>

@push('script')
    <script src="{{ asset('plugin/jsPDF/jspdf.min.js') }}"></script>
    <script src="{{ asset('plugin/jsPDF/jspdf.plugin.autotable.js') }}"></script>
    <script>
        function showExport(t, c, r) {
            let doc = new jsPDF('p', 'pt');
            doc.autoTable(c, r, {
                margin: {top: 50},
                addPageContent: function(data) {
                    doc.setFontSize(15);
                    t = t.trim() == '' ? title: t;
                    doc.text(toAscii(t), 35, 30);
                    doc.setFontSize(10);
                    doc.text('{{ date('d/m/Y') }}', doc.internal.pageSize.width - 100, 30);
                }
            });
            $('#iframe').attr('src', doc.output('datauristring'));
            $('#modal-export').modal({duration: 0}).modal('show');
        }

        function showExportMultiple(t, t1, c1, r1, t2, c2, r2) {
            let doc = new jsPDF();
            doc.setFontSize(15);
            t = t.trim() == '' ? title: t;
            doc.text(t, 14, 20);
            doc.setFontSize(12);

            doc.setFontSize(10);
            doc.text('{{ date('d/m/Y') }}', doc.internal.pageSize.width - 32, 20);


            doc.setFontSize(12);
            doc.text(t1, 14, 30);
            doc.autoTable(c1, r1, { startY: 32 });

            let first = doc.autoTable.previous;

            doc.text(t2, 14, first.finalY + 10);
            doc.autoTable(c2, r2, {
                startY: first.finalY + 12,
                showHeader: 'firstPage'
            });

            $('#iframe').attr('src', doc.output('datauristring'));
            $('#modal-export').modal({duration: 0}).modal('show');
        }
    </script>
@endpush