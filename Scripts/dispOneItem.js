$(document).ready(function() {
   var percent = document.getElementById("widthPercent").firstChild.nodeValue;
   var cssPercent = percent + '%';
   console.log(percent + ' ' + cssPercent);
   $("img.individual").css("width", cssPercent);

  });
