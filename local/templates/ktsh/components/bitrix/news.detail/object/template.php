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
$this->addExternalCss(SITE_TEMPLATE_PATH . '/css/tablesaw.css');
$this->addExternalJs(SITE_TEMPLATE_PATH . '/js/tablesaw.jquery.js');
$this->addExternalJs(SITE_TEMPLATE_PATH . '/js/tablesaw-init.js');
?>
<div class="objects__detail">
	<div class="objects__content-tab" id="tab1">
		<? if ($arResult['PROPERTIES']['LINK_GIS']['VALUE_XML_ID'] == 'Y') { ?>
			<br>
			<p>Информация по Вашему МКД размещена в Государственной информационной системе жилищно-коммунального хозяйства (ГИС ЖКХ) и доступна для Вас - <a href="https://dom.gosuslugi.ru/#!/houses" rel="nofollow" target="_blank">https://dom.gosuslugi.ru/#!/houses</a></p>
			<?/*<div class="mt-2">
				<a href="https://dom.gosuslugi.ru/#!/houses" rel="nofollow" target="_blank" class="b-btn b-btn-primary">Общая информация</a>
			</div>*/ ?>
		<? } ?>
		<? if ($arResult['PROPERTIES']['HOUSEMANAGER']['VALUE']) { ?>
			<p>По вопросам эксплуатации и обслуживания здания и оборудования Вашего МКД — контактное лицо управляющей компании КТСХ - Сервис</p>
			<div id="contact" class="contact-block section-tabs section-menu mt-2">
				<div class="contact-container">
					<? foreach ($arResult['PROPERTIES']['HOUSEMANAGER']['VALUE'] as $key => $item) { ?>
						<div class="contact-holder">
							<h2><?= $item['SUB_VALUES']['HOUSEMANAGER_POST']['VALUE'] ?></h2>
							<? if ($item['SUB_VALUES']['HOUSEMANAGER_DESC']['VALUE']) { ?>
								<h3><?= $item['SUB_VALUES']['HOUSEMANAGER_DESC']['VALUE'] ?></h3>
							<? } ?>
							<? if ($item['SUB_VALUES']['HOUSEMANAGER_PHONE']['VALUE']) { ?>
								<div class="phone"><a href="tel:<?= $item['SUB_VALUES']['HOUSEMANAGER_PHONE']['VALUE'] ?>"><?= $item['SUB_VALUES']['HOUSEMANAGER_PHONE']['VALUE'] ?></a></div>
							<? } ?>
							<? if ($item['SUB_VALUES']['HOUSEMANAGER_EMAIL']['VALUE']) { ?>
								<div class="mail"><a href="mailto:<?= $item['SUB_VALUES']['HOUSEMANAGER_EMAIL']['VALUE'] ?>"><?= $item['SUB_VALUES']['HOUSEMANAGER_EMAIL']['VALUE'] ?></a></div>
							<? } ?>
						</div>
					<? } ?>
				</div>
			</div>
		<? } ?>
		<?= $arResult['DETAIL_TEXT'] ?>
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

<script>
	$(document).ready(function() {
		if ($(window).width() < 992) {
			$('.objects__detail table').each((i, el) => {
				const thead = $(el).find('tr:first')
				$(el).find('tbody').before('<thead>Test</thead>')
				$(el).find('thead').append(thead)
				
				$(el).addClass('tablesaw tablesaw-stack')
				$(el).attr('data-tablesaw-mode', 'stack')
			})
			Tablesaw.init();
		}
	})
</script>