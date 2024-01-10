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
$count = count($arResult["ITEMS"]);
$additionalClass = '';
if ($count < 4) {
    $additionalClass = 'justify-content-center';
}
?>
<div class="personal-list">
    <div class="row <?= $additionalClass ?>">
        <? foreach ($arResult["ITEMS"] as $arItem) : ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $imageSmall = CFile::ResizeImageGet($arItem['PROPERTIES']['PHOTO']['VALUE'], array('width' => 200, 'height' => 200), BX_RESIZE_IMAGE_EXACT, true);
            $detailImage = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], array('width' => 450, 'height' => 450), BX_RESIZE_IMAGE_EXACT, true);

            ?>
            <div class="item col-12 col-sm-6 col-md-4 col-lg-3" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="img" data-toggle="<?= $arItem['DETAIL_TEXT'] ? 'modal' : '' ?>" data-target="#b-personal-detail-modal-<?= $arItem['ID'] ?>">
                    <img class="img-fluid" data-src="<?= $imageSmall['src'] ?>" />
                </div>
                <?php if ($arItem['PROPERTIES']['DOLGN']['~VALUE']) : ?>
                    <div class="dolgn">
                        <?= $arItem['PROPERTIES']['DOLGN']['~VALUE'] ?>
                    </div>
                <?php endif; ?>
                <div class="name" data-toggle="<?= $arItem['DETAIL_TEXT'] ? 'modal' : '' ?>" data-target="#b-personal-detail-modal-<?= $arItem['ID'] ?>">
                    <?= $arItem['NAME']; ?>
                </div>
                <?php if ($arItem['PROPERTIES']['PHONE']['~VALUE']) : ?>
                    <div class="tel">
                        <?= $arItem['PROPERTIES']['PHONE']['~VALUE'] ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($arItem['PROPERTIES']['BUTTON_TEXT']['VALUE'])) : ?>
                    <div class="b-list-buttons">
                        <?php if (!empty($arItem['PROPERTIES']['BUTTON_LINK']['VALUE'])) { ?>
                            <a target="_blank" href="<?= $arItem['PROPERTIES']['BUTTON_LINK']['VALUE'] ?>">
                                <button class="btn b-btn b-btn-primary"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></button>
                            </a>
                        <?php } else { ?>
                            <?php if ($arItem['PROPERTIES']['BUTTON_DETAIL_TEXT']['VALUE_XML_ID'] == 'Y') { ?>
                                <button data-toggle="<?= $arItem['DETAIL_TEXT'] ? 'modal' : '' ?>" data-target="#b-personal-detail-modal-<?= $arItem['ID'] ?>" class="btn b-btn b-btn-primary"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></button>
                            <?php } else { ?>
                                <button data-toggle="modal" data-target="#b-zapis-form" data-form-title="<?= $arItem['PROPERTIES']['MODAL_TITLE']['~VALUE'] ?>" data-form-subtitle="<?= $arItem['PROPERTIES']['MODAL_SUBTITLE']['~VALUE'] ?>" class="btn b-btn b-btn-primary"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></button>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="modal b-modal fade" id="b-personal-detail-modal-<?= $arItem['ID'] ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="b-service-modal-inner">
                                <?php if (isset($detailImage['src'])) : ?>
                                    <div class="img">
                                        <img class="img-fluid" data-src="<?= $detailImage['src'] ?>" />
                                    </div>
                                <?php endif; ?>
                                <?php if ($arItem['PROPERTIES']['DOLGN']['~VALUE']) : ?>
                                    <div class="dolgn">
                                        <?= $arItem['PROPERTIES']['DOLGN']['~VALUE'] ?>
                                    </div>
                                <?php endif; ?>
                                <div class="name" data-toggle="modal" data-target="#b-personal-detail-modal-<?= $arItem['ID'] ?>">
                                    <?= $arItem['NAME']; ?>
                                </div>
                                <?php if ($arItem['PROPERTIES']['PHONE']['~VALUE']) : ?>
                                    <div class="tel">
                                        <?= $arItem['PROPERTIES']['PHONE']['~VALUE'] ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($arItem['DETAIL_TEXT']) : ?>
                                    <div class="b-service-modal-text">
                                        <?= $arItem['DETAIL_TEXT'] ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($arItem['PROPERTIES']['BUTTON_TEXT']['VALUE'])) : ?>
                                    <div class="b-list-buttons">
                                        <?php if (!empty($arItem['PROPERTIES']['BUTTON_LINK']['VALUE'])) { ?>
                                            <a target="_blank" href="<?= $arItem['PROPERTIES']['BUTTON_LINK']['VALUE'] ?>">
                                                <button class="btn b-btn b-btn-primary"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></button>
                                            </a>
                                        <?php } else { ?>
                                            <button data-toggle="modal" data-target="#b-zapis-form" data-form-title="<?= $arItem['NAME']; ?>" class="btn b-btn b-btn-primary"><?= $arItem['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></button>
                                        <?php } ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
        <br /><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>