(function($){
  $(document).ready(function() {
    $('.toggle-sidebar').click(function() {
      $('.row-offcanvas').toggleClass('active');
    });

    $('.toggle-navigation').click(function() {
      $(this).toggleClass('open').next('#site-navigation').slideToggle(300);
    });

    $('#site-navigation .sub-menu, #site-navigation .children').before('<i class="fa fa-caret-right"></i>');

    if(!!('ontouchstart' in window)){
      $('#site-navigation .menu-item-has-children .fa, #site-navigation .page_item_has_children .fa')
      .click(function() {
        $(this).toggleClass('open').next('ul').slideToggle(300);
      });
    } else {
      $('#site-navigation .menu-item-has-children, #site-navigation .page_item_has_children')
      .not('.current-menu-parent, .current_page_parent, .current_page_ancestor, .current-menu-ancestor')
      .hover(function() {
        $(this).children('.fa').toggleClass('open').next('ul').stop(true, true).slideToggle(300);
      });
    }
  });
})(jQuery);