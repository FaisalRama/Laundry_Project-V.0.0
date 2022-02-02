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
        $('.delete-member').click(function(e){
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
        let nama= button.data('nama')
        let alamat= button.data('alamat')
        let jenis_kelamin= button.data('jenis_kelamin')
        let tlp= button.data('tlp')
        let mode= button.data('mode')
        let modal= $(this)
        if(mode === "edit"){
            modal.find('.modal-title').text('Edit Data Member')
            modal.find('.modal-body #nama').val(nama)
            modal.find('.modal-body #alamat').val(alamat)
            modal.find('.modal-body #jenis_kelamin').val(jenis_kelamin)
            modal.find('.modal-body #tlp').val(tlp)
            modal.find('.modal-footer #btn-submit').text('Update')
            modal.find('.modal-body #method').html('{{ method_field('patch') }}')
            modal.find('.modal-body form').attr('action', 'member/'+id)
        }else{
            modal.find('.modal-title').text('Input Data Member')
            modal.find('.modal-body #nama').val('')
            modal.find('.modal-body #alamat').val('')
            modal.find('.modal-body #jenis_kelamin').val('')
            modal.find('.modal-body #tlp').val('')
            modal.find('.modal-body #method').html("")
            modal.find('.modal-footer #btn-submit').text('Submit')
        }
    })
    });
</script>
@endpush

