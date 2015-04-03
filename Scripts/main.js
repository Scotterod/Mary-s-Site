$(document).ready( function() {
     $(".submenu").hide();

    
     $(".dropper").hover(function() {
        $(this).children("ul").show();
        },
        function() {
        $(this).children("ul").hide();
        });
  });