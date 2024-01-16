$(document).ready(function(){

    const site_dir = $('body').attr('data-site-dir');
    let hash = window.location.hash;
    if(hash && $('#b-catalog-tabs button[data-target="' + hash + '"]').length){
        $('#b-catalog-tabs button[data-target="' + hash + '"]').tab('show');
        window.setTimeout( () => {
            let blockCatalog = document.getElementById('block-catalog');
            blockCatalog.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }, 800)

    }

    $('.b-catalog-products .b-item-content .b-title').matchHeight();
    $('.b-catalog-products .b-item-content .b-text').matchHeight();

    $('#b-catalog-tabs button').on('click', function (e) {
        let target = $(this).attr('data-target')
        window.location.hash = target;
    });

    $('#b-catalog-tabs button[data-toggle="tab"]').on('shown.bs.tab', function (event) {
        $('#b-catalog-tabs button').each((i, e) => {
          if (e != $(this).get(0)) $(e).removeClass('active')
        })
        $('.b-catalog-products .b-item-content .b-title').matchHeight();
        $('.b-catalog-products .b-item-content .b-text').matchHeight();
        ttlazy('data-src')
    })

    $('#b-catalog-detail-modal').on('show.bs.modal', function (e) {
        const productID   = e.relatedTarget.getAttribute("data-product-id"),
              spinner     = this.querySelector('.spinner-border'),
              productWrap = this.querySelector('.b-catalog-detail-modal-product'),
              h3 = productWrap.querySelector('.b-catalog-modal-product-name'),
              previewText = productWrap.querySelector('.b-catalog-modal-preview-text'),
              price = productWrap.querySelector('.b-catalog-modal-product-price span'),
              detailText = productWrap.querySelector('.b-catalog-modal-detail-text'),
              mainImage = productWrap.querySelector('.b-catalog-modal-images-main'),
              additionalImage = productWrap.querySelector('.b-catalog-modal-images-additional'),
              catalogModalButton = productWrap.querySelector('#catalog-modal-button');

        spinner.classList.remove('d-none');
        productWrap.classList.add('d-none');
        h3.innerHTML = "";
        previewText.innerHTML = "";
        price.innerHTML = "";
        detailText.innerHTML = "";
        mainImage.innerHTML = "";
        additionalImage.innerHTML = "";

        axios({
            method: 'post',
            url: site_dir + 'ajax/getProduct.php',
            headers: {'Content-Type': 'application/json' },
            data: {
                productID: productID
            },
        }).then(function (response) {
            if(response.data.send == 'success'){
                spinner.classList.add('d-none');
                productWrap.classList.remove('d-none');
                if(response.data.product.name){
                    h3.innerText = response.data.product.name;
                    catalogModalButton.setAttribute('data-form-title', response.data.product.name);
                }
                if(response.data.product.preview_text){
                    previewText.innerHTML = response.data.product.preview_text;
                }
                if(response.data.product.price){
                    price.innerText = response.data.product.price;
                }
                if(response.data.product.detail_text){
                    detailText.innerHTML = response.data.product.detail_text;
                }
                if(response.data.product.main_image && response.data.product.main_image_small){
                    const mainImgLink = document.createElement("a");
                    const mainImgTag = document.createElement("img");
                    mainImgLink.setAttribute('href', response.data.product.main_image);
                    mainImgLink.setAttribute('data-fancybox', 'catalog-product');
                    mainImgTag.setAttribute('src', response.data.product.main_image_small);
                    mainImgTag.setAttribute('class', 'img-fluid');

                    mainImgLink.appendChild(mainImgTag);
                    mainImage.appendChild(mainImgLink);
                }
                if(response.data.product.additional_images && response.data.product.additional_images.length > 0){
                    const adImgWrap = document.createElement("div");
                    adImgWrap.setAttribute('class', 'b-catalog-additional-image-wrap');
                    response.data.product.additional_images.forEach((adImg) => {
                        let adImgLink = document.createElement("a");
                        let adImgTag = document.createElement("img");
                        adImgLink.setAttribute('href', adImg);
                        adImgLink.setAttribute('data-fancybox', 'catalog-product');
                        adImgTag.setAttribute('src', adImg);
                        adImgTag.setAttribute('class', 'img-fluid');

                        adImgLink.appendChild(adImgTag);
                        adImgWrap.appendChild(adImgLink);

                    });
                    additionalImage.appendChild(adImgWrap);
                }

            } else {
                console.log('Error. Product not found');
            }

        });
        // document.querySelector('#b-zapis-form .b-zapis-form-title').innerText = formTitle;
        // document.querySelector('#b-zapis-form input[name="formName"]').value = formTitle;

    })

    $(document).on('click', '.b-catalog-subcategory button', function(e) {
        $('.b-catalog-subcategory button').attr('aria-selected', false)
        $('.b-catalog-subcategory button').removeClass('active')
        setTimeout(() => {
            ttlazy('data-src')
        }, 201);
    })
})