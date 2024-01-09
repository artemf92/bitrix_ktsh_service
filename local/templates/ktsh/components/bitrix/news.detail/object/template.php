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

					<h3>Lorem, ipsum dolor.</h3>
					<div class="mail">asdsd_asdq@email.com</div>

				</div>

			</div>
		</div>
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum impedit illum aliquam suscipit recusandae nisi iure. Harum placeat quaerat, illo fugit explicabo quam sapiente eaque praesentium iste animi nam velit maxime magnam nihil qui corrupti iure enim minus eveniet nesciunt. Reiciendis, sed velit maiores non vel necessitatibus atque sint quia pariatur obcaecati quo quibusdam itaque alias unde delectus eaque voluptatum nulla, nesciunt exercitationem perspiciatis reprehenderit? Asperiores illo voluptatum minus laborum dolore possimus necessitatibus soluta excepturi placeat, atque nostrum illum dolorem, vero explicabo cumque nam qui quos nobis esse quae dolores? Laborum repellat consequuntur porro optio veritatis nobis non voluptate explicabo.
	</div>
	<div class="objects__content-tab" id="tab2">
		<div class="h3 tab-title">Провайдеры</div>
		<div class="object-providers">
			<?= $arResult['PROPERTIES']['PROVIDERS']['~VALUE']['TEXT'] ?>
		</div>
	</div>
	<div class="objects__content-tab" id="tab3">
		<div class="h3 tab-title">Документы</div>
		<? require('documents.php') ?>
	</div>
	<div class="objects__content-tab" id="tab4">
		<div class="h3 tab-title">Отчеты</div>
		<? require('news.php') ?>
	</div>
</div>
<div class="news-detail">
	<?
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