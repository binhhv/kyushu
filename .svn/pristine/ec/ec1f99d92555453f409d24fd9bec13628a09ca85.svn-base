jQuery(function($){
  $(window).scroll(function () {
    $('#page-top').click(function(){
      $('html, body').queue([]).animate({scrollTop:0});
      return false;
    });
  });
});

//ăƒ‰ăƒ­ăƒƒăƒ—ăƒ€ă‚¦ăƒ³ăƒ¡ăƒ‹ăƒ¥ăƒ¼
$(function() {
  var nav = $('.header-nav');
  var navTop = nav.offset().top;

  $('li', nav).hover(function(){
    $('ul',this).stop().slideDown('fast');
  },function(){
    $('ul',this).stop().slideUp('fast');
  });
});