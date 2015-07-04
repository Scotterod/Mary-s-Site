$(document).ready( function() {
     $(".submenu").hide();
    
     $(".dropper").hover(function() {
        $(this).children("ul").show();
        },
        function() {
        $(this).children("ul").hide();
        });


   //this moves the table of contents around when internal links are clicked
    $("aside a").click (function() {
   // get the id of the table entry that is at the right height
      id=$(this).attr("href");
      var tdOffset = $(id).offset().top;
      var asideHeight = $("aside").height();
      var articleHeight = $("article").height();
      if ((tdOffset + asideHeight) <= articleHeight) {
          asideOffset = tdOffset;}
      else {
          asideOffset = articleHeight - asideHeight;}
      $("aside").css("top", asideOffset);
   });         
        
  //this watches where you scroll and jumps the table of contents back to you if you scroll too far away
     $("td br").parent().parent().mouseenter (function() {
       var brOffset = $(this).offset().top;
       var asideHeight = $("aside").height();
       var articleHeight = $("article").height();
       if ((brOffset + asideHeight) <= articleHeight) {
          asideOffset = brOffset;}
       else {
          asideOffset = articleHeight - asideHeight;}
       $("aside").css("top", asideOffset);
     });      
        
  //this pops up a new window to see the one item in larger zoom     
     $("td > a").click(function() {
        var popURL = $(this).attr("href");
        window.open(popURL, "_blank", "resizable=yes, top=50, left=50, width=1400, height=700");
        });
        
     
  });
  