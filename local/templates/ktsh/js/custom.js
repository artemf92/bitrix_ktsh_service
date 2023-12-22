$(document).ready(function() {
  if ($(window).width() <= 768) {
    $('.b-main-menu ul:not(.submenu) li a').on('click', function (event) {
      console.log($(this).siblings('ul.submenu').length)
      event.preventDefault()
      if ($(this).siblings('ul.submenu').length) {
        $(this).siblings('ul.submenu').slideToggle()
      }

      // if ($(this).siblings('ul.submenu').length) {

      // }
    })
  }
  // SCROLL ANCHOR
  $("a[href^='#']").on('click', function (e) {
    var fixed_offset = 35

    if ($(window).width() <= 1199) {
      fixed_offset += 65
    }
    $('html,body')
      .stop()
      .animate(
        {
          scrollTop: $(this.hash).offset().top - fixed_offset
        },
        1000
      )
    e.preventDefault()
    return false
  })
})