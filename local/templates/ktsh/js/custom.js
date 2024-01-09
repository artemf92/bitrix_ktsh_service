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
  $("a[href^='#']:not(.show-more)").on('click', function (e) {
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

  // Карусель категорий услуг
  $('#b-catalog-tabs').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    variableWidth: true,
    prevArrow:
      '<div class="slick-slider__arrow-wrap slick-slider__arrow_prev slick-arrow" aria-disabled="false" style="display: flex;"><img src="/local/templates/ktsh/images/arrow.svg"></div>',
    nextArrow:
      '<div class="slick-slider__arrow-wrap slick-slider__arrow_next slick-arrow" style="display: flex;" aria-disabled="false"><img src="/local/templates/ktsh/images/arrow.svg"></div>',
  })

  initObjectsPictures()
})
$(document).on('click', function (e) {
  if (
    $('.b-mobile-search').hasClass('active') &&
    !$(e.target).closest('.b-mobile-search').length &&
    !$(e.target).closest('.mobile-search').length
  )
    $('.b-mobile-search').removeClass('active')
})
$(document).on('click', '.b-header-search', function() {
  if (!$(this).hasClass('active')) {
    $(this).find('input').focus()
    $(this).toggleClass('active')
  }
})
$(document).on('blur', '.b-header-search input', function () {
  $(this).find('input').blur()
  $(this).val('')
  $(this).closest('.b-header-search').toggleClass('active')
})
$(document).on('click', '.mobile-search', function () {
  if (!$('.b-mobile-search').hasClass('active')) {
    $('.b-mobile-search input').focus()
  }
  $('.b-mobile-search').toggleClass('active')
})

function initObjectsPictures() {
  setTimeout(() => {
    $('#block-objects .b-img img').each((i,e) => {
      $(e).attr('src',$(e).data('src'))
    })
  }, 100);
}