$(function() {
    // Menu aktif
    $('.menu-data-produksi').addClass('active');

    // Animasi modal
    $('.tombol-ambil-tepung').click(function(br) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + $(this).data("animation") + '  animated');
    });

    $('.tombol-tambah-hasil-packing').click(function(br) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + $(this).data("animation") + '  animated');
    });
});