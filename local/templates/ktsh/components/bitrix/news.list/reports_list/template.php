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
<div class="b-news-wrapper">
	<?php if (!empty($arResult["ITEMS"])) : ?>
		<div class="b-news-list">
			<div class="b-news-inner">
				<div class="b-news-elements">
					<? foreach ($arResult["ITEMS"] as $arItem) : ?>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
						<div class="b-news-element p-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
							<div class="b-image mb-3">
								<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])) : ?>
									<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) : ?>
										<a href="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" data-fancybox><img class="rounded-lg" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" /></a>
									<? else : ?>
										<img class="rounded-lg" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" />
									<? endif; ?>
								<? endif ?>
							</div>
							<? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]) : ?>
								<? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DATE_CREATE"]) : ?>
									<div class="b-title font-weight-bold">
										<? 
										$title = str_replace('Дата создания:', '', $arItem["DATE_CREATE"]);
										$title = explode(' ', $title);
										echo $title[0] ?>
									</div>
								<? endif ?>
							<? endif; ?>
							<? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]) : ?>
								<div class="b-text text-body">
									<? echo $arItem["PREVIEW_TEXT"]; ?>
								</div>
							<? endif; ?>
							<p>
								<? foreach ($arItem["FIELDS"] as $code => $value) : ?>
									<? if ($code == 'DATE_CREATE') continue; ?>
									<small>
										<?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $value; ?>
									</small><br />
								<? endforeach; ?>
								<br />
								<? foreach ($arItem["DISPLAY_PROPERTIES"] as $pid => $arProperty) : ?>
							<div>
								<?= $arProperty["NAME"] ?>:&nbsp;
								<? if (is_array($arProperty["DISPLAY_VALUE"])) : ?>
									<? foreach ($arProperty['FILE_VALUE'] as $i => $file) { ?>
										<div class="mb-2">
											<?= $file['ORIGINAL_NAME'] ?> - <a href="<?= $file['SRC'] ?>" class="<? //b-btn b-btn-primary
																																														?>" download="<?= $file['ORIGINAL_NAME'] ?>">Скачать</a>
										</div>
									<? } ?>
								<? else : ?>
									<div class="mb-2">
										<?= $arProperty["FILE_VALUE"]['ORIGINAL_NAME'] ?> - <a href="<?= $arProperty["FILE_VALUE"]['SRC'] ?>" class="<? //b-btn b-btn-primary
																																																																	?>" download="<?= $arProperty["FILE_VALUE"]['ORIGINAL_NAME'] ?>">Скачать</a>
									</div>
								<? endif; ?>
							</div>
						<? endforeach; ?>
						</p>
						<? if (!empty($arItem['PROPERTIES']['GALLERY']['VALUE'])) { ?>
							<div class="row mt-2 mb-2">
								<? foreach ($arItem['PROPERTIES']['GALLERY']['VALUE'] as $item) { ?>
									<div class="col-3 col-xl-2 mb-2 px-1">
										<? $src = CFile::GetPath($item); ?>
										<a data-fancybox="gallery" href="<?= $src ?>" href=""><img src="<?= $src ?>" alt=""></a>
									</div>
								<? } ?>
							</div>
						<? } ?>
						<hr>
					<?php endforeach; ?>
						</div>
				</div>
			</div>
		<?php endif; ?>
		</div>