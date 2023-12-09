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

$imagePosition = 0;
if($arResult['PROPERTIES']['PHOTO_POSITION']['VALUE_XML_ID'] == 'RIGHT'){
    $imagePosition = 2;
}
$contentClass = isset($arResult['PREVIEW_PICTURE']['SRC']) ? 'col-12 col-md-7 col-lg-8' : 'col-12';
$imageClass   = 'col-12 col-md-5 col-lg-4';
$imageWidth   = $arResult['PROPERTIES']['PHOTO_WIDTH']['VALUE_XML_ID'];

switch ($imageWidth){
    case 25:
        $contentClass = isset($arResult['PREVIEW_PICTURE']['SRC']) ? 'col-12 col-md-7 col-lg-9' : 'col-12';
        $imageClass   = 'col-12 col-md-5 col-lg-3';
        break;
    case 50:
        $contentClass = isset($arResult['PREVIEW_PICTURE']['SRC']) ? 'col-12 col-md-7 col-lg-6' : 'col-12';
        $imageClass   = 'col-12 col-md-5 col-lg-6';
        break;
    default:
        $contentClass = isset($arResult['PREVIEW_PICTURE']['SRC']) ? 'col-12 col-md-7 col-lg-8' : 'col-12';
        $imageClass   = 'col-12 col-md-5 col-lg-4';
        break;
}

$darkBlock = $arResult['PROPERTIES']['DARK']['VALUE_XML_ID'] == 'Y';

?>
<div class="b-text-block b-block">
    <div class="container">
        <div class="b-block-title-wrap">
            <h2 class="b-block-title" style="<?=$darkBlock ? 'color: #fff;' : ''?>">
                <?=$arResult['NAME']?>
            </h2>
            <?php if(!empty($arResult['PROPERTIES']['SUBTITLE']['VALUE'])): ?>
                <div class="b-block-subtitle" style="<?=$darkBlock ? 'color: #fff;' : ''?>">
                    <?=$arResult['PROPERTIES']['SUBTITLE']['VALUE']?>
                </div>
            <?php endif; ?>
        </div>
        <div class="b-block-content">
            <div class="row align-items-center">
                <div class="<?=$contentClass?> order-1 order-md-1">
                    <div class="b-text" style="<?=$darkBlock ? 'color: #fff;' : ''?>">
                        <?=$arResult['PREVIEW_TEXT']?>
                    </div>
                    <?php
                    if(strlen($arResult['PROPERTIES']['BUTTON_TEXT']['VALUE']) > 0){ ?>
                        <div class="b-text-block-button-wrap">
                            <?php if(strlen($arResult['PROPERTIES']['BUTTON_LINK']['VALUE']) > 0){ ?>
                                <a target="_blank" rel="nofollow" href="<?=$arResult['PROPERTIES']['BUTTON_LINK']['VALUE']?>">
                                    <button class="btn b-btn b-btn-primary">
                                        <?=$arResult['PROPERTIES']['BUTTON_TEXT']['VALUE']?>
                                    </button>
                                </a>
                            <?php } else { ?>
                                <button data-form-title="<?=$arResult['NAME']?>" data-toggle="modal" data-target="#b-zapis-form" class="btn b-btn b-btn-primary">
                                    <?=$arResult['PROPERTIES']['BUTTON_TEXT']['VALUE']?>
                                </button>
                            <?php } ?>
                        </div>
                    <?php }
                    ?>
                </div>
                <?php if(isset($arResult['PREVIEW_PICTURE']['SRC'])): ?>
                    <div class="<?=$imageClass?> order-0 order-md-<?=$imagePosition?>">
                        <div class="b-img b-rounded-corner-img">
                            <img class="img-fluid" data-src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>"/>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>