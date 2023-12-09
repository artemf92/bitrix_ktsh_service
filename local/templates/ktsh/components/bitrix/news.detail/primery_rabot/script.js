$(document).ready(function(){
	var galleryThumbs = new Swiper('.b-gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 5,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.b-gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.b-button-next',
        prevEl: '.b-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
	

	
})

