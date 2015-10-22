/**
 * Created by POSCO_ICT_HAILONG on 9/9/2015.
 */
tjq(document).ready(function() {
    tjq("#price-range").slider({
        range: true,
        min: 0,
        max: 2000,
        values: [ 100, 2000 ],
        slide: function( event, ui ) {
            tjq(".min-price-label").html( "$" + ui.values[ 0 ]);
            tjq(".max-price-label").html( "$" + ui.values[ 1 ]);
            $("#min_price").val( ui.values[ 0 ]);
            $("#max_price").val( ui.values[ 1 ]);
        }
    });
    tjq(".min-price-label").html( "$" + tjq("#price-range").slider( "values", 0 ));
    tjq(".max-price-label").html( "$" + tjq("#price-range").slider( "values", 1 ));

    tjq("#rating").slider({
        range: "min",
        value: 40,
        min: 0,
        max: 50,
        slide: function( event, ui ) {

        }
    });
    tjq('.revolution-slider').revolution(
        {
            dottedOverlay:"none",
            delay:8000,
            startwidth:1170,
            startheight:646,
            onHoverStop:"on",
            hideThumbs:10,
            fullWidth:"on",
            forceFullWidth:"on",
            navigationType:"none",
            shadow:0,
            spinner:"spinner4",
            hideTimerBar:"on"
        });
});