$(document).ready(function(){

    const site_dir = $('body').attr('data-site-dir');
    $('.phone-input').mask('+7 (999) 999-99-99');
    ttlazy('data-src');

    setTimeout( () => {
            if (window.matchMedia("(min-width: 992px)").matches) {
                var nav = priorityNav.init({
                    initClass: "js-priorityNav", // Class that will be printed on html element to allow conditional css styling.
                    mainNavWrapper: ".b-main-menu", // mainnav wrapper selector (must be direct parent from mainNav)
                    mainNav: "ul", // mainnav selector. (must be inline-block)
                    navDropdownClassName: "b-nav-dropdown", // class used for the dropdown - this is a class name, not a selector.
                    navDropdownToggleClassName: "b-nav-dropdown-toggle", // class used for the dropdown toggle - this is a class name, not a selector.
                    navDropdownLabel: "...", // Text that is used for the dropdown toggle.
                    navDropdownBreakpointLabel: "menu", //button label for navDropdownToggle when the breakPoint is reached.
                    breakPoint: 20, //amount of pixels when all menu items should be moved to dropdown to simulate a mobile menu
                    throttleDelay: 50, // this will throttle the calculating logic on resize because i'm a responsible dev.
                    offsetPixels: 0, // increase to decrease the time it takes to move an item.
                    count: true, // prints the amount of items are moved to the attribute data-count to style with css counter.
                });
            }
        },
        150
    )

    $('.b-mobile-burger button').on('click', function () {
        $(this).toggleClass('is-active');
        $('.b-main-menu').slideToggle();
    });

    let anchorlinks = document.querySelectorAll('a[href^="#"]')

    for (let item of anchorlinks) {
        item.addEventListener('click', (e)=> {
            let hashval = item.getAttribute('href')
            let target = document.querySelector(hashval)
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
            history.pushState(null, null, hashval)
            e.preventDefault()
        })
    }

    $('.b-item-inner .b-item-content').matchHeight();
    $('.b-services-list .b-item .b-text').matchHeight();


    if($('.b-cert-list').length){
        let CertSlider = new Swiper ('.b-cert-list', {
            // Optional parameters
            loop: false,
            slidesPerView: 5,
            spaceBetween: 15,
            breakpoints: {
                767: {
                    slidesPerView: 2
                },
                991: {
                    slidesPerView: 4
                }
            },
            navigation: {
                prevEl: '.b-cert-list-wrapper .b-slider-left-2',
                nextEl: '.b-cert-list-wrapper .b-slider-right-2',
            }

        });
    }

    $('.sendForm').on('submit', function(event) {
        event.preventDefault();
        let bodyFormData = new FormData(this);
        let yaMetricTarget = $(this).find('input[name="yaMetricTarget"]').val();
        let yaMetricID = $(this).find('input[name="yaMetricID"]').val();

        axios({
            method: 'post',
            url: site_dir + 'ajax/sendMessage.php',
            headers: {'Content-Type': 'multipart/form-data' },
            data: bodyFormData,
        }).then(function (response) {
            if(response.data.send == 'success'){
                $('#b-zapis-form').modal('hide');
                $('#b-catalog-form').modal('hide');
                $('#success-modal').modal('show');
                if(typeof(ym) == "function" && yaMetricTarget && yaMetricID){
                    ym(yaMetricID, 'reachGoal', yaMetricTarget); return true;
                }
            } else {
                alert('Ошибка отправки. Попробуйте позже');
            }
        });

    });

    $('.projectSendForm').on('submit', function(event) {
        event.preventDefault();
        $('#b-projects-form').modal('hide');
        let bodyFormData = new FormData(this);

        axios({
            method: 'post',
            url:  site_dir + 'ajax/sendMessage.php',
            headers: {'Content-Type': 'multipart/form-data' },
            data: bodyFormData,
        }).then(function (response) {
            if(response.data.send == 'success'){
                $('#success-modal').modal('show')
            } else {
                alert('Ошибка отправки. Попробуйте позже');
            }
        });
    });

    $('.sendForm').on('change', 'input[type="file"]', function()
    {
        let maxFileSize = 10 * 1024 * 1024, // THE MAXIMUM FILE SIZE IS - 10Mb
            file = this.files[0],
            modalName = this.closest('.sendForm'),
            fileSpan = modalName.querySelector('.b-form-input-file-wrap span'),
            inputSubmit = modalName.querySelector('.modalSend');

        if(typeof file === 'undefined' || file.size > maxFileSize)
        {
            this.parentElement.classList.add('changeInput');
            fileSpan.innerHTML = 'Max file size 4Mb';
            inputSubmit.classList.add('disabled');
            inputSubmit.setAttribute('disabled', 'disabled');
            inputSubmit.value = inputSubmit.getAttribute('data-file');
        }
        else
        {
            fileSpan.innerHTML = file.name;
            inputSubmit.classList.remove('disabled');
            inputSubmit.removeAttribute('disabled');
            inputSubmit.value = inputSubmit.getAttribute('data-text');
        }

    });

    $('.b-modal').on('show.bs.modal', function (e) {
        const images = e.currentTarget.querySelectorAll('img');
        for (let image of images) {
            let imageSrc = image.getAttribute('data-src');
            if(imageSrc){
                image.setAttribute('src', imageSrc);
            }
        }
    });

    $('#b-zapis-form').on('show.bs.modal', function (e) {
        const parentModal = e.relatedTarget.closest('.b-modal');
        const formTitle = e.relatedTarget.getAttribute("data-form-title");
        $(parentModal).modal('hide');
        document.querySelector('#b-zapis-form .b-zapis-form-title').innerText = formTitle;
        document.querySelector('#b-zapis-form input[name="formName"]').value = formTitle;
    })
    $('#b-catalog-form').on('show.bs.modal', function (e) {
        $('#b-catalog-detail-modal').modal('hide');
        const formTitle = e.relatedTarget.getAttribute("data-form-title");
        document.querySelector('#b-catalog-form .b-zapis-form-title').innerText = formTitle;
        document.querySelector('#b-catalog-form input[name="formName"]').value = formTitle;
    })

    let slideUp = (target, duration) => {
        window.setTimeout( () => {
            target.style.display = 'none'; /* [8] */
            target.style.removeProperty('height'); /* [9] */
            target.style.removeProperty('padding-top');  /* [10.1] */
            target.style.removeProperty('padding-bottom');  /* [10.2] */
            target.style.removeProperty('margin-top');  /* [11.1] */
            target.style.removeProperty('margin-bottom');  /* [11.2] */
            target.style.removeProperty('overflow');  /* [12] */
            target.style.removeProperty('transition-duration');  /* [13.1] */
            target.style.removeProperty('transition-property');  /* [13.2] */
        }, duration);
    }

    let slideDown = (target, duration) => {
        window.setTimeout( () => {
            target.style.removeProperty('height'); /* [13] */
            target.style.removeProperty('overflow'); /* [14] */
            target.style.removeProperty('transition-duration'); /* [15.1] */
            target.style.removeProperty('transition-property'); /* [15.2] */
        }, duration);
    }

    let slideToggle = (target, duration = 500) => {
        if (window.getComputedStyle(target).display === 'none') {
            return slideDown(target, duration);
        } else {
            return slideUp(target, duration);
        }
    }

    $('.b-faq-elements .b-question').on('click', function (){
        $(this).parent().find('.b-answer').slideToggle();
        $(this).parent().toggleClass('active');
    })

    if($('.b-service-projects-slider').length){
        var galleryTop = new Swiper('.b-service-projects-slider', {
            loop: true,
            navigation: {
                nextEl: '.b-service-projects-wrapper .b-slider-right-2',
                prevEl: '.b-service-projects-wrapper .b-slider-left-2',
            },
        });
    }

    /*$('.b-nav-tabs .b-btn').on('click', function (){
        $('.b-nav-tabs .b-btn').removeClass('b-btn-primary');
        $('.b-nav-tabs .b-btn').removeClass('b-btn-secondary-2');
        $(this).addClass('b-btn-primary');
    })*/

    $(document).scroll(function () {
        let y = $(document).scrollTop();
        var h = $('.home-slider').height();
        let t = $('.home-slider').offset().top;

        if (y > t + h) {
            $('.b-fixed-button').addClass('b-visible');
        } else {
            $('.b-fixed-button').removeClass('b-visible');
        }
    });

});
BX.addCustomEvent('onAjaxSuccess', function(){
    $('.phone-input').mask('+7 (999) 999-99-99');
});
$(window).scroll(function() {

});