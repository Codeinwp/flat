(function($){
  $(document).ready(function() {
    $('.toggle-sidebar').click(function() {
      $('.row-offcanvas').toggleClass('active');
    });

    $('.toggle-navigation').click(function() {
      $(this).toggleClass('open').next('#site-navigation').slideToggle(300);
    });

    $('#site-navigation .sub-menu').before('<i class="fa fa-caret-right"></i>');
    $('#site-navigation .children').before('<i class="fa fa-caret-right"></i>');

    $('#site-navigation .fa').click(function() {
      $(this).toggleClass('open').next('ul').slideToggle(300);
    });
  });
})(jQuery);