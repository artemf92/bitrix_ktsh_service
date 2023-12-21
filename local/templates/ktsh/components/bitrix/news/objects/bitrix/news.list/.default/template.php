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
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script> <!-- Создаём контейнер для карты -->
<div id="map" style="width: 100%; height: 550px">
</div>
<script type="text/javascript">
	ymaps.ready(init);

	function init() {
		var myMap = new ymaps.Map("map", {
			center: [54.71161430, 20.51037065],
			zoom: 12,
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

		<? foreach ($arResult["ITEMS"] as $arItem) : ?>
			var object_<?= $arItem['ID'] ?> = new ymaps.Placemark([54.72388305, 20.47432607], {
				hintContent: '<?= $arItem['NAME'] ?>',
				balloonContent: '<a href="<?=$arItem['DETAIL_PAGE_URL']?>">Смотреть подробнее</a>'
			});

			myMap.geoObjects.add(object_<?= $arItem['ID'] ?>);
		<? endforeach; ?>
	}
</script>