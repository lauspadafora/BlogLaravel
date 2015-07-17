@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h3>Bienvenido a Mi blog en Laravel!</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae debitis nobis, quod sapiente qui voluptatum, placeat magni repudiandae accusantium fugit quas labore non rerum possimus, corrupti enim modi! Et.</p>
        </div>
    </div>     
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    		<div id="map-canvas" style="width: 700px; height: 400px;"></div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="{{ asset('js/gmaps.js') }}"></script>
    <script>
        var map = new GMaps({
            el: '#map-canvas',
            lat: -12.043333,
            lng: -77.028333
        });

        GMaps.geolocate({
            success: function(position) {
            map.setCenter(position.coords.latitude, position.coords.longitude);
        },
        error: function(error) {
            alert('Geolocation failed: '+ error.message);
        },
        not_supported: function() {
            alert("Your browser does not support geolocation");
        }});

        var path = [];
        $.ajax("users/getLocations/",{}).done(function(data){
            if (data.length > 0){
                for(idx in data) {
                    var loc = data[idx]; 
                    var point = [loc['x_location'], loc['y_location']]
                    path.push(point)                    
                    map.addMarker({
                        lat: loc['x_location'],
                        lng: loc['y_location'],
                        title: loc['name']
                    });
                }

                map.drawPolyline({
                    path: path,
                    strokeColor: '#131540',
                    strokeOpacity: 0.6,
                    strokeWeight: 6
                });
            }
        });



    </script>
@endsection