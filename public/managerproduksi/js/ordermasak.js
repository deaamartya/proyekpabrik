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

    
});