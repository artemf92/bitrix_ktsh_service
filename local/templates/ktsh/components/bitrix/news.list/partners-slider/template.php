<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="b-partners-slider-wrapper">
    <div class="b-partners-slider site-slider swiper-container">
        <div class="swiper-wrapper">
            <? foreach ($arResult["ITEMS"] as $arItem):  ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                $imageSmall = CFile::ResizeImageGet($arItem['PROPERTIES']['IMAGE']['VALUE'], array('width' => 200, 'height' => 130), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                ?>
                <div class="swiper-slide">
                    <div class="b-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <img class="img-fluid" data-src="<?= $imageSmall['src'] ?>">
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
    <div class="b-slider-left-2 b-slider-arrow-2 b-transition-3"></div>
    <div class="b-slider-right-2 b-slider-arrow-2 b-transition-3"></div>
</div>