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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">



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

        autocomplete_location.getPlace();
        autocomplete_destination.getPlace();
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
    }



    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.

        autocomplete_location = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete_location')),
            {types: ['geocode']});


        autocomplete_destination = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete_destination')),
            {types: ['geocode']});

        autocomplete_location.setComponentRestrictions({'country': ['nl']});
        autocomplete_destination.setComponentRestrictions({'country': ['nl']});
        // When the user selects an address from the dropdown, populate the address
        // fields in the form.

        autocomplete_location.addListener('place_changed', fillInAddress);
        autocomplete_destination.addListener('place_changed', fillInAddress);


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


        <div class="row">
            <div class="col-md-12">
                <div class="social bounceIn animated">
                    <div class="facebook"></div>
                    <div class="whatsapp"></div>
                </div>
                <div class="jumbotron vertical-center">
                     <div class="col-md-10">
                         <div class="title text-center fadeInDown animated">
                             <h3>Taxi<br> Lelystad <br> Airport</h3>
                         </div>

                         <form class="fadeIn animated">
                             <div class="form-group">
                                 <div class="input-group mb-2 mr-sm-2 mb-sm-0wn ">
                                     <div class="input-group-addon"><i class="fa fa-crosshairs" aria-hidden="true"></i></div>
                                     <input type="text" name="location" class="form-control location required"
                                            id="autocomplete_location"
                                            placeholder="Kies vertrek punt"  value="">
                                 </div>

                                 <div class="form-group">
                                     <div class="input-group mb-2 mr-sm-2 mb-sm-0wn ">
                                         <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                         <input type="text" name="location" class="form-control destenation required"
                                         id="autocomplete_destination"
                                                placeholder="Kies bestemming"  value="">
                                     </div>

                                     <div class="form-group">
                                         <div class="input-group mb-2 mr-sm-2 mb-sm-0wn ">
                                            <div class="input-group-addon"><i class="fa fa-users"aria-hidden="true">&nbsp;&nbsp;</i></div>
<!--                                             <select name="location" class="form-control mb-2 mr-sm-2 mb-sm-0 option selectpicker-->
<!--                                             "id="quanty">-->
<!--                                                 <option selected >Aantal personen</option>-->
<!--                                                 <option name="count[]" value="1">1 - 4</option>-->
<!--                                                 <option name="count[]" value="2">5 - 8</option>-->
<!--                                             </select>-->

                                             <div class="dropdown">
                                                 <div class="dropdown-toggle quanty" data-drive="" id="drop4"
                                                       role="button"data-toggle="dropdown" href="#" >
                                                <input readonly class="persons" data-drive="car" value=""
                                                       placeholder="Aantal personen">
                                                     <b class="caret"></b></div> <!--Here-->
                                                 <!-- Link or button to toggle dropdown -->
                                                 <ul class="dropdown-menu absolute" role="menu"
                                                     aria-labelledby="dLabel" >
                                                     <li><a tabindex="-1" data-person="1 - 4" data-drive="car">1 - 4</a></li>
                                                     <li><a tabindex="-1" data-person="5 - 8" data-drive="bus">5 - 8</a></li>

                                                 </ul>
                                             </div>

<!--                                             <div class="input-group-addon nocolor"><i class="fa-->
<!--                                             fa-caret-down" aria-hidden="true"></i></div>-->
                                     </div>
                                     </div>
                             </div>
                         </form>
                     </div> <!-- indicator -->
                    <div class="row  vertical-center-payoff fadeIn animated">
                            <div class="text-center col-md-4 col-sm-4 col-4">
                                        <div class="img distance"></div>
                                        <div class="totalDistance"><span class="totalDistance-count">0</span> KM</div>
                            </div>
                            <div class="text-center col-md-4 col-sm-4 col-4">
                                    <div class="img time"></div>
                                    <div class="totalTime"><span class="totalTime-count">0</span> MIN</div>
                            </div>
                            <div class=" text-center col-md-4 col-sm-4 col-4">
                                    <div class="img pay"></div>
                                    <div class="totalPrice">€ <span class="totalPrice-count">0</span></div>
                            </div>
                        </div>
                    <!-- end indicator -->
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary button calculate">Route berekenen
                                </button>
                                <button href="tel:555-555-5555" type="button" class="btn btn-primary reserveer">taxi Reserveren</button>
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
                <div class="title-cop"><h2>Lelystad-Airport</h2></div>
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
    <div class="row section3">

        <div class="col-lg-4 col-md-9 col-8 col-sm-8 drivers">
            <div class="quoute quoute1">
                <p>
                    “Lorem ipsum dolor sit atur. Excepteur sint occae”
                </p>
                <div class="driver">
                    <span class="name"><p>Meloudi Zaki</p></span>
                    <span class="function"><p>Taxi driver</p></span>
                </div>
               </div>

            </div>
        <div class="col-lg-2 col-md-3 col-4 col-sm-3 drivers">
            <div class="person1"></div>
        </div>

        <!-- Add the extra clearfix for only the required viewport -->
        <div class="clearfix hidden-sm-up"></div>
        <div class="col-lg-2 col-md-3 col-4 col-sm-3 drivers">
            <div class="person2"></div>
        </div>
        <div class="col-lg-4 col-md-9 col-8 col-sm-8 drivers">
            <div class="quoute quoute2">
                <p>
                    “Lorem ipsum dolor sit atur. Excepteur sint occae”
                </p>
                <div class="driver">
                    <span class="name"><p>Meloudi Zaki</p></span>
                    <span class="function"><p>Taxi driver</p></span>
                </div>
            </div>

        </div>

        </div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.counterup.js"></script>
<script type="text/javascript" src="/assets/js/jquery.counterup.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqut4oPHakxngbilRwB52oadxSNlbB3fg&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>