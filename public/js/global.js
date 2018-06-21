$(function() {
    $("a.fancy").fancybox({
        'zoomSpeedIn': 300,
        'zoomSpeedOut': 300,
        'overlayShow': false
    });
});
$( document ).ready(function() {
    console.log( "ready!" );
});
$( function() {
    $( "#datepicker" ).datepicker();
    } );