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
<div class="objects__detail">
	<div class="objects__content-tab" id="tab1">
		<div id="contact" class="contact-block section-tabs section-menu">
			<div class="contact-container">
				<div class="contact-holder">
					<h2>Генеральный директор</h2>

					<h3>Маркин Алексей Викторович*</h3>
					<div class="mail">markin_av@dsinv.ru</div>

				</div>
				<div class="contact-holder">
					<h2>Комендант</h2>

					<h3>Бойченко Алексей Сергеевич</h3>
					<div class="phone">+7 (905) 559-22-74</div>
					<div class="mail">Boichenko_AS@dsinv.ru</div>

				</div>
				<div class="contact-holder">
					<h2>Персональный клиентский менеджер</h2>

					<h3>Шахова Дарья Сергеевна</h3>
					<div class="phone">+7 (916) 050 08 51</div>
					<div class="mail">Azarova_DS@dsinv.ru</div>

				</div>

			</div>
		</div>
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum impedit illum aliquam suscipit recusandae nisi iure. Harum placeat quaerat, illo fugit explicabo quam sapiente eaque praesentium iste animi nam velit maxime magnam nihil qui corrupti iure enim minus eveniet nesciunt. Reiciendis, sed velit maiores non vel necessitatibus atque sint quia pariatur obcaecati quo quibusdam itaque alias unde delectus eaque voluptatum nulla, nesciunt exercitationem perspiciatis reprehenderit? Asperiores illo voluptatum minus laborum dolore possimus necessitatibus soluta excepturi placeat, atque nostrum illum dolorem, vero explicabo cumque nam qui quos nobis esse quae dolores? Laborum repellat consequuntur porro optio veritatis nobis non voluptate explicabo.
	</div>
	<div class="objects__content-tab" id="tab2">
		<div class="h3 tab-title">Провайдеры</div>
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum impedit illum aliquam suscipit recusandae nisi iure. Harum placeat quaerat, illo fugit explicabo quam sapiente eaque praesentium iste animi nam velit maxime magnam nihil qui corrupti iure enim minus eveniet nesciunt. Reiciendis, sed velit maiores non vel necessitatibus atque sint quia pariatur obcaecati quo quibusdam itaque alias unde delectus eaque voluptatum nulla, nesciunt exercitationem perspiciatis reprehenderit? Asperiores illo voluptatum minus laborum dolore possimus necessitatibus soluta excepturi placeat, atque nostrum illum dolorem, vero explicabo cumque nam qui quos nobis esse quae dolores? Laborum repellat consequuntur porro optio veritatis nobis non voluptate explicabo.
	</div>
	<div class="objects__content-tab" id="tab3">
		<div class="h3 tab-title">Документы</div>
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum impedit illum aliquam suscipit recusandae nisi iure. Harum placeat quaerat, illo fugit explicabo quam sapiente eaque praesentium iste animi nam velit maxime magnam nihil qui corrupti iure enim minus eveniet nesciunt. Reiciendis, sed velit maiores non vel necessitatibus atque sint quia pariatur obcaecati quo quibusdam itaque alias unde delectus eaque voluptatum nulla, nesciunt exercitationem perspiciatis reprehenderit? Asperiores illo voluptatum minus laborum dolore possimus necessitatibus soluta excepturi placeat, atque nostrum illum dolorem, vero explicabo cumque nam qui quos nobis esse quae dolores? Laborum repellat consequuntur porro optio veritatis nobis non voluptate explicabo.
	</div>
	<div class="objects__content-tab" id="tab4">
		<div class="h3 tab-title">Отчеты</div>
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum impedit illum aliquam suscipit recusandae nisi iure. Harum placeat quaerat, illo fugit explicabo quam sapiente eaque praesentium iste animi nam velit maxime magnam nihil qui corrupti iure enim minus eveniet nesciunt. Reiciendis, sed velit maiores non vel necessitatibus atque sint quia pariatur obcaecati quo quibusdam itaque alias unde delectus eaque voluptatum nulla, nesciunt exercitationem perspiciatis reprehenderit? Asperiores illo voluptatum minus laborum dolore possimus necessitatibus soluta excepturi placeat, atque nostrum illum dolorem, vero explicabo cumque nam qui quos nobis esse quae dolores? Laborum repellat consequuntur porro optio veritatis nobis non voluptate explicabo.
	</div>
</div>
<div class="news-detail">
	<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])) : ?>
		<img class="detail_picture" border="0" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>" height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>" alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>" title="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?>" />
	<? endif ?>
	<? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]) : ?>
		<span class="news-date-time"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></span>
	<? endif; ?>
	<? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && ($arResult["FIELDS"]["PREVIEW_TEXT"] ?? '')) : ?>
		<p><?= $arResult["FIELDS"]["PREVIEW_TEXT"];
				unset($arResult["FIELDS"]["PREVIEW_TEXT"]); ?></p>
	<? endif; ?>
	<? if ($arResult["NAV_RESULT"]) : ?>
		<? if ($arParams["DISPLAY_TOP_PAGER"]) : ?><?= $arResult["NAV_STRING"] ?><br /><? endif; ?>
	<? echo $arResult["NAV_TEXT"]; ?>
	<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?><br /><?= $arResult["NAV_STRING"] ?><? endif; ?>
	<? elseif ($arResult["DETAIL_TEXT"] <> '') : ?>
		<? //echo $arResult["DETAIL_TEXT"]; ?>
	<? else : ?>
		<? echo $arResult["PREVIEW_TEXT"]; ?>
	<? endif ?>
	<div style="clear:both"></div>
	<br />
	<? foreach ($arResult["FIELDS"] as $code => $value) :
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code) {
	?><?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?
																											if (!empty($value) && is_array($value)) {
																											?><img border="0" src="<?= $value["SRC"] ?>" width="<?= $value["WIDTH"] ?>" height="<?= $value["HEIGHT"] ?>"><?
																																																																																	}
																																																																																} else {
																																																																																		?><?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $value; ?><?
																																																																																																																		}
																																																																																																																			?><br />
<? endforeach;
	foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty) : ?>

	<?= $arProperty["NAME"] ?>:&nbsp;
	<? if (is_array($arProperty["DISPLAY_VALUE"])) : ?>
		<?= implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]); ?>
	<? else : ?>
		<?= $arProperty["DISPLAY_VALUE"]; ?>
	<? endif ?>
	<br />
<? endforeach;
	if (array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y") {
?>
	<div class="news-detail-share">
		<noindex>
			<?
			$APPLICATION->IncludeComponent(
				"bitrix:main.share",
				"",
				array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
		</noindex>
	</div>
<?
	}
?>
</div>