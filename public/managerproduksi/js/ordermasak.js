$(function() {
    // Menu aktif
    $('.menu-order-masak').addClass('active');

    // Animasi modal
    $('.tombol-input-order-masak').click(function(br) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + $(this).data("animation") + '  animated');
    });
    
    $('.tombol-edit-order-masak').click(function(br) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + $(this).data("animation") + '  animated');
    });

    // Status order masak
    var status = $('.status_order').html();
    if (status == 0) {
        $('.status_order').html('Belum').css('color', 'red');
    } else if (status == 1) {
        $('.status_order').html('Ready').css('color', 'green');
    } else {
        $('.status_order').html('Selesai').css('color', 'black');
    }
    
});