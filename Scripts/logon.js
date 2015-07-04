$(document).ready(function() {

   $("#button").click(function() {
   var strtmp = " ";
   strtmp = $("#nameInput").val();
   if (strtmp.search("'") > 0) {
       alert("username may not contain quotes");
       };
   if (strtmp.search(/\\/) > 0) {
       alert("username may not contain backslashes");
       };    
   });

   
   var tmp = $("#logonError").text();
   if (tmp === "Bad username") {
      $("#userMessage").removeClass("errorMessage");
      $("#userMessage").addClass("showError");

   };
   if (tmp === "Bad password") {
      $("#passwordMessage").removeClass("errorMessage");
      $("#passwordMessage").addClass("showError");   

   };  
   if (tmp === "Not paid") {
      $("#userMessage").removeClass("errorMessage");
      $("#userMessage").addClass("showError");
      $("#userMessage").text("Please contact Mary to pay for your subscription");

   };
});