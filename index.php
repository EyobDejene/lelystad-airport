<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lelystad-Airport</title>
</head>

<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<meta name="Keywords" content="Taxi"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link type="text/css" rel="stylesheet" href="/assets/css/style.css">
<link type="text/css" rel="stylesheet" href="/assets/css/animate.css">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script type="text/javascript" src="/assets/js/lelystad-airport.js"></script>



<body>
<script type="text/javascript">

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'nl',
        postal_code: 'short_name'

    };



    function fillInAddress() {
        autocomplete.getPlace();
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
    }



    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete_location')),
            {types: ['geocode']});


        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete_destination')),
            {types: ['geocode']});
        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.setComponentRestrictions({'country': ['nl']});
        autocomplete.addListener('place_changed', fillInAddress);

    }

    if (navigator.geolocation) {
        // Use method getCurrentPosition to get coordinates
        navigator.geolocation.getCurrentPosition(function (position) {
            // Access them accordingly
            console.log(position.coords.latitude + ", " + position.coords.longitude);
            var geocoder  = new google.maps.Geocoder();             // create a geocoder object
            var location  = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);    // turn coordinates into an object
            geocoder.geocode({'latLng': location}, function (results, status) {
                if(status == google.maps.GeocoderStatus.OK) {           // if geocode success
                    var add=results[0].formatted_address;         // if address found, pass to processing function
                    $(".location").val(add);
                }
            });
        });
    }





</script>
<!-- start first section -->
<!--<div class="container-fluid">-->
<!--    <video id="bgvid" playsinline autoplay muted loop>-->
<!--        <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<!--        <source src="/assets/video/taxiClip.mp4" type="video/mp4">-->
<!--    </video>-->
<!--</div>-->

<div class="background">
    <div class="black"></div>
    <div class="container">


        <div class="row" >
            <div class="col-md-12">
                <div class="jumbotron vertical-center">
                     <div class="col-md-8">
                         <div class="title text-center fadeInDownBig animated">
                             <h3>Taxi Lelystad-Airport</h3>
                         </div>

                         <form class="fadeInUp animated">
                             <div class="form-group">
                                 <div class="input-group mb-2 mr-sm-2 mb-sm-0wn ">
                                     <div class="input-group-addon"><i class="fa fa-crosshairs" aria-hidden="true"></i></div>
                                     <input type="text" name="location" class="form-control location"
                                            id="autocomplete_location"
                                            placeholder="Kies vertrek punt"  value="">
                                 </div>

                                 <div class="form-group">
                                     <div class="input-group mb-2 mr-sm-2 mb-sm-0wn ">
                                         <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                         <input type="text" name="location" class="form-control destenation"
                                         id="autocomplete_destination"
                                                placeholder="Kies bestemming"  value="">
                                     </div>

                                     <div class="form-group">
                                         <div class="input-group mb-2 mr-sm-2 mb-sm-0wn ">
                                            <div class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                             <select name="location" class="form-control mb-2 mr-sm-2 mb-sm-0 option"id="">
                                                 <option selected >Aantal personen</option>
                                                 <option name="count[]" value="1">1 - 4</option>
                                                 <option name="count[]" value="2">5 - 8</option>
                                             </select>
                                             <div class="input-group-addon nocolor"><i class="fa
                                             fa-caret-down" aria-hidden="true"></i></div>
                                     </div>
                                     </div>
                             </div>
                         </form>
                     </div> <!-- indicator -->
                    <div class="row indicator">
                            <div class="col-md-4">
                                    <div class="text-center">
                                        <div class="img distance"></div>
                                        <div class="totalDistance count">0 KM</div>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="img time"></div>
                                    <div class="totalTime">0 MIN</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="img pay"></div>
                                    <div class="totalPrice">€ 0</div>
                                </div>
                            </div>
                        </div>
                    <!-- end indicator -->
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary button calculate">Route bereken </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>
</div>
<div class="container">
    <div class="section2">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="text-center">
                <div class="title-cop"><h2>Taxi Lelystad-Airport</h2></div>
                <div class="divider"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="text-center block">
                <h2>Vervoer</h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center block">
                <h2>Betaalwijzen</h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center block">
                <h2>Contact</h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                </p>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
           <div class="quoute">
               <p>
                   “ Lorem ipsum dolor sit atur. Excepteur sint occae dsadsafsgfsgdgfgfgfd”
               </p>
           </div>
        </div>
        <div class="col-md-6">
            sdsd
        </div>
    </div>
</div>

<div class="footer">
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                <button type="button" class="btn btn-secondary button contact">contact opnemen</button>
        </div>
        
    </div>
</div>
   <div class="skyline">
       <div class="img"></div>
   </div>
</div>


<!-- end first section -->
<script type="text/javascript" src="/assets/js/json.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqut4oPHakxngbilRwB52oadxSNlbB3fg&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>