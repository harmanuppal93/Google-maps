<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCT3LrxhJfarDjN89SYBI1fMrUMNbc038&callback=initMap">
</script><script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<style>
.map-section span {
    float: right;
    color: red;
    cursor: pointer;
}
</style>
<div class="container">
<h3>Select location</h3>
<select id="select-loc" class="form-control">
	<option value=''>Select location</option>
	<option value='2'>Chipotle on Sheridan </option>
	<option value='0'>Chipotle on Broadway </option>
	<option value='1'>Chipotle on Belmont </option>	
</select>

<div class="wbc-view-ggogle-map"></div>

<div class="map-section" style="display:none; width: 100%;"><span onclick="close_map();">X</span><div id="googlemap" style="width: 100%; height: 400px;"></div>

</div>
</div>
<script type="text/javascript">


$("#select-loc"). change(function(){
	$(".map-section").hide();
var location_val = $(this). children("option:selected"). val();
var location_text = $(this). children("option:selected"). text();
myClick(location_val);
if(location_val != ""){
var html = "<br><button class='btn btn-primary' onclick='show_map();'>View "+location_text+" on google map</button><br>";
$(".wbc-view-ggogle-map").html(html);
}
else{
	$(".wbc-view-ggogle-map").html("");
}

});
        var markers = [];
		function initialize() {

			var mapOptions = {
				zoom: 12,
				center: new google.maps.LatLng(41.976816, -87.659916),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
			}


			var map = new google.maps.Map(document.getElementById("googlemap"), mapOptions);


		var broadway = {info:'<strong>Chipotle on Broadway</strong><br>\5224 N Broadway St<br> Chicago, IL 60640<br>\<a href="https://goo.gl/maps/jKNEDz4SyyH2">Get Directions</a>',lat: 41.976816,long: -87.659916,}

		var belmont = {	info:'<strong>Chipotle on Belmont</strong><br>\1025 W Belmont Ave<br> Chicago, IL 60657<br>\<a href="https://goo.gl/maps/PHfsWTvgKa92">Get Directions</a>',lat: 41.93967,long: -87.655167,	}

		var sheridan = {info:'<strong>Chipotle on Sheridan</strong><br>\r\6600 N Sheridan Rd<br> Chicago, IL 60626<br>\<a href="https://goo.gl/maps/QGUrqZPsYp92">Get Directions</a>',lat: 42.002707,long: -87.661236,}

		var locations = [[broadway.info, broadway.lat, broadway.long, 0],[belmont.info, belmont.lat, belmont.long, 1],[sheridan.info, sheridan.lat, sheridan.long, 2],]


		var marker, i;
		var infowindow = new google.maps.InfoWindow();


		google.maps.event.addListener(map, 'click', function() {
		infowindow.close();
		});


		for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
		position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		map: map,
		icon: locations[i][3]
		});

		google.maps.event.addListener(marker, 'click', (function(marker, i) {
		return function() {
		infowindow.setContent(locations[i][0]);
		infowindow.open(map, marker);
		}
		})(marker, i));

		markers.push(marker);
		}

		}
        google.maps.event.addDomListener(window, 'load', initialize);
        
        function myClick(id){
            google.maps.event.trigger(markers[id], 'click');
        }
		function show_map(){
            $(".map-section").show();
        }
		function close_map(){
            $(".map-section").hide();
        }
		
		
</script>

