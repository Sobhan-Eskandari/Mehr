$(document).ready(function () {
    $('.admin_side_title').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });
});

$(document).ready(function () {
    $('li.activate_pag').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });


    $(document).on('change', ':file', function () {

        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label, input]);
        console.log($(input).attr('id'));
    });

    // $("#user_file_upload").click(function() {
    //    var input = $(this),numFiles = input.get(0).files ? input.get(0).files.length : 1,
    //         label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    //         input.trigger('fileselect', [numFiles, label]);
    // });
    // $("#store_file_upload").click(function() {
    //   var input = $(this),
    //     numFiles = input.get(0).files ? input.get(0).files.length : 1,
    //         label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    // });
});
$(document).ready(function () {
    $(':file').on('fileselect', function (event, numFiles, label, input) {
        console.log("hi" + $(input).attr('id'));
        console.log(label);

        if ($(input).attr('id') == "user_file_upload") {
            $("#users_fileaddress").val(label);
        } else if ($(input).attr('id') == "store_file_upload") {
            $("#stores_fileaddress").val(label);
        } else if ($(input).attr('id') == "storeimg_uploadbtn_1") {
            $("#store_img1").val(label);
        } else if ($(input).attr('id') == "storeimg_uploadbtn_2") {
            $("#store_img2").val(label);
        } else if ($(input).attr('id') == "storeimg_uploadbtn_3") {
            $("#store_img3").val(label);
        } else {
            $("#logo_img").val(label);
        }
    });

});


//////////////////////

function myMap() {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
        center: new google.maps.LatLng(51.5, -0.2),
        zoom: 10
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);
}