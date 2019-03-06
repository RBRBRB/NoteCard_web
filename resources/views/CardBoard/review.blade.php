<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
          <div class="front">{!!$content->front!!}</div>
          @if(count($content->detail) > 0)
            <div class="back">{!!$content->detail!!}</div>
          @endif
        </div>
      </div>
      @endforeach
    </div>
    <div id="test" style="height: 300px;width: 1000px; background: #ff0;">

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
      var endPos = {};//结束位置
      var scrollDirection;//滚动方向
      var timr;//定时器，后面控制速度会使用
      var touch;//记录触碰节点
      var index = 0;//记录滑动到第几张图片

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
      $('#test').on('touchstart' , function(event){
        touch = event.targetTouches[0];//取得第一个touch的坐标值
        startPos = {x:touch.pageX,y:touch.pageY}
        scrollDirection = 0;
      })
      $('.card').on('touchstart' , function(event){
        //console.log($(this).find('.back').length);

        $this = $(this); //very important
        if($(this).find('.back').length == 1)
        {
          timeout = setTimeout(function() {
            $this.toggleClass('flipped');

            }, 600);
        }
      });
      $('.card').on('touchend' , function(){
        clearTimeout(timeout);
      });

      var oInp = document.getElementById("test");
      $('#test').on('touchmove' , function(event){
        //oInp.innerHTML = "<br>Touch moved (" + e.touches[0].clientX + "," + e.touches[0].clientY + ")";
        if(event.targetTouches.length > 1){
            return
        }

        touch = event.targetTouches[0];
        endPos = {x:touch.pageX,y:touch.pageY}
        // 判断出滑动方向，向右为1，向左为-1
        scrollDirection = touch.pageX-startPos.x > 0 ? 1 : -1;
        oInp.innerHTML = "<h1>Direction: "+scrollDirection+"</h1>"
        if(scrollDirection == -1)
        {
            $('.owl-carousel').trigger('next.owl.carousel');
        }
        else if(scrollDirection == 1){
           $('.owl-carousel').trigger('prev.owl.carousel', [300]);
        }else {

        }

      });

      /*
      $('#owl').on('touchcancel' , function(){
        clearTimeout(timeout);
      });*/


  });
  </script>
</html>
