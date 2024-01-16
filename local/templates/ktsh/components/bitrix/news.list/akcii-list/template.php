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
$themeSettings = gedeGetAdminParams();
$imageType = $themeSettings['INDEX']['OPTIONS']['BLOCK_AKCII_IMAGE_TYPE']['VALUE'] ?? 1;
switch ($imageType) {
    case 1:
        $imageSize = array('width' => 650, 'height' => 650);
        break;
    default:
        $imageSize = array('width' => 610, 'height' => 386);
        break;
}

$countPC = $themeSettings['INDEX']['OPTIONS']['BLOCK_AKCII_COUNT_PC']['VALUE'] ?? 4;
$countMOB = $themeSettings['INDEX']['OPTIONS']['BLOCK_AKCII_COUNT_MOBILE']['VALUE'] ?? 1;
$classPC = '';
$classMob = '';
switch ($countPC) {
    case 1:
        $classPC = 'col-lg-12';
        break;
    case 2:
        $classPC = 'col-lg-6';
        break;
    case 3:
        $classPC = 'col-lg-4';
        break;
    case 5:
        $classPC = 'col-lg-2';
        break;
    default:
        $classPC = 'col-lg-3';
        break;
}
switch ($countMOB) {
    case 2:
        $classMob = 'col-6';
        break;
    default:
        $classMob = 'col-12';
        break;
}
?>
<div class="b-services-list" id="b-news-list">
    <? if ($arParams["DISPLAY_TOP_PAGER"]) : ?>
        <?= $arResult["NAV_STRING"] ?><br />
    <? endif; ?>
    <div class="row ajax-items">
        <?php $i = 1; ?>
        <? foreach ($arResult["ITEMS"] as $arItem) : ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $image = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], $imageSize, BX_RESIZE_IMAGE_EXACT, true);
            $gallery = [];
            $isDetail = strlen($arItem['DETAIL_TEXT']) > 0;
            if (!empty($arItem['PROPERTIES']['GALLERY']['VALUE'])) {
                foreach ($arItem['PROPERTIES']['GALLERY']['VALUE'] as $k => $imageG) :
                    $imageGBig = CFile::ResizeImageGet($imageG, array('width' => 1920, 'height' => 1020), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    $imageGSmall = CFile::ResizeImageGet($imageG, array('width' => 170, 'height' => 170), BX_RESIZE_IMAGE_EXACT, true);
                    $gallery[$k]['IMG_SMALL'] = $imageGSmall['src'];
                    $gallery[$k]['IMG_BIG'] = $imageGBig['src'];
                endforeach;
            }
            if ($i % 2 == 0) {
                $itemClass = 'b-even';
            } else {
                $itemClass = 'b-odd';
            }
            ?>
            <div class="<?= $classMob ?> <?= $classPC ?> col-md-4 b-item <?= $itemClass ?>">
                <div class="b-item-inner" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="b-img">
                        <? if ($image) { ?>
                            <span <?php if ($isDetail) : ?>data-toggle="modal" <?php endif; ?> data-target="#b-service-detail-modal-<?= $arItem['ID'] ?>">
                                <img class="img-fluid" data-src="<?= $image['src'] ?>" alt="<?= $arItem['NAME'] ?>" />
                            </span>
                        <? } ?>
                    </div>
                    <div class="b-item-content-wrap">
                        <div class="b-item-content">
                            <?php if ($arItem['PROPERTIES']['BUTTON_DETAIL_TEXT']['VALUE_XML_ID'] == 'Y') { ?>
                                <div class="b-title d-block mb-2">
                                <? } else { ?>
                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="b-title d-block mb-2">
                                    <? } ?>
                                    <span <?php if ($isDetail) : ?>data-toggle="modal" <?php endif; ?> data-target="#b-service-detail-modal-<?= $arItem['ID'] ?>">
                                        <?= $arItem['NAME'] ?>
                                    </span>
                                    <?php if ($arItem['PROPERTIES']['BUTTON_DETAIL_TEXT']['VALUE_XML_ID'] == 'Y') { ?>
                                </div>
                            <? } else { ?>
                                </a>
                            <? } ?>
                            <div class="b-date mb-2 small text-muted"><?= $arItem['ACTIVE_FROM'] ?></div>
                            <?php if ($arItem['PREVIEW_TEXT']) : ?>
                                <div class="b-text"><?= $arItem['PREVIEW_TEXT'] ?></div>
                            <?php elseif ($arItem['DETAIL_TEXT']) : ?>
                                <div class="b-text"><?= mb_substr(strip_tags($arItem['DETAIL_TEXT']), 0, 200, 'UTF-8') ?>...</div>
                            <?php endif; ?>
                            <?php if ($arItem['PROPERTIES']['PRICE']['~VALUE']) : ?>
                                <div class="b-price"><?= $arItem['PROPERTIES']['PRICE']['~VALUE'] ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($arItem['PROPERTIES']['BUTTON_TEXT']['VALUE'])) : ?>
                            <div class="b-list-buttons">
                                <?php if (!empty($arItem['PROPERTIES']['BUTTON_LINK']['VALUE'])) { ?>
                                    <a target="_blank" href="<?= $arItem['PROPERTIES']['BUTTON_LINK']['VALUE'] ?>">
                                        <button class="btn b-btn btn-primary"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></button>
                                    </a>
                                <?php } else { ?>
                                    <?php if ($arItem['PROPERTIES']['BUTTON_DETAIL_TEXT']['VALUE_XML_ID'] == 'Y') { ?>
                                        <button data-toggle="modal" data-target="#b-service-detail-modal-<?= $arItem['ID'] ?>" class="btn b-btn btn-primary"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></button>
                                    <?php } else { ?>
                                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn b-btn btn-primary"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="modal b-modal fade" id="b-service-detail-modal-<?= $arItem['ID'] ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="b-service-modal-inner">
                                <h3><?= $arItem['NAME'] ?></h3>
                                <?php if ($arItem['DETAIL_TEXT']) : ?>
                                    <div class="b-service-modal-text">
                                        <?= $arItem['DETAIL_TEXT'] ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($arItem['PROPERTIES']['PRICE']['~VALUE']) : ?>
                                    <div class="b-price"><?= $arItem['PROPERTIES']['PRICE']['~VALUE'] ?></div>
                                <?php endif; ?>

                                <?php if (!empty($gallery)) : ?>
                                    <div class="b-modal-gallery">
                                        <?php foreach ($gallery as $gal) : ?>
                                            <a href="<?= $gal['IMG_BIG'] ?>" data-fancybox="services-modal">
                                                <img class="img-responsive" data-src="<?= $gal['IMG_SMALL'] ?>" />
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?/*php if ($arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE']) : ?>
                                    <div class="b-detail">
                                        <button data-form-title="<?= $arItem['NAME'] ?>" data-toggle="modal" data-target="#b-zapis-form" class="btn btn-ajax b-btn b-btn-primary"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></button>
                                    </div>
                                <?php endif; */ ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
        <? endforeach; ?>
    </div>
    <div class="pagination">
        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
            <br /><?= $arResult["NAV_STRING"] ?>
        <? endif; ?>
    </div>
</div>