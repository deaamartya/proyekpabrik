$(function() {
    // Menu aktif
    $('.menu-data-produksi').addClass('active');

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