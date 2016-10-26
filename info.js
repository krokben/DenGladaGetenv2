function initMap() {
var denGladeGeten = { lat: 67.86434, lng: 20.21498 };
var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 6,
    center: denGladeGeten,
    scrollwheel: false

});
var marker = new google.maps.Marker({
    position: denGladeGeten,
    map: map

});

}

$.ajax({
            url : "text/infoheader1.txt",
            dataType: "text",
            success : function (data) {
                $("#infoheader1").html(data);
            }
        });
