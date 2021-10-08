jQuery(document).ready(function($){
 
/* toggle nav */
$(".toggle-nav").on("click", function(){
$(".main-menu-nav").slideToggle();
$(this).toggleClass("active");
});
 
});