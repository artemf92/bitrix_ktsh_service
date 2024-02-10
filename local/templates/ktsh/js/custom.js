$(document).ready(function() {
  setTimeout(() => {
    showAllImages()
  }, 100);
  // if ($(window).width() <= 768) {
  //   $('.b-main-menu ul:not(.submenu) li a').on('click', function (event) {
  //     console.log($(this).siblings('ul.submenu').length)
  //     event.preventDefault()
  //     if ($(this).siblings('ul.submenu').length) {
  //       $(this).siblings('ul.submenu').slideToggle()
  //     }

  //     // if ($(this).siblings('ul.submenu').length) {

  //     // }
  //   })
  // }
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

  $.fancybox.defaults.closeTpl =
    '<button data-fancybox-close type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>'
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
    $(this).toggleClass('active')
    $(this).find('input').focus()
  }
})
// $(document).on('blur', '.b-header-search input', function () {
//   $(this).find('input').blur()
//   $(this).val('')
//   $(this).closest('.b-header-search').toggleClass('active')
// })
$(document).on('click', '.mobile-search', function () {
  if (!$('.b-mobile-search').hasClass('active')) {
    $('.b-mobile-search input').focus()
  }
  $('.b-mobile-search').toggleClass('active')
})

$(document).on('click', '.b-btn-catalog:not([data-toggle="tab"])', function(e) {
  const product = e.currentTarget.getAttribute('data-product')
  window.bCatalogselectedProduct = product

  $.fancybox.open({
    type: 'ajax',
    src: '/include/modals/b-catalog-form.php',
    opts: {
      closeTpl:
        '<button data-fancybox-close type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>',
      afterLoad: function (instance, current) {
        window.addEventListener('b24:form:show', catalogFormHandler)
      },
      beforeClose: function () {
        window.removeEventListener('b24:form:show', catalogFormHandler)
      }
    }
  })
})

function initObjectsPictures() {
  setTimeout(() => {
    $('#block-objects .b-img img').each((i,e) => {
      $(e).attr('src',$(e).data('src'))
    })
  }, 100);
}

function showAllImages() {
  $('img[data-src]:not([src])').each((i,el) => {
    const src = $(el).data('src')
    $(el).attr('src',src)
  })
}

function catalogFormHandler(event) {
  const instance = $.fancybox.getInstance()
  const modal = instance.current.$content[0]
  const product = window.bCatalogselectedProduct
  let form = event.detail.object
  if (form.identification.id == 64) {
    setTimeout(() => {
      const inputs = modal.querySelectorAll('input[type="string"]')
      for (let i of inputs) {
        if (i.value == '%my_param1% ') {
          i.value = product
          i.disabled = true
<<<<<<< HEAD
          i.type = 'hidden'          
=======
          i.type = 'hidden'
>>>>>>> parent of e1aebc39 (fix)
          const textarea = BX.create('TEXTAREA', { 
            props: { className: i.className, rows: window.innerWidth < 480 ? 3:1, disabled: true}, 
            style: { height: 'auto', marginTop: '20px' }, 
            html: product
          })
          i.parentElement.appendChild(textarea)
        }
      }
    }, 100)
  }
}