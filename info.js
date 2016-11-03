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

var u = document.cookie[0] + document.cookie[1] + document.cookie[2] + document.cookie[3] + document.cookie[4];
    p = document.cookie[6] + document.cookie[7] + document.cookie[8] + document.cookie[9] + document.cookie[10];
    $.post("login.php", { username: u, password: p }, function (response) {
        if (response == "success") {
            console.log("ok!");
            var paragraph = document.getElementsByClassName("paragraph");
            for (i = 0; i < paragraph.length; i++) {
                paragraph[i].setAttribute("contentEditable", true);
                paragraph[i].setAttribute("contentEditable", true);
            }
            document.getElementById("boldButton").style.display = "block";
        }
        else {
            console.log("nej");
            document.getElementById("boldButton").style.display = "none";
        }
    });

// Läs data från data.txt
var paragraph1 = document.getElementById("paragraph1");

$.ajax({
            url : "data.txt",
            dataType: "text",
            success : function (data) {
                $("#paragraph1").html(data);
            }
        });
// Ändra paragraf och spara i data.txt
$("#paragraph1").blur(function(){
   var myText = $("#paragraph1").html();
   console.log('Textarea: '+myText);
   var url ="save.php";
   $.post(url, { myText: myText }, function(data){
   console.log('response from the callback function: '+ data);
   }).fail(function(jqXHR){
     alert(jqXHR.status +' '+jqXHR.statusText+ ' $.post failed!');
  });
});

// Rich text editor
[].forEach.call(document.querySelectorAll("[data-edit]"), function(btn) {
  btn.addEventListener("click", edit, false);
});

function edit(event) {
  event.preventDefault();
  var cmd_val = this.dataset.edit.split(":");
  document.execCommand(cmd_val[0], false, cmd_val[1]);
}
