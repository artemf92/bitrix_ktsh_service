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

$this->setFrameMode(true);
$themeSettings = gedeGetAdminParams();
$imageType = $themeSettings['INDEX']['OPTIONS']['BLOCK_SERVICES_IMAGE_TYPE']['VALUE'] ?? 1;
switch ($imageType) {
	case 1:
		$imageSize = array('width' => 650, 'height' => 650);
		break;
	default:
		$imageSize = array('width' => 610, 'height' => 386);
		break;
}

$countPC = $themeSettings['INDEX']['OPTIONS']['BLOCK_SERVICES_COUNT_PC']['VALUE'] ?? 4;
$countMOB = $themeSettings['INDEX']['OPTIONS']['BLOCK_SERVICES_COUNT_MOBILE']['VALUE'] ?? 1;
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
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<div class="b-services-list">
	<? if ($arParams["DISPLAY_TOP_PAGER"]) : ?>
		<?= $arResult["NAV_STRING"] ?><br />
	<? endif; ?>
	<div class="row">
		<?php $i = 1; ?>
		<? foreach ($arResult['SECTIONS'] as &$arSection) : ?>
			<?
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			$image = CFile::ResizeImageGet($arSection['PICTURE'], $imageSize, BX_RESIZE_IMAGE_EXACT, true);
			$gallery = [];
			$isDetail = strlen($arSection['DESCRIPTION']) > 0;
			if (!empty($arSection['PROPERTIES']['GALLERY']['VALUE'])) {
				foreach ($arSection['PROPERTIES']['GALLERY']['VALUE'] as $k => $imageG) :
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
				<div class="b-item-inner" id="<?= $this->GetEditAreaId($arSection['ID']); ?>">
					<div class="b-img">
						<? if ($image) { ?>
						<span <?php if ($isDetail) : ?>data-toggle="modal" <?php endif; ?> data-target="#b-service-detail-modal-<?= $arSection['ID'] ?>">
							<img class="img-fluid" data-src="<?= $image['src'] ?>" alt="<?= $arSection['NAME'] ?>" />
						</span>
						<? } ?>
					</div>
					<div class="b-item-content-wrap">
						<div class="b-item-content">
							<div class="b-title">
								<span <?php if ($isDetail) : ?>data-toggle="modal" <?php endif; ?> data-target="#b-service-detail-modal-<?= $arSection['ID'] ?>">
									<?= $arSection['NAME'] ?>
								</span>
							</div>
							<?php if ($arSection['DESCRIPTION']) : ?>
								<div class="b-text"><?= $arSection['DESCRIPTION'] ?></div>
							<?php endif; ?>
							<?php if ($arSection['PROPERTIES']['PRICE']['~VALUE']) : ?>
								<div class="b-price"><?= $arSection['PROPERTIES']['PRICE']['~VALUE'] ?></div>
							<?php endif; ?>
						</div>
						<div class="b-list-buttons">
							<a href="/objects/?id=<?=$arSection['ID']?>">
								<button class="btn b-btn b-btn-primary">Подробнее</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<? /* ?>
			<div class="modal b-modal fade" id="b-service-detail-modal-<?= $arSection['ID'] ?>" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-body">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<div class="b-service-modal-inner">
								<h3><?= $arSection['NAME'] ?></h3>
								<?php if ($arSection['DETAIL_TEXT']) : ?>
									<div class="b-service-modal-text">
										<?= $arSection['DETAIL_TEXT'] ?>
									</div>
								<?php endif; ?>
								<?php if ($arSection['PROPERTIES']['PRICE']['~VALUE']) : ?>
									<div class="b-price"><?= $arSection['PROPERTIES']['PRICE']['~VALUE'] ?></div>
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

								<?php if ($arSection['PROPERTIES']['BUTTON_TEXT']['~VALUE']) : ?>
									<div class="b-detail">
										<button data-form-title="<?= $arSection['NAME'] ?>" data-toggle="modal" data-target="#b-zapis-form" class="btn b-btn b-btn-primary"><?= $arSection['PROPERTIES']['BUTTON_TEXT']['~VALUE'] ?></button>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<? */ ?>
			<?php $i++; ?>
		<? endforeach; ?>
	</div>
	<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
		<br /><?= $arResult["NAV_STRING"] ?>
	<? endif; ?>
</div>