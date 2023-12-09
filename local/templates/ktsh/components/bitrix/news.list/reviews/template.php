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
<?php if(!empty($arResult["ITEMS"])): ?>
<div class="reviews-list-wrap">
    <div class="container">
        <div class="reviews-list">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                $image = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>75, 'height'=>75), BX_RESIZE_IMAGE_EXACT, true);
                ?>
                <div class="b-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="b-up">
                        <div class="b-left">
                            <?php if($image): ?>
                                <img data-src="<?=$image['src']?>" alt="<?=$image['NAME']?>" />
                            <?php endif; ?>
                        </div>
                        <div class="b-right">
                            <div class="b-name">
                                <?=$arItem['NAME']?>
                            </div>
                            <div class="b-rating">
                                <?php
                                $i = $arItem['PROPERTIES']['RATING']['VALUE'] ? $arItem['PROPERTIES']['RATING']['VALUE'] : 5;
                                if($i > 5) $i = 5;
                                ?>
                                <div class="empty-stars">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="filled-stars">
                                    <?php for($j = 1; $j <= $i; $j++){ ?>
                                        <i class="far fa-star"></i>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="b-down">
                        <?=$arItem['~PREVIEW_TEXT'] ?>
                        <?php if($arItem['PROPERTIES']['LINK']['VALUE']): ?>
                            <div class="b-link">
                                <a target="_blank" href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>">
                                    <strong><?=GetMessage('GEDE_READ_MORE')?></strong>
                                    <?php
                                        if($arItem['PROPERTIES']['ICON']['VALUE']):
                                        $icon = CFile::ResizeImageGet($arItem['PROPERTIES']['ICON']['VALUE'], array('width'=>35, 'height'=>35), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                    ?>
                                        <img data-src="<?=$icon['src']?>" />
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?endforeach;?>
        </div>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <br /><?=$arResult["NAV_STRING"]?>
        <?endif;?>
    </div>
</div>
<?php endif; ?>