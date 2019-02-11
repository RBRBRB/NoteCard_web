$(window).on('load' , function() {
  $(".btn-nav").on("click tap", function() {
    //$(".nav-container").toggleClass("showNav hideNav").removeClass("hidden");
    $(this).toggleClass("animated");
  });
  var check = ""
  $(".navbar-brand").on("click tap", function() {

    var checkNavSide = $("nav").attr("class")
    if(checkNavSide.indexOf("navbar-fixed-right") != -1){
      $("#noSelect").removeClass("navbar-fixed-left").toggleClass("navbar-fixed-right")
      $('div .arrow-top-l').toggleClass("arrow-top-l arrow-top-r")
      $('div .arrow-middle-l').toggleClass("arrow-middle-l arrow-middle-r")
      $('div .arrow-bottom-l').toggleClass("arrow-bottom-l arrow-bottom-r")

      if(checkNavSide.match(/showNav-l/g))
      {
        $("nav").toggleClass("showNav-l hideNav-r")
      }else if (checkNavSide.match(/hideNav-l/g)) {
        $("nav").toggleClass("hideNav-l showNav-r")
      }else {
        $("nav").toggleClass("showNav-r hideNav-r")
      }


    }else if (checkNavSide.indexOf("navbar-fixed-left") != -1) {
      $("#noSelect").removeClass("navbar-fixed-right").toggleClass("navbar-fixed-left")
      $('div .arrow-top-r').toggleClass("arrow-top-r arrow-top-l")
      $('div .arrow-middle-r').toggleClass("arrow-middle-r arrow-middle-l")
      $('div .arrow-bottom-r').toggleClass("arrow-bottom-r arrow-bottom-l")

      if(checkNavSide.match(/showNav-r/g))
      {
        $("nav").toggleClass("showNav-r hideNav-l")
      }else if (checkNavSide.match(/hideNav-r/g)) {
        $("nav").toggleClass("hideNav-r showNav-l")
      }else {
        $("nav").toggleClass("showNav-l hideNav-l")
      }



    }

    if($(this).parent().attr("id") == "select")
    {
      $(this).toggleClass("animated");
      $(this).detach().appendTo('#noSelect');

    }
    else if($(this).parent().attr("id") == "noSelect")
    {
      //alert("gg")
      $(this).toggleClass("animated");
      $(this).detach().appendTo('#select');

    }



  });


});

function moveArrow(elem){
    var checkNavSide = $("nav").attr("class")
    if(checkNavSide.indexOf("navbar-fixed-right") != -1){




    }else if (checkNavSide.indexOf("navbar-fixed-left") != -1) {


    }


}
