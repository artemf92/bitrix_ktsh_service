$(document).ready(function(){
    let autoplay = false;
    if($('.home-slider .swiper-slide').length > 1){
        autoplay = {delay: 3000};
    }
    let MainSlider = new Swiper ('.home-slider', {
        // Optional parameters
        loop: true,
        autoHeight: true,
        autoplay: autoplay,
        navigation: {
            nextEl: '.home-slider .b-button-next',
        },

    });

    $('.b-slider-link').on('click', function (e){

        let href = $(this).attr('href');
        if(href.includes('#')){
            e.preventDefault();
            let link = href.split('#', 2);
            link = '#' + link[1];

            if($('#b-catalog-tabs').length){
                const tabEl = $('#b-catalog-tabs button[data-target="' + link + '" ]')
                if(tabEl.length){
                    let target = document.querySelector('#block-catalog')
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    })
                    tabEl.trigger('click');
                }
            }
        }


    })
});
