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
$videoCount = count($arResult["ITEMS"]);
$class = '';
if($videoCount == 1){
    $class = 'b-single-video';
}
if($videoCount > 1){
    $class = 'b-many-video';
}
?>
<div class="b-video-list <?=$class?>">
    <div class="row">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $video = GedestudioContent::youtube_video($arItem['PROPERTIES']['LINK']['VALUE']);
            ?>
            <div class="b-item">
                <div class="b-item-inner" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="video-wrapper">
                        <iframe src="<?=$video['iframe']?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <?php if($arItem['PROPERTIES']['DESCRIPTION']['~VALUE']):?>
                        <div class="description"><?=$arItem['PROPERTIES']['DESCRIPTION']['~VALUE']?></div>
                    <?php endif; ?>
                </div>
            </div>

        <?endforeach;?>
    </div>
</div>
