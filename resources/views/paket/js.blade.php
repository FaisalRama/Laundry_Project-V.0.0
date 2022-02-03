<!-- JSQuery -->
@push('script')
<script>
    $(function(){
        // Data Table
        $('#tbl-barang').DataTable()

        // Alert
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("success-alert").slideUp(500);
        });

        $("#error-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("error-alert").slideUp(500);
        });

        // Delete Alert
        $('.delete-paket').click(function(e){
            e.preventDefault()
            let data = $(this).closest('tr').find('td:eq(1)').text()
            swal({
                title: "Apakah Kamu Yakin?", 
                text: "Yakin Ingin Menghapus Data yang anda pilih?",
                icon: "warning",
                buttons:true,
                dangerMode: true,
            })
            .then((req) => {
                if(req) $(e.target).closest('form').submit()
                else swal.close()
            })
        })

        // Edit dan Input Kelas -
    $('#IsiBarang').on('show.bs.modal', function(event){
        let button = $(event.relatedTarget)
        console.log(button)
        let id= button.data('id')
        let id_outlet= button.data('id_outlet')
        let jenis= button.data('jenis')
        let nama_paket= button.data('nama_paket')
        let harga= button.data('harga')
        let mode= button.data('mode')
        let modal= $(this)
        if(mode === "edit"){
            modal.find('.modal-title').text('Edit Data Paket')
            modal.find('.modal-body #id_outlet').val(id_outlet)
            modal.find('.modal-body #jenis').val(jenis)
            modal.find('.modal-body #nama_paket').val(nama_paket)
            modal.find('.modal-body #harga').val(harga)
            modal.find('.modal-footer #btn-submit').text('Update')
            modal.find('.modal-body #method').html('{{ method_field('patch') }}')
            modal.find('.modal-body form').attr('action', 'paket/'+id)
        }else{
            modal.find('.modal-title').text('Input Data Paket')
            modal.find('.modal-body #id_outlet').val('')
            modal.find('.modal-body #jenis').val('')
            modal.find('.modal-body #nama_paket').val('')
            modal.find('.modal-body #harga').val('')
            modal.find('.modal-body #method').html("")
            modal.find('.modal-footer #btn-submit').text('Submit')
        }
    })
    });
</script>
@endpush