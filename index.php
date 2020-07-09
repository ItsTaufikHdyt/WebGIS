<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contoh Leaflet GIS</title>
	<style>
	#mapid{
		width: 800px;
		height: 600px;
	}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
	<!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	  <div class="row">
	  	<?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>
		<div id="mapid" class="col-sm"></div>
		<div class="col-sm">
			<form method="post" action="addMap.php">
				<div class="form-group">
    				<label for="exampleInputEmail1">Nama Tempat</script></label>
					<input type="text" name="nama">
				</div>
				<div class="form-group">
    				<label for="exampleInputEmail1">Latitude</script></label>
					<input type="text" id="lat" name="latitude">
				</div>
				<div class="form-group">
    				<label for="exampleInputEmail1">Longitude</label>
					<input type="text" id="lng" name="longitude">
				</div>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		</div>
	</div>
<script type="text/javascript">

 $( document ).ready(function() {
   putDraggable();
   addMarker();
  });

var mymap = L.map('mapid').setView([0.1177297, 117.4842881], 13);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoidGF1ZmlraGR5dDE3IiwiYSI6ImNrY2I3ODh5dzAxeW4ycm5lNDFlemlqd2gifQ.ZgnwicJp8oBNNvpyCcP34w'
}).addTo(mymap);

function putDraggable() {
   /* create a draggable marker in the center of the map */
   draggableMarker = L.marker([ mymap.getCenter().lat, mymap.getCenter().lng], {draggable:true, zIndexOffset:900}).addTo(mymap);
   
   /* collect Lat,Lng values */
   draggableMarker.on('dragend', function(e) {
    $("#lat").val(this.getLatLng().lat).toString();
    $("#lng").val(this.getLatLng().lng).toString();
   });
  }
// Format Icon
var Icon = L.icon({
    iconUrl: 'icon.png',
    iconSize:     [30, 38], // size of the icon
});
   
  function addMarker() {
    $.getJSON("getData.php", function (data) {
         for (var i = 0; i < data.length; i++) {
            var location = new L.LatLng(data[i].latitude, data[i].longitude);
            var name = data[i].nama;
            var marker = L.marker([data[i].latitude, data[i].longitude], { icon : Icon}).addTo(mymap);
            marker.bindPopup(name);
         }
    })
}


</script>
</body>
</html>