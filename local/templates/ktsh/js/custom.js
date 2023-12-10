$(document).ready(function() {
  if ($(window).width() <= 768)  {
    $('.b-main-menu ul:not(.submenu) li a').on('click', function(event){
      console.log($(this).siblings('ul.submenu').length)
      event.preventDefault();
      if ($(this).siblings('ul.submenu').length) {
        $(this).siblings('ul.submenu').slideToggle();
      }
            
      // if ($(this).siblings('ul.submenu').length) {


      // }
    })
  }
})