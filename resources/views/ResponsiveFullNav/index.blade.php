<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Greensock Navigation | CODEGRID</title>
    <link rel="stylesheet" href="{{asset('css/fullnav.css')}}">

<!--    Bootstrap cdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

<!-- icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<!--    Jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<!--    Greensock-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
</head>
<body>

   <div class="wrapper">
        <div class="menu-btn">
            <button type="button"><i class="material-icons">menu</i></button>
        </div>

        <div class="menu">
            <div class="row">
                <div class="col-lg overlay">
                    <div class="nav">
                        <ul id="fullnav">
                            <li>Home</li>
                            <li>Our Story</li>
                            <li>Portfolio</li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script>

      var t1 = new TimelineMax({paused: true});

      t1.to(".overlay", 1.6, {

          top: 0,
          ease: Expo.easeInOut

      });

      t1.staggerFrom(".menu ul li", 1, {y: 100, opacity: 0, ease: Expo.easeOut}, 0.1);

      t1.reverse();
      $(document).on("click", ".menu-btn", function() {
          t1.reversed(!t1.reversed());
      });

      t1.reverse();
      $(document).on("click", "#fullnav li", function() {
          t1.reversed(!t1.reversed());
      });

  </script>

</body>
</html>
