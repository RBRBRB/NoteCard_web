<!DOCTYPE html>
<html>
  <head>

    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    @include('CardBoard.fullnav')

     <link rel="stylesheet" href="{{asset('css/CardBoard/review.css')}}">
     <link rel="stylesheet" href="{{asset('css/CardBoard/flip.css')}}">

    <!-- Important Owl stylesheet -->
    <link href="https://cdn.bootcss.com/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Default Theme -->
    <link href="https://cdn.bootcss.com/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">

    <!--  jQuery 1.7+  -->


    <!-- Include js plugin -->
    <script src="https://cdn.bootcss.com/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  </head>
  <body>

    <div class="owl-carousel owl-theme" id="owl">
      @foreach($contents as $content)
      <div class="cardbox">
        <div class="card">

          @if(count($content->detail) > 0)
            <div class="front"><img src="https://img.icons8.com/ios/50/000000/about.png" class="flipmark_f">{!!$content->front!!}</div>
            <div class="back"><img src="https://img.icons8.com/cotton/50/000000/circled-left-2.png" class="flipmark_b">{!!$content->detail!!}</div>
          @else
            <div class="front">{!!$content->front!!}</div>
          @endif
        </div>
      </div>
      @endforeach
    </div>
    <div id="filmStrip">
      <ul id="filmnav">


      </ul>
    </div>
  </body>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel({
          items:1,
          margin:10,
          autoHeight:true
      });

      var timeout ;
      var startPos = {};//开始位置
      var startPosFast = {};
      var endPos = {};//结束位置
      var endPostFast = {};
      var scrollDirection;//滚动方向

      var timr;//定时器，后面控制速度会使用
      var touch;//记录触碰节点
      var touchFast;


      /*
      $('.owl-carousel').ontouchstart(function() {

              alert("touch");

      });


      $('.owl-carousel').ontouchend(function() {
          clearTimeout(timeout);

      });
      $('.owl-carousel').ontouchcancel(function() {
          clearTimeout(timeout);

      });*/
      /*
      var box = document.getElementById("owl");
      box.addEventListener("touchstart" , function(e){
        alert("touch");
        e.preventDefault();
      });*/
      $('#filmStrip').on('touchstart' , function(event){

        //$('#filmStrip').fadeTo("fast" , 0.8);
        //$('#filmStrip').css({"box-shadow": "3px 3px 5px #D4DBD4"})
        $('#filmStrip').fadeTo("slow" , 0.8);
        touch = event.targetTouches[0];//取得第一个touch的坐标值
        startPos = {x:touch.pageX,y:touch.pageY}
        scrollDirection = 0;
      })

      $('.card').on('touchstart' , function(event){
        $('#filmStrip').fadeTo("slow" , 0.15);
        //console.log($(this).find('.back').length);
        touchFast = event.targetTouches[0];
        startPosFast = {x:touchFast.pageX,y:touchFast.pageY}
        scrollDirectionFast = 0;

        $this = $(this); //very important
        if($(this).find('.back').length == 1)
        {
          timeout = setTimeout(function() {
            $this.toggleClass('flipped');

            }, 600);
        }
      });


      var oInp = document.getElementById("filmStrip");
      $('#filmStrip').on('touchmove' , function(event){
        //$('#filmStrip').fadeTo("fast" , 0.8);
        //oInp.innerHTML = "<br>Touch moved (" + e.touches[0].clientX + "," + e.touches[0].clientY + ")";
        if(event.targetTouches.length > 1){
            return
        }

        touch = event.targetTouches[0];
        endPos = {x:touch.pageX,y:touch.pageY}
        // 判断出滑动方向，向右为1，向左为-1
        scrollDirection = touch.pageX-startPos.x > 0 ? 1 : -1;
        //oInp.innerHTML = "<h1>Direction: "+scrollDirection+"</h1>"
        if(scrollDirection == -1)
        {
            $('.owl-carousel').trigger('next.owl.carousel' , [10]);
        }
        else if(scrollDirection == 1){
           $('.owl-carousel').trigger('prev.owl.carousel', [10]);
        }else {

        }

      });


      var up = 0;

      $('.card').on('touchmove' , function(event){

        //$('#filmStrip').fadeTo("slow" , 0.15);
        if(event.targetTouches.length > 1){
            return
        }
        touchFast = event.targetTouches[0];
        endPostFast = {x:touchFast.pageX,y:touchFast.pageY}
        //scrollDirectionFast = touchFast.pageY-startPosFast.y > 20 ? 1 : -1;
        if (touchFast.pageY-startPosFast.y > 200) {
          //alert("yoyo")
          if(up == 0)
          {
            //alert("inini")
            //$('#filmStrip').removeAttr( 'style' );
            //$('#filmStrip').fadeTo("fast" , 0.8);


            up = 1;
          }


          clearTimeout(timeout);
        }


      })

      //t2.reverse();
      $('.card').on('touchend' , function(){
        //t2.reversed(!t2.reversed());
        clearTimeout(timeout);
      });

      $("#filmStrip").on('touchend' , function(){
        //alert("up")

        //up = 0;


      })




      /*
      $('#owl').on('touchcancel' , function(){
        clearTimeout(timeout);
      });*/


  });
  </script>
</html>
