$(document).ready(function(){

    if($('.b-partners-slider').length){
        let CertSlider = new Swiper ('.b-partners-slider', {
            // Optional parameters
            loop: true,
            slidesPerView: 5,
            spaceBetween: 30,
            breakpoints: {
                767: {
                    slidesPerView: 2
                },
                991: {
                    slidesPerView: 4
                }
            },
            navigation: {
                prevEl: '.b-partners-slider-wrapper .b-slider-left-2',
                nextEl: '.b-partners-slider-wrapper .b-slider-right-2',
            }

        });
    }
});
