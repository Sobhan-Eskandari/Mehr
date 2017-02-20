

var map;
var lat = 0;
var lng = 0;
var check = 0;
function myMap() {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
        center: new google.maps.LatLng(37.463909, 49.479862),
        zoom: 14
    };
    map = new google.maps.Map(mapCanvas, mapOptions);
    //alert(map);
    $('#addToMap').click( function () {
        /////add pin to map
        var handler = google.maps.event.addListener(map, 'click', function (event) {
            lat = event.latLng.lat();
            lng = event.latLng.lng();
            $('#inputWidth').val(lng);
            $('#inputHeight').val(lat);
            var myCenter = new google.maps.LatLng(lat, lng);
            $('#addToMap').css("visibility","hidden");
            var marker = new google.maps.Marker({
                position: myCenter

            });
            marker.setMap(map);

            ////////
            ///create info window
            var infowindow = new google.maps.InfoWindow({
                content: '<p>najm</p><input type="submit" value="delete pin" id="3" onclick="DeleteMarkers()">'
            });
            marker.addListener('mouseover', function () {
                infowindow.open(map, marker);
                $("#3").on('click', function () {
                    $('#addToMap').css("visibility","visible");
                    $('#inputWidth').val('');
                    $('#inputHeight').val('');
                    marker.setMap(null);
                });
                /////delete
            });
            google.maps.event.clearListeners(map, 'click');
        });
    });

}
function add(a,b){
        //alert(b);
    var myCenter = new google.maps.LatLng(a, b);
    var marker = new google.maps.Marker({
        position: myCenter
    });
    // alert(b);
    marker.setMap(map);
    var infowindow = new google.maps.InfoWindow({
        content: '<p>najm</p><input type="submit" value="delete pin" id="3" onclick="DeleteMarkers()">'
    });
    $('#addToMap').css("visibility","hidden");
    marker.addListener('mouseover', function () {
        infowindow.open(map, marker);
        $("#3").on('click', function () {
            $('#addToMap').css("visibility","visible");
            $('#inputWidth').val('');
            $('#inputHeight').val('');
            marker.setMap(null);
        });

});
}

// $(document).ready(function () {
//     $("#1").click(function () {
//         alert(map.getZoom());
//     });
//
// });