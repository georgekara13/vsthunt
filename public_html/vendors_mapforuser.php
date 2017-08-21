<?php
include_once 'includes/db_connect.php';
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
//sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

?>



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href='//fonts.googleapis.com/css?family=Covered By Your Grace' rel='stylesheet'>
        <link href='//fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
        <link rel="shortcut icon" type="image/png" href="img/favicon-16x16.png">
        <link href='//fonts.googleapis.com/css?family=Audiowide' rel='stylesheet'>
        <link href='//fonts.googleapis.com/css?family=Carme' rel='stylesheet'>
        <title>VST hunt</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/mycss.css">
        <script src="https://use.fontawesome.com/64340464e8.js"></script>
         <!--<script src="js/jquery/jquery.js"></script>-->
        <script src="http://code.jquery.com/jquery.js"></script>
        <!--<script src="js/bootstrap.js"></script>-->
        <script src="js/bootstrap.min.js"></script>
        
        <style>
            #map {
             height: 400px;
             width: 100%;
            }
        </style>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>
    <body>
         <!--modal window gia to user panel me ta stoixeia tou,stats klp-->
        <div class="modal fade hide" id="usercontrolpanel"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <!-- gia melontikh epektash,kanoniko profile,me profile picture,emfanish olwn twn posts tou xrhsth,epiloges gia customisation-->  
                        <h5 class="modal-title" id="exampleModalLabel" align="center">User panel</h5>
                      </div>
                    <form style="margin-bottom: 0px; padding-bottom: 0px;" method="post" action="includes/logout.php">  
                      <div class="modal-body">
                         
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></span>
                                                                               
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></span>&nbsp;
                                       
                                    </div>
                                    

                                
                           
                            <!--</form>-->
                      </div>
                      <!--<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" >Log in</button>
                      </div>-->
                    </form>
                    </div>
                  </div>
        </div>
   
        <!-- h navbar-->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
              <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <a class="brand brand-font" href="#">VST hunt</a>
                <div class="nav-collapse">
                  <ul class="nav">
                    <li class="divider-vertical"></li>
                    <li><a href="indexforuser.php">Index</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="plugin_listforuser.php">Browse plugins</a></li>
                    <li class="divider-vertical"></li>
                    <li class="active"><a href="vendors_mapforuser.php">Vendors map</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="contact_formforuser.php">Contact me</a></li>
                    <li class="divider-vertical"></li>
                  </ul>  
                  <ul class="nav pull-right">
                      
                    <li><button type="button" class="btn" data-toggle="modal" data-target="#usercontrolpanel"><i class="fa fa-home" aria-hidden="true"></i>Welcome User</button></li>
                    <li class="divider-vertical"></li>
                    <form style="float: right; margin-bottom: 0px; padding-bottom: 0px;" method="post" action="includes/logout.php">  
                      <li><button type="submit" name="signout" id="signout"  class="btn"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign out</button></li>
                    </form>   
                  </ul>                    
                </div>
              </div>
            </div>
        </div>
  
        
        <div class="wholepage-border">
            <div class="hero-unit">
                <h1>Vendors map</h1><br>
                 <div id="map"></div>
                <script>
                    
                    var map,infoWindow;
					
					
					function initialize() {
						
						
						map = new google.maps.Map(document.getElementById('map'), {
							center: {lat: -34.397, lng: 150.644},
							zoom: 14
						});
						infoWindow = new google.maps.InfoWindow;
						//map = new google.maps.Map(document.getElementById("map"), mapProp);
						if (navigator.geolocation) {
							navigator.geolocation.getCurrentPosition(function(position) {
							  var pos = {
								lat: position.coords.latitude,
								lng: position.coords.longitude
							  };

							  infoWindow.setPosition(pos);
							  infoWindow.setContent('Location found.');
							  infoWindow.open(map);
							  map.setCenter(pos);
							}, function() {
							  handleLocationError(true, infoWindow, map.getCenter());
							});
						} else {
							// Browser doesn't support Geolocation
							handleLocationError(false, infoWindow, map.getCenter());
						}
						
						//travaw to encoded json markers array apto markertoJSON.php 
						$.getJSON("includes/markertoJSON.php", function(json1) {
						
							$.each(json1.markers, function (key, data) {

								var latLng = new google.maps.LatLng(data.lat, data.lng);
								if(data.type=="Digital Synth retailer"){
									var marker = new google.maps.Marker({
										position: latLng,
										map: map,
										//icons[data.type].icon
										icon: "img/DSR.png",
										title: data.name
									});
								}else{
									var marker = new google.maps.Marker({
										position: latLng,
										map: map,
										//icons[data.type].icon
										icon: "img/MER.png",
										title: data.name
									});
								}	
								
								(function (marker, data) {
									google.maps.event.addListener(marker, "click", function (e) {
										
										infoWindow.setContent("<center>" + "<u>" + data.name + "</u>" +"</center>" +"<br/>" + "<ul>" + "<li>" + "Address: " + data.address + "</li>" + "<br/>" +"<li>" + "Type: " + data.type +"</li>" + "</ul>");
										infoWindow.open(map, marker);
									});
								})(marker, data);
								

							});
						});
					}
					
					
					function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                      infoWindow.setPosition(pos);
                      infoWindow.setContent(browserHasGeolocation ?
                                            'Error: The Geolocation service failed.' :
                                            'Error: Your browser doesn\'t support geolocation.');
                      infoWindow.open(map);
                    }
					google.maps.event.addDomListener(window, 'load', initialize);
                </script>
                
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1yw9fui28CFi1vRsX78bWSeTNPIFHjPU&callback=initialize"></script>
            </div>
        </div>   
        <div class="site-bottom"><i class="fa fa-creative-commons fa-lg" aria-hidden="true"></i> 2017 made by Gorj 2025201200041.</div>
    </body>   
</html>
