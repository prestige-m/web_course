/*
$(document).ready(
  function() {
    $("add-to-cart").click(function() {
         var id = $(this).attr("data-id");
         $.post("url", {}, function(data) {
            $("#cart-count").html(data);
         });
    });
  });
*/


  // $(document).ready(
  //   function() {
  //     $("add-to-cart").click(function() {
  //          console.log($(this).attr("class"));
  //     });
  //   });

$(document).ready(function(){
  $(".add-to-cart").click(function() {
     $(this).toggleClass('btn-primary btn-default');

     if ($(this).hasClass("btn-default")) {
       $(this).children("#button-text").text(" Читати");
     } else {
       $(this).children("#button-text").text(" Не читати");
     }
     let id = $(this).attr("data-id");
     $.post("/cart/addAjax/"+id, {}, function (data) {
         $("#cart-count").html(data);
     });
     return false;
  });
});
