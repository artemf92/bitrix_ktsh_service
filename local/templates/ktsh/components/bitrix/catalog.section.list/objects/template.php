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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder() . '/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script> <!-- Создаём контейнер для карты -->
<div id="map" style="width: 100%; height: 550px">
</div>
<script type="text/javascript">
	ymaps.ready(init);

	function init() {
		var myMap = new ymaps.Map("map", {
			center: [54.75929354511059, 20.510370649999995],
			// zoom: 12,
			zoom: 10,
			controls: [

				'zoomControl', // Ползунок масштаба
				'rulerControl', // Линейка
				'routeButtonControl', // Панель маршрутизации
				'trafficControl', // Пробки
				'typeSelector', // Переключатель слоев карты
				'fullscreenControl', // Полноэкранный режим

				new ymaps.control.SearchControl({
					options: {
						size: 'large',
						provider: 'yandex#search'
					}
				})

			]
		});

		var myPlacemark = new ymaps.Placemark([54.74820659, 20.45834014], {
			hintContent: 'УК "КТСХ Сервис"',
			balloonContent: '236001 , Калининград, ул. Горького 176Г к. 2, п. 8'
		});

		myMap.geoObjects.add(myPlacemark);

		<? foreach ($arResult['SECTIONS'] as &$arSection) { ?>
			<?
			if ($arSection['UF_LOCATION']) {
				// $arSelect = array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_LOCATION");
				$arSelect = [];
				$arFilter = array("IBLOCK_ID" => 14, "SECTION_ID" => $arSection['ID']);
				$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
				$arObjects = [];
				while ($ob = $res->GetNextElement()) {
					$arObjects[] = $ob->GetFields();
				}
			?>
				var object_<?= $arSection['ID'] ?> = new ymaps.Placemark(<?= $arSection['UF_LOCATION'] ?>, {
					hintContent: 'ЖК "<?= $arSection['NAME'] ?>"',
					balloonContent: `
			<strong>ЖК "<?= $arSection['NAME'] ?>"</strong>
			<ul>
				<? foreach ($arObjects as $obj) { ?>
				<li><a href="<?= $obj['DETAIL_PAGE_URL'] ?>"><?= $obj['NAME'] ?></a></li>
				<? } ?>
			`
				});
				myMap.geoObjects.add(object_<?= $arSection['ID'] ?>);
			<? } ?>
		<? } ?>
	}
</script>