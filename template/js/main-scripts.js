
$(document).ready(function(){
  $(".list-group-item-action").hover(function() {
      $(this).addClass("active")
  });
  $(".list-group-item-action").mouseleave(function() {
      $(this).removeClass("active")
  });
});



$(window).load(function() {
 $("#deleteModal").modal('show');
  // $("#delete-btn").on('click', function () {
  //
  // });
});

$(".add-to-cart").click(function() {
   $(this).toggleClass('btn-primary btn-secondary');

   if ($(this).hasClass("btn-secondary")) {
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
