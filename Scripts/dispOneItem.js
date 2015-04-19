$(document).ready(function() {
   var percent = document.getElementById("widthPercent").firstChild.nodeValue;
   var cssPercent = percent + '%';
   $("img.individual").css("width", cssPercent);

  });
