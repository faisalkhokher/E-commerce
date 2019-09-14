@extends('layouts.app')

@section('content')
    


<h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
   


@endsection


@section('script')
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7W_kJbWD8dTi0-dtf3UC41MTF60B_vBo&callback=initMap">
</script>


       <script>
function initMap() {
	var mapOptions = {
		zoom: 18,
		center: new google.maps.LatLng(    31.572878, 74.411557),
		mapTypeId: 'roadmap'
	};
	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var goldenGatePosition = {lat:  31.572878,lng: 74.411557};
	var marker = new google.maps.Marker({
			position: goldenGatePosition,
			map: map,
			title: 'Faisal Khokher Home'
			});

}
</script>
        <!--Load the API from the specified URL
        * The async attribute allows the browser to render the page while the API loads
        * The key parameter will contain your own API key (which is not needed for this tutorial)
        * The callback parameter executes the initMap() function
        -->
    
@endsection
   