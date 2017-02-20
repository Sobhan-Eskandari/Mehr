var map;
var lat = 0;
var lng = 0;
var check = 0;
function showStore(a , b) {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
        center: new google.maps.LatLng(a,b),
        zoom: 14
    };
    map = new google.maps.Map(mapCanvas, mapOptions);
    var myCenter = new google.maps.LatLng(a, b);
    var marker = new google.maps.Marker({
        position: myCenter
    });
    // alert(b);
    marker.setMap(map);
}