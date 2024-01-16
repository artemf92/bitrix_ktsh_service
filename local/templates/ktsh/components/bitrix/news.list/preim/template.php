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
<div class="b-preim">
    <div class="container">
        <div class="b-flex">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                $icon = CFile::ResizeImageGet($arItem['PROPERTIES']['ICON']['VALUE'], array('width'=>50, 'height'=>50), BX_RESIZE_IMAGE_EXACT, true);
                ?>
                <div class="b-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="b-icon">
                        <img class="img-responsive" src="<?=$icon['src']?>" />
                    </div>
                    <div class="b-title"><?=$arItem['NAME']?></div>
                    <?php if($arItem['PROPERTIES']['TEXT']['~VALUE'] && $arItem['PROPERTIES']['TEXT']['~VALUE'] != ''): ?>
                        <div class="b-text"><?=$arItem['PROPERTIES']['TEXT']['~VALUE']?></div>
                    <?php endif; ?>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>
