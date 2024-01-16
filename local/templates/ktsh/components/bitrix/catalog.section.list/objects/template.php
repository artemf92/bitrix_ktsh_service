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

$arCoords = $arObjects = [];
foreach ($arResult['SECTIONS'] as $key => &$arSection) {
	if ($arSection['UF_LOCATION']) {
		$arCoords[] = $arSection['UF_LOCATION'];
		$arObjects[$key] = $arSection;
		$arSelect = array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_LOCATION", "PROPERTY_CITY");
		$arFilter = array("IBLOCK_ID" => 14, "SECTION_ID" => $arSection['ID']);
		$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
		while ($ob = $res->GetNextElement()) {
			$arObjects[$key]['ITEMS'][] = $ob->GetFields();
		}
	}
}
?>

<script src="https://api-maps.yandex.ru/2.1/?apikey=5e353c3e-e42e-49cb-becf-b093bebcbd53&lang=ru_RU" type="text/javascript"></script> <!-- Создаём контейнер для карты -->
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
				// 'rulerControl', // Линейка
				// 'routeButtonControl', // Панель маршрутизации
				// 'trafficControl', // Пробки
				// 'typeSelector', // Переключатель слоев карты
				// 'fullscreenControl', // Полноэкранный режим

				// new ymaps.control.SearchControl({
				// 	options: {
				// 		size: 'large',
				// 		provider: 'yandex#search'
				// 	}
				// })

			],
		});

		myMap.behaviors.disable('scrollZoom');


		var myPlacemark = new ymaps.Placemark([54.74820659, 20.45834014], {
			hintContent: 'УК "КТСХ Сервис"',
			balloonContent: `
			<p><strong>Офис</strong></p>
			<p>236001 , Калининград, ул. Горького 176Г к. 2, п. 8</p>`
		}, {
			preset: 'islands#redCircleDotIcon'
		});

		myMap.geoObjects.add(myPlacemark);

		let coords = [<?= implode(',', $arCoords) ?>];

		var myGeoObjects = [];

		<? foreach ($arObjects as $i => $object) { ?>
			myGeoObjects_<?= $object['ID'] ?> = new ymaps.GeoObject({
				geometry: {
					type: "Point",
					coordinates: <?= $arCoords[$i] ?>
				},
				properties: {
					clusterCaption: 'ЖК "<?= $object['NAME'] ?>"',
					balloonContentHeader: 'ЖК "<?= $object['NAME'] ?>"',
					balloonContentBody: `
						<ul class="list-group">
							<? foreach ($object['ITEMS'] as $obj) { ?>
							<li>
								<div class="mb-2">
									<p class="mb-1"><strong><?= $obj['PROPERTY_CITY_VALUE'] . ', ' . $obj['NAME'] ?></strong></p>
									<a href="<?= $obj['DETAIL_PAGE_URL'] ?>">Смотреть подробнее</a>
								</div>
							</li>
							<? } ?>
						`,
					// balloonContentFooter: 'Информация предоставлена:<br/>OOO "Рога и копыта"',
				}
			});
			myGeoObjects.push(myGeoObjects_<?= $object['ID'] ?>)
		<? } ?>

		var myClusterer = new ymaps.Clusterer({
			clusterDisableClickZoom: true
		});
		myClusterer.add(myGeoObjects);
		myMap.geoObjects.add(myClusterer);

		const query = new URLSearchParams(document.location.search)

		if (query.get('id')) {
			myMap.setCenter(myGeoObjects_<?= $_GET['id'] ?>.geometry._coordinates, 14, {
				duration: 1000
			});
			setTimeout(() => {
				var objectState = myClusterer.getObjectState(myGeoObjects_<?= $_GET['id'] ?>);
				if (objectState.isClustered) {
					objectState.cluster.state.set('activeObject', myGeoObjects_<?= $_GET['id'] ?>);
					myClusterer.balloon.open(objectState.cluster);
				} else if (objectState.isShown) {
					myGeoObjects_<?= $_GET['id'] ?>.balloon.open();
				}
			}, 1100);
		}
	}
</script>