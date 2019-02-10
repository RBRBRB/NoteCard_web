$(window).on('load' , function() {
  $(".btn-nav").on("click tap", function() {
    //$(".nav-container").toggleClass("showNav hideNav").removeClass("hidden");
    $(this).toggleClass("animated");
  });
  $(".navbar-brand").on("click tap", function() {
	
    $("nav").toggleClass("showNav hideNav");
    $(this).toggleClass("animated");
  });
  
  
});

function moveButton(elem){
    if( $(elem).parent().attr("id") == "noSelect" ){
        $(elem).detach().appendTo('#select');
    }
    else{
        $(elem).detach().appendTo('#noSelect'); 
    }
}