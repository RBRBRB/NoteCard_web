$('.center').slick({
  centerMode: true,
  // cssEase: 'cubic-bezier(0.950, 0.050, 0.795, 0.035)',
  easing: 'easeOutElastic',
  focusOnSelect: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [{
    breakpoint: 768,
    settings: {
      arrows: false,
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 3
    }
  }, {
    breakpoint: 480,
    settings: {
      arrows: false,
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 1
    }
  }]
});
