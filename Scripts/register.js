$(document).ready( function() {
     $(".submenu").hide();
          
     if ($("#dbresult").text().length > 8) {
         alert($("#dbresult").text());
         $("#button").focus();
         }

     $(".dropper").hover(function() {
        $(this).children("ul").show();
        },
        function() {
        $(this).children("ul").hide();
        });


   $("form").on("submit", function(evt) {
      $("#fnameError").text("*");
      $("#lnameError").text("*");
      $("#emailError").text(" ");
      $("#phoneError").text(" ");
      $("#userMessage").text(" ");  
      $("#passwordMessage").text(" ");

      if (/[^a-zA-Z ,.'-]/.test($("#fnameInput").val())) {
         $("#fnameError").text("invalid character in name");
         $("#fnameInput").focus();
         evt.preventDefault();
         }
      else if (/[^a-zA-Z ,.'-]/.test($("#lnameInput").val())) {
           $("#lnameError").text("invalid character in name");
           $("#lnameInput").focus();
           evt.preventDefault();
         }
      else if (/[^a-zA-Z0-9!@#$%^&*._?-]/.test($("#emailInput").val())) {
           $("#emailError").text("invalid character in email address");
           $("#emailInput").focus();
           evt.preventDefault();
         }      
      else if (/[;\']/.test($("#phoneInput").val())) {
           $("#phoneError").text("invalid character in phone number");
           $("#phoneInput").focus();
           evt.preventDefault();
         }
      else if (/[^a-zA-Z0-9!@#$%^&*._?-]/.test($("#unameInput").val())) {
           $("#userMessage").text("invalid character in username");
           $("#userMessage").focus();
           evt.preventDefault();
         }         
      else if (/[^a-zA-Z0-9!@#$%^&*._?-]/.test($("#passwordInput").val())) {
           $("#passwordMessage").text("invalid character in password");
           $("#passwordMessage").focus();
           evt.preventDefault();
         }         
   });

   
});