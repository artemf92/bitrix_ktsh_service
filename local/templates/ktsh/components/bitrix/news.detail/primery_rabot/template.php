<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="b-our-works-wrap">

        <div class="b-gallery-slider">
            <div class="b-gallery-top-wrap">
                <div class="swiper-container b-gallery-top">
                    <div class="swiper-wrapper">
                        <? foreach($arResult['GALLERY'] as $image): ?>
                            <div class="swiper-slide">
                                <a href="<?=$image['BIG']?>" data-fancybox="gallery">
                                    <img class="img-responsive" data-src="<?=$image['MED']?>" />
                                </a>
                            </div>
                        <? endforeach;?>
                    </div>
                </div>
                <div class="b-button-next b-nav b-flex b-transition-3"><i class="fas fa-play"></i></div>
                <div class="b-button-prev b-nav b-flex b-transition-3"><i class="fas fa-play"></i></div>
            </div>
            <div class="b-gallery-thumbs-wrap">
                <div class="swiper-container b-gallery-thumbs">
                    <div class="swiper-wrapper">
                        <? foreach($arResult['GALLERY'] as $image): ?>
                            <div class="swiper-slide b-transition-3">
                                <img class="img-responsive" data-src="<?=$image['MIN']?>" />
                            </div>
                        <? endforeach;?>
                    </div>
                </div>
            </div>
        </div>
</div>