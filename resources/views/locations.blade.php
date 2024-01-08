@extends('layouts.app')

@section('additional_head')
    <!-- Additional head content for this specific view goes here -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Example</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEQ_VsKZjlAbzPq4f5K1rrGB8wn02oS8w&callback=initMap" defer></script>
    <script>
        function initMap() {
            // Your map initialization code here
            var map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 42.69806, lng: 23.30861 },
                zoom: 14
            });

            // Add a marker to the map
            var marker = new google.maps.Marker({
                position: { lat: 42.69806, lng: 23.30861 },
                map: map,
                title: 'Mall of Sofia'
            });

                  // Add an info window to the marker
            var infoWindow = new google.maps.InfoWindow({
                content: '<strong>Mall of Sofia</strong><br>Address: бул А. Стамболийски 101 ниво2<br>Additional Information: 11:00 - 22:00.'
            });

            // Show the info window when the marker is clicked
            infoWindow.open(map, marker);
        }
    </script>

<style>
        body {
            background: url('https://c0.wallpaperflare.com/preview/839/412/980/food-and-drink-pizza-pizzas-tomato.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* #map {
            height: 400px;
            background: url('public/assets/img/bg-masthead.jpg') no-repeat center center fixed;
            background-size: cover;
        } */
    </style>

@endsection

@section('content')\
<!-- <div id="map" style="height: 400px;"></div> -->

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Locations</div>
                <div class="panel-body"><strong>СОФИЯ</strong><p>Mall of Sofia - бул А. Стамболийски 101 ниво2</p></div>
                <div id="map" style="height: 400px;"></div>
            </div> <!-- end panel -->
        </div>
    </div>
</div>
@endsection


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Example</title>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&callback=initMap" defer></script>
    <script>
        function initMap() {
            // Your map initialization code here
            var map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8
            });
        }
    </script>
</head>
<body>
    <div id="map" style="height: 400px;"></div>
</body>
</html> -->
