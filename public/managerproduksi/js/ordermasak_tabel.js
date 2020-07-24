$(function() {
    // Status order masak
    var status = $('.status_order').html();
    if (status == 1) {
        $('.status_order').html('Selesai').css('color', 'black');
    } else {
        $('.status_order').html('Belum').css('color', 'red');
    }
});