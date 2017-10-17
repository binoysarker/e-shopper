$(document).ready(function () {
    //code for editing the product image
    $('#change-file').css('display','none');
    $('#change-image').on('click',function (e) {
        e.preventDefault();
        $('#change-file').slideToggle();
    });

    // code for elevate zoom section
    $('#zoom_01').elevateZoom();
});



