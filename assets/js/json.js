/**
 * Created by EyobWesterink on 10/09/16.
 */

$(document).ready(function(){
    $('.calculate').on('click', function() {
        loadDoc();
        console.log('clik');
    });

    $('#autocomplete_location,#autocomplete_destination,.quanty').on('click', function() {
    $('.calculate').show();
    $('.reserveer').hide();
    });

    $('.dropdown-menu li').on('click', function() {
        var persons = $(this).find('a').attr('data-person');
        var drive = $(this).find('a').attr('data-drive');
        $('.quanty').attr('data-drive',drive);
        $('.persons').attr('value',persons);
    });

});

function loadDoc() {
    var isFormValid = true;
    $(".required").each(function () {

        if ($.trim($(this).val()).length == 0) {
            $(this).addClass("highlight");
            isFormValid = false;
        }
        else {
            $(this).removeClass("highlight");
        }
    });

    if ($('.persons').val()  == "") {
        $('.persons').parent().addClass("highlight");
        isFormValid = false;
    }else{
        $('.persons').parent().removeClass("highlight");
    }

    var location = $(".location").val();
    var dest = $(".destenation").val();

    var origin1 = location;
    var destinationA = dest;

    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix(
        {
            origins: [origin1],
            destinations: [destinationA],
            travelMode: 'DRIVING',
            drivingOptions: {
                departureTime: new Date(Date.now()),  // for the time N milliseconds from now.
                trafficModel: 'optimistic'
            },

        }, callback);

    function callback(response, status) {



        if (status == 'OK' && isFormValid) {
            var origins = response.originAddresses;
            var destinations = response.destinationAddresses;

            for (var i = 0; i < origins.length; i++) {
                var results = response.rows[i].elements;
                for (var j = 0; j < results.length; j++) {
                    var element = results[j];
                    var distance = element.distance.value;
                    var duration = element.duration.value;
                    var from = origins[i];
                    var to = destinations[j];

                    var kilometerTarief = 0;
                    var startTarief = 0;
                    var tijdTarief = 0;
                    var drive = $('.quanty').attr('data-drive');

                    console.log(drive);
                    if (drive == 'car') {
                        kilometerTarief = 1.40;
                        startTarief = 3;
                    }else{
                        kilometerTarief = 1.15;
                        startTarief = 3;
                    }


                    var location = origins[0]; // the string to check against
                    var destination = destinations[0]; // the string to check against
                    var substrings = ['schiphol', 'Airport Schiphol', 'Amsterdam Airport Schiphol'],
                        length = substrings.length;
                    while (length--) {
                        if (destination.indexOf(substrings[length]) != -1) {
                            kilometerTarief = 1;
                            startTarief = 0;
                        }

                        if (location.indexOf(substrings[length]) != -1) {
                            kilometerTarief = 1;
                            startTarief = 0;
                        }
                    }



                    var distanceTotal = Math.round( distance/1000 * 10 ) / 10;
                    //var priceTime = duration;//.replace(/[^0-9$.,]/g, '');
                    var druationToal =  Math.ceil(duration/60);


                    var totalprice = distanceTotal * kilometerTarief + startTarief;
                    var total =  totalprice;
                    total = total.toFixed(2);
                    var price = total;



                    $('.totalDistance-count').html(distanceTotal);
                    $('.totalTime-count').html(druationToal);
                    $('.totalPrice-count').html(price);

                    $('.totalDistance-count,.totalPrice-count,.totalTime-count').counterUp({
                        delay: 10,
                        time: 1000,
                        offset: 70,
                        beginAt: 100,
                    });

                        $('.calculate').hide();
                        $('.reserveer').show();



                }
            }
        }
    }




}





