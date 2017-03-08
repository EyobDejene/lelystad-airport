/**
 * Created by EyobWesterink on 10/09/16.
 */

$(document).ready(function(){
    $('.calculate').on('click', function() {
        loadDoc();
        console.log('clik');
    });
});

function loadDoc() {

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
        if (status == 'OK') {
            var origins = response.originAddresses;
            var destinations = response.destinationAddresses;

            for (var i = 0; i < origins.length; i++) {
                var results = response.rows[i].elements;
                for (var j = 0; j < results.length; j++) {
                    var element = results[j];
                    var distance = element.distance.text;
                    var duration = element.duration.text;
                    var from = origins[i];
                    var to = destinations[j];

                    var kilometerTarief = 0;
                    var startTarief = 0;
                    var tijdTarief = 0;


                    $('select option').each(function() {
                        if ($('.car').is(':selected')){
                            kilometerTarief = 2.5;
                            startTarief = 2.97;
                            tijdTarief = 0.36;
                          }
                        else{
                            kilometerTarief = 4;
                            startTarief = 6.04;
                            tijdTarief = 0.41;
                        }
                    });

                    var distanceTotal = distance.replace(/[^0-9$.,]/g, '');
                    var priceTime = duration.replace(/[^0-9$.,]/g, '');
                    var timeTotal =  parseFloat(priceTime.replace(',','.').replace(' ',''));

                    var pricetimeTotal = timeTotal;

                    var totalprice = Math.ceil(parseFloat(distanceTotal.replace(',','.').replace(' ','')) * kilometerTarief + startTarief + pricetimeTotal);
                    var total = "€"+totalprice;

                    $('.totalDistance').html(distance);
                    $('.totalTime').html(duration);
                    $('.totalPrice').html(total);
                    console.log('dura = '+duratidistanceon);
                    console.log('Time = '+duration);
                    console.log('Price = '+total);



                    $('.totalDistance .Counter').each(function () {
                        $(this).prop('Counter',0).animate({
                            Counter: $(this).text()
                        }, {
                            duration: 4000,
                            easing: 'swing',
                            step: function (now) {
                                $(this).text(Math.ceil(now));
                            }
                        });
                    });


                }
            }
        }
    }




}





