$(function() {

    // Reset modal kembali seperti semula saat user menekan tombol input order masak
    $('.tombol-input-order-masak').click(function(){
        $('#modal-form-lable').html('Input Order Masak');
        $('.modal-footer button[type=submit]').html('SIMPAN');
        $('.modal-body form').attr('action', '/manager-produksi/order-masak');
        $('#input_hc').val('');
        $('#input_sp').val('');
        $('#input_gs').val('');
        $('#input_bawang').val('');
    });

    // Modifikasi modal untuk edit data order masak
    $('.tombol-edit-order-masak').click(function(){
        $('#modal-form-lable').html('Edit Order Masak');
        $('.modal-footer button[type=submit]').html('UPDATE');
        $('.modal-body form').attr('action', '/manager-produksi/update-order-masak');

        const id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/manager-produksi/edit-order-masak';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            cache: false,
            data: {id : id},
            dataType: 'json',
            success: function(data){
                console.log(data);
                $('#input_id').val(data.id);
                $('#input_hc').val(data.HC);
                $('#input_sp').val(data.SP);
                $('#input_gs').val(data.GS);
                $('#input_bawang').val(data.BAWANG);
            }
        });
    });
    
});