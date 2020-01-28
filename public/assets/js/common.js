$(function() {
  $('#js-navToggle').click(function() {
    $this = $(this);
    $this.parents('.g-nav').toggleClass('open');
  });
});