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
$slidesCount = count($arResult["ITEMS"]);
$themeSettings = gedeGetAdminParams();
$sliderPCHeight = $themeSettings['INDEX']['OPTIONS']['BLOCK_SLIDER_PC_HEIGHT'];
$sliderMobileHeight = $themeSettings['INDEX']['OPTIONS']['BLOCK_SLIDER_MOBILE_HEIGHT'];

?>
<?php if($sliderPCHeight['VALUE']){ ?>
    <style>

        @media (min-width: 992px) {
            .site-slider .b-slider-img{
                height: <?=$sliderPCHeight['VALUE']?>
            }
            .site-slider .b-slider-video-wrap{
                min-height: <?=$sliderPCHeight['VALUE']?>;
                max-height: <?=$sliderPCHeight['VALUE']?>
            }
        }
    </style>
<?php } ?>
<?php if($sliderMobileHeight['VALUE']){ ?>
    <style>
        @media (max-width: 767px) {
            .site-slider .b-slide-content{
                height: <?=$sliderMobileHeight['VALUE']?>
            }
        }
    </style>
<?php } ?>
<div class="home-slider site-slider swiper-container">
    <div class="swiper-wrapper">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $show_button_one = false;
            $show_button_two = false;
            $show_button_one_link = false;
            $show_button_two_link = false;
            $text_center     = '';
            if(($arItem['PROPERTIES']['BUTTON_ONE_TEXT']['VALUE'] && $arItem['PROPERTIES']['BUTTON_ONE_TEXT']['VALUE'] != '') ){
                $show_button_one = true;
            }
            if(($arItem['PROPERTIES']['BUTTON_TWO_TEXT']['VALUE'] && $arItem['PROPERTIES']['BUTTON_TWO_TEXT']['VALUE'] != '') ){
                $show_button_two = true;
            }
            if($arItem['PROPERTIES']['BUTTON_ONE_LINK']['VALUE'] && $arItem['PROPERTIES']['BUTTON_ONE_LINK']['VALUE'] != ''){
                $show_button_one_link = true;
            }
            if($arItem['PROPERTIES']['BUTTON_TWO_LINK']['VALUE'] && $arItem['PROPERTIES']['BUTTON_TWO_LINK']['VALUE'] != ''){
                $show_button_two_link = true;
            }
            if($arItem['PROPERTIES']['TEXT_CENTER']['VALUE_XML_ID'] == 'Y'){
                $text_center = 'text-center';
            }

            $video = false;
            if(strlen($arItem['PROPERTIES']['VIDEO']['VALUE']) > 0){
                $video = CFile::GetPath($arItem['PROPERTIES']['VIDEO']['VALUE']);
            }
            ?>
            <div class="swiper-slide <?=$text_center?> <?=$video ? 'b-slide-with-video' : ''?>">
                <?php if($video){ ?>
                    <div class="b-slider-video-wrap">
                        <video class="b-slide-video d-none d-sm-block" style="outline: none !important;" width="100%" height="100%" poster="<?=$arItem['BACKGROUND_IMAGE']?>" autoplay="autoplay" loop="loop" muted="" playsinline=""><source src="<?=$video?>" type="video/mp4;"></video>
                        <div class="b-slide-content" style="background-image: url(<?=$arItem['BACKGROUND_IMAGE_MOBILE']?>)">
                            <div class="b-inner">
                                <?php if($arItem['PROPERTIES']['TITLE']['~VALUE']['TEXT'] && $arItem['PROPERTIES']['TITLE']['~VALUE']['TEXT'] != ''){ ?>
                                    <div class="b-slider-title"><?=$arItem['PROPERTIES']['TITLE']['~VALUE']['TEXT']?></div>
                                <?php } ?>
                                <?/*php if($arItem['PROPERTIES']['TEXT']['~VALUE']['TEXT'] && $arItem['PROPERTIES']['TEXT']['~VALUE']['TEXT'] != ''){ ?>
                                    <div class="b-slider-text"><?=$arItem['PROPERTIES']['TEXT']['~VALUE']['TEXT']?></div>
                                <?php } */?>
                            </div>

                            <?php if($show_button_one || $show_button_two){ ?>
                                <div class="b-slider-buttons">
                                    <?php if($show_button_one && !$show_button_one_link): ?>
                                        <button data-toggle="modal" data-target="#b-zapis-form" data-form-title="<?=$arItem['NAME']?>" class="btn b-btn b-btn-primary"><?=$arItem['PROPERTIES']['BUTTON_ONE_TEXT']['VALUE']?></button>
                                    <?php endif; ?>
                                    <?php if($show_button_one && $show_button_one_link): ?>
                                        <a class="b-slider-link" target="_blank" href="<?=$arItem['PROPERTIES']['BUTTON_ONE_LINK']['VALUE']?>">
                                            <button class="btn b-btn b-btn-secondary"><?=$arItem['PROPERTIES']['BUTTON_ONE_TEXT']['VALUE']?></button>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($show_button_two && !$show_button_two_link): ?>
                                        <button data-toggle="modal" data-target="#b-zapis-form" data-form-title="<?=$arItem['NAME']?>" class="btn b-btn b-btn-primary"><?=$arItem['PROPERTIES']['BUTTON_TWO_TEXT']['VALUE']?></button>
                                    <?php endif; ?>
                                    <?php if($show_button_two && $show_button_two_link): ?>
                                        <a class="b-slider-link" target="_blank" href="<?=$arItem['PROPERTIES']['BUTTON_TWO_LINK']['VALUE']?>">
                                            <button class="btn b-btn b-btn-secondary"><?=$arItem['PROPERTIES']['BUTTON_TWO_TEXT']['VALUE']?></button>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                <?php } else { ?>
                    <div class="b-slider-img d-none d-sm-block" style="background-image: url(<?=$arItem['BACKGROUND_IMAGE']?>)"></div>
                    <div class="b-slide-content" style="background-image: url(<?=$arItem['BACKGROUND_IMAGE_MOBILE']?>)">
                        <div class="b-inner">
                            <?php if($arItem['PROPERTIES']['TITLE']['~VALUE']['TEXT'] && $arItem['PROPERTIES']['TITLE']['~VALUE']['TEXT'] != ''){ ?>
                                <div class="b-slider-title"><?=$arItem['PROPERTIES']['TITLE']['~VALUE']['TEXT']?></div>
                            <?php } ?>
                            <?/*php if($arItem['PROPERTIES']['TEXT']['~VALUE']['TEXT'] && $arItem['PROPERTIES']['TEXT']['~VALUE']['TEXT'] != ''){ ?>
                                <div class="b-slider-text"><?=$arItem['PROPERTIES']['TEXT']['~VALUE']['TEXT']?></div>
                            <?php } */?>
                        </div>

                        <?php if($show_button_one || $show_button_two){ ?>
                            <div class="b-slider-buttons">
                                <?php if($show_button_one && !$show_button_one_link): ?>
                                    <button data-toggle="modal" data-target="#b-zapis-form" data-form-title="<?=$arItem['NAME']?>" class="btn b-btn b-btn-primary"><?=$arItem['PROPERTIES']['BUTTON_ONE_TEXT']['VALUE']?></button>
                                <?php endif; ?>
                                <?php if($show_button_one && $show_button_one_link): ?>
                                    <a class="b-slider-link" target="_blank" href="<?=$arItem['PROPERTIES']['BUTTON_ONE_LINK']['VALUE']?>">
                                        <button class="btn b-btn b-btn-secondary"><?=$arItem['PROPERTIES']['BUTTON_ONE_TEXT']['VALUE']?></button>
                                    </a>
                                <?php endif; ?>
                                <?php if($show_button_two && !$show_button_two_link): ?>
                                    <button data-toggle="modal" data-target="#b-zapis-form" data-form-title="<?=$arItem['NAME']?>" class="btn b-btn b-btn-primary"><?=$arItem['PROPERTIES']['BUTTON_TWO_TEXT']['VALUE']?></button>
                                <?php endif; ?>
                                <?php if($show_button_two && $show_button_two_link): ?>
                                    <a class="b-slider-link" target="_blank" href="<?=$arItem['PROPERTIES']['BUTTON_TWO_LINK']['VALUE']?>">
                                        <button class="btn b-btn b-btn-secondary"><?=$arItem['PROPERTIES']['BUTTON_TWO_TEXT']['VALUE']?></button>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>
        <?php endforeach; ?>
    </div>

    <?php if($slidesCount > 1){ ?>
        <div class="b-button-next b-transition-3"></div>
    <?php } ?>
</div>