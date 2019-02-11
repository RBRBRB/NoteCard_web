$(document).ready(function () {
  $('a[data-class]').click(function () {
    updateNavbarClass($(this).attr('data-class'));

  });

  updateNavbarClass('navbar-fixed-right'); //Set the navBar at right side first

});

function updateNavbarClass(className) {
  $('nav')
    .removeClass(function (index, css) {
      return (css.match(/(^|\s)navbar-fixed-\S+/g) || []).join(' ');
    })
    .addClass(className);

  $('a[data-class]').removeClass('active').parent('li').removeClass('active');
  $('a[data-class="'+className+'"]').addClass('active').parent('li').addClass('active');

  fixBodyPadding(className);

}

function fixBodyPadding(className) {
  if (/navbar-fixed-(left|right)/.test(className)) {
    $('body').removeAttr('style');
    if (className == 'navbar-fixed-left') {
      $('body').css('paddingLeft', 0);

    } else {
      $('body').css('paddingRight', 0);

    }
  }
}
