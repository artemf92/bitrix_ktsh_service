<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Сайт управляющей компании КТСХ Сервис");
$APPLICATION->SetPageProperty("keywords", "КТСХ-Сервис");
$APPLICATION->SetPageProperty("title", "КТСХ-Сервис");
$APPLICATION->SetTitle("КТСХ-Сервис");

$indexOptions = $themeSettings['INDEX']['OPTIONS']['SORT_ORDER'];
$arOrder = explode(',', $indexOptions['VALUE']);

?>
<div class="b-home-content">
    <? $APPLICATION->IncludeFile(
        "/include/main/main.php",
        array(),
        array("MODE" => "php")
    ); ?>
    <?php //home slider
    ?>
    <div class="b-home-block" data-order="-1">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "home_slider",
            array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "content",
                "IBLOCK_ID" => "15",
                "NEWS_COUNT" => "20",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "",
                "FIELD_CODE" => array("ID"),
                "PROPERTY_CODE" => array("TITLE", "BACKGROUND_IMAGE"),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_BROWSER_TITLE" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_LAST_MODIFIED" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "3600",
                "CACHE_FILTER" => "Y",
                "CACHE_GROUPS" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "SET_STATUS_404" => "N",
                "SHOW_404" => "N",
                "MESSAGE_404" => "",
                "PAGER_BASE_LINK" => "",
                "PAGER_PARAMS_NAME" => "arrPager",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_ADDITIONAL" => ""
            )
        ); ?>
    </div>

    <?php //preim
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_PREIM']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_PREIM_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-preim" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_PREIM")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_PREIM_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-preim-block b-block">

                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "preim",
                    array(
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "AJAX_MODE" => "N",
                        "IBLOCK_TYPE" => "content",
                        "IBLOCK_ID" => "10",
                        "NEWS_COUNT" => "5",
                        "SORT_BY1" => "SORT",
                        "SORT_ORDER1" => "ASC",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER2" => "ASC",
                        "FILTER_NAME" => "",
                        "FIELD_CODE" => array("ID"),
                        "PROPERTY_CODE" => array("ICON", "TEXT"),
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "SET_TITLE" => "N",
                        "SET_BROWSER_TITLE" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "3600",
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "PAGER_TITLE" => "Новости",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => "",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "SET_STATUS_404" => "N",
                        "SHOW_404" => "N",
                        "MESSAGE_404" => "",
                        "PAGER_BASE_LINK" => "",
                        "PAGER_PARAMS_NAME" => "arrPager",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_ADDITIONAL" => ""
                    )
                ); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php //catalog
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_CATALOG']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_CATALOG_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-services" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_CATALOG")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_CATALOG_BACKGROUND_COLOR']['VALUE'] ?>">

            <div class="b-catalog-list-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <h2 class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/catalog-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </h2>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/catalog-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"catalog", 
	array(
		"VIEW_MODE" => "TEXT",
		"SHOW_PARENT_NAME" => "Y",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "2",
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"COMPONENT_TEMPLATE" => "catalog",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
		"FILTER_NAME" => "sectionsFilter",
		"CACHE_FILTER" => "N"
	),
	false
); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //services
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_SERVICES']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_SERVICES_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-objects" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_SERVICES")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_SERVICES_BACKGROUND_COLOR']['VALUE'] ?>">

            <div class="b-services-list-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <h2 class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/service-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </h2>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/service-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "main_objects",
                        array(
                            "ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "COUNT_ELEMENTS" => "N",
                            "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                            "FILTER_NAME" => "sectionsFilter",
                            "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
                            "IBLOCK_ID" => "14",
                            "IBLOCK_TYPE" => "content",
                            "SECTION_CODE" => "",
                            "SECTION_FIELDS" => array("", ""),
                            "SECTION_ID" => "",
                            "SECTION_URL" => "",
                            "SECTION_USER_FIELDS" => array("", ""),
                            "SHOW_PARENT_NAME" => "Y",
                            "TOP_DEPTH" => "2",
                            "VIEW_MODE" => "LINE"
                        )
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //akcii
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_AKCII']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_AKCII_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-news" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_AKCII")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_AKCII_BACKGROUND_COLOR']['VALUE'] ?>">

            <div class="b-services-list-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <h2 class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/akcii-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </h2>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/akcii-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"akcii-list-ajax", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "Y",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "PRICE",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "/news/",
		"PAGER_PARAMS_NAME" => "arrPager",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "akcii-list-ajax",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //text block
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_TEXT']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_TEXT_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-text" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_TEXT")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_TEXT_BACKGROUND_COLOR']['VALUE'] ?>">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.detail",
                "home_detail",
                array(
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "USE_SHARE" => "N",
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "content",
                    "IBLOCK_ID" => "16",
                    "ELEMENT_ID" => "105",
                    "ELEMENT_CODE" => "",
                    "CHECK_DATES" => "N",
                    "FIELD_CODE" => array("ID", "PREVIEW_PICTURE"),
                    "PROPERTY_CODE" => array("SUBTITLE", "PHOTO_POSITION"),
                    "SET_TITLE" => "N",
                    "SET_CANONICAL_URL" => "N",
                    "SET_BROWSER_TITLE" => "N",
                    "BROWSER_TITLE" => "-",
                    "SET_META_KEYWORDS" => "N",
                    "META_KEYWORDS" => "-",
                    "SET_META_DESCRIPTION" => "N",
                    "META_DESCRIPTION" => "-",
                    "SET_STATUS_404" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "ADD_ELEMENT_CHAIN" => "N",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "USE_PERMISSIONS" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "CACHE_GROUPS" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => "Страница",
                    "PAGER_TEMPLATE" => "",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "STRICT_SECTION_CHECK" => "N",
                    "PAGER_BASE_LINK" => "",
                    "PAGER_PARAMS_NAME" => "arrPager",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "AJAX_OPTION_HISTORY" => "N"
                )
            ); ?>
        </div>
    <?php endif; ?>

    <?php //text block 2
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_TEXT2']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_TEXT2_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-text2" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_TEXT2")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_TEXT2_BACKGROUND_COLOR']['VALUE'] ?>">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.detail",
                "home_detail",
                array(
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "USE_SHARE" => "N",
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "content",
                    "IBLOCK_ID" => "16",
                    "ELEMENT_ID" => "106",
                    "ELEMENT_CODE" => "",
                    "CHECK_DATES" => "N",
                    "FIELD_CODE" => array("ID", "PREVIEW_PICTURE"),
                    "PROPERTY_CODE" => array("SUBTITLE", "PHOTO_POSITION"),
                    "SET_TITLE" => "N",
                    "SET_CANONICAL_URL" => "N",
                    "SET_BROWSER_TITLE" => "N",
                    "BROWSER_TITLE" => "-",
                    "SET_META_KEYWORDS" => "N",
                    "META_KEYWORDS" => "-",
                    "SET_META_DESCRIPTION" => "N",
                    "META_DESCRIPTION" => "-",
                    "SET_STATUS_404" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "ADD_ELEMENT_CHAIN" => "N",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "USE_PERMISSIONS" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "CACHE_GROUPS" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => "Страница",
                    "PAGER_TEMPLATE" => "",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "STRICT_SECTION_CHECK" => "N",
                    "PAGER_BASE_LINK" => "",
                    "PAGER_PARAMS_NAME" => "arrPager",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "AJAX_OPTION_HISTORY" => "N"
                )
            ); ?>
        </div>
    <?php endif; ?>

    <?php //about block
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_ABOUT']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_ABOUT_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-about" class="b-home-block b-about-block" data-order="<?= array_keys($arOrder, "BLOCK_ABOUT")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_ABOUT_BACKGROUND_COLOR']['VALUE'] ?>">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.detail",
                "home_detail",
                array(
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "USE_SHARE" => "N",
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "content",
                    "IBLOCK_ID" => "16",
                    "ELEMENT_ID" => "107",
                    "ELEMENT_CODE" => "",
                    "CHECK_DATES" => "N",
                    "FIELD_CODE" => array("ID", "PREVIEW_PICTURE"),
                    "PROPERTY_CODE" => array("SUBTITLE", "PHOTO_POSITION"),
                    "SET_TITLE" => "N",
                    "SET_CANONICAL_URL" => "N",
                    "SET_BROWSER_TITLE" => "N",
                    "BROWSER_TITLE" => "-",
                    "SET_META_KEYWORDS" => "N",
                    "META_KEYWORDS" => "-",
                    "SET_META_DESCRIPTION" => "N",
                    "META_DESCRIPTION" => "-",
                    "SET_STATUS_404" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "ADD_ELEMENT_CHAIN" => "N",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "USE_PERMISSIONS" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "CACHE_GROUPS" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => "Страница",
                    "PAGER_TEMPLATE" => "",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "STRICT_SECTION_CHECK" => "N",
                    "PAGER_BASE_LINK" => "",
                    "PAGER_PARAMS_NAME" => "arrPager",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "N",
                    "AJAX_OPTION_HISTORY" => "N"
                )
            ); ?>

        </div>
    <?php endif; ?>

    <?php //projects block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_PROJECTS']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_PROJECTS_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-reports" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_PROJECTS")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_PROJECTS_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-polezno-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <h4 class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/projects-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </h4>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/projects-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "projects-list-no-detail",
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "N",
                            "IBLOCK_TYPE" => "content",
                            "IBLOCK_ID" => "12",
                            "NEWS_COUNT" => "8",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "arrFilter",
                            "FIELD_CODE" => array(
                                0 => "ID",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "IMAGE",
                                2 => "",
                            ),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "PAGER_TITLE" => "Новости",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "COMPONENT_TEMPLATE" => "projects-list-no-detail",
                            "STRICT_SECTION_CHECK" => "N"
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //cert block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_CERT']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_CERT_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-cert" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_CERT")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_CERT_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-cert-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <h3 class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/cert-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </h3>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/cert-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "cert-list",
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "N",
                            "IBLOCK_TYPE" => "content",
                            "IBLOCK_ID" => "3",
                            "NEWS_COUNT" => "99",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "arrFilter",
                            "FIELD_CODE" => array("ID"),
                            "PROPERTY_CODE" => array("IMAGE"),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "PAGER_TITLE" => "Новости",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => ""
                        )
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //polezno block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_POLEZNO']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_POLEZNO_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-job" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_POLEZNO")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_POLEZNO_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-polezno-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <h4 class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/polezno-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </h4>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/polezno-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "vacancy-list-no-detail",
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "N",
                            "IBLOCK_TYPE" => "content",
                            "IBLOCK_ID" => "9",
                            "NEWS_COUNT" => "4",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "arrFilter",
                            "FIELD_CODE" => array("ID"),
                            "PROPERTY_CODE" => array("GALLERY"),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "PAGER_TITLE" => "Новости",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => ""
                        )
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //personal block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_PERSONAL']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_PERSONAL_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-personal" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_PERSONAL")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_PERSONAL_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-partners-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <div class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/personal-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/personal-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "personal-list",
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "N",
                            "IBLOCK_TYPE" => "content",
                            "IBLOCK_ID" => "8",
                            "NEWS_COUNT" => "99",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "arrFilter",
                            "FIELD_CODE" => array("ID", "DETAIL_PICTURE"),
                            "PROPERTY_CODE" => array("PHOTO"),
                            "CHECK_DATES" => "N",
                            "DETAIL_URL" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "PAGER_TITLE" => "Новости",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => ""
                        )
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //price block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_PRICE']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_PRICE_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-price" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_PRICE")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_PRICE_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-price-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <div class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/price-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/price-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeFile(
                        "/include/home/price-table.php",
                        array(),
                        array("MODE" => "php")
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //faq block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_FAQ']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_FAQ_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-faq" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_FAQ")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_FAQ_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-faq-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <div class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/faq-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/faq-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeFile(
                        "/include/faq/faq.php",
                        array(),
                        array("MODE" => "php")
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //gallery block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_GALLERY']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_GALLERY_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        $galleryType = $themeSettings['INDEX']['OPTIONS']['BLOCK_GALLERY_TYPE']['VALUE'];

        ?>
        <div id="block-gallery" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_GALLERY")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_GALLERY_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-gallery-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <div class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/gallery-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/gallery-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <?php if ($galleryType == 1) { ?>
                        <?php

                        ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:news.detail",
                            "plitka",
                            array(

                                "DISPLAY_DATE" => "Y",
                                "DISPLAY_DATE" => "Y",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                "AJAX_MODE" => "N",
                                "IBLOCK_TYPE" => "other",
                                "IBLOCK_ID" => "5",
                                "ELEMENT_ID" => "",
                                "ELEMENT_CODE" => "for_home",
                                "CHECK_DATES" => "Y",
                                "FIELD_CODE" => array("ID"),
                                "PROPERTY_CODE" => array("GALLERY"),
                                "IBLOCK_URL" => "",
                                "DETAIL_URL" => "",
                                "SET_TITLE" => "N",
                                "SET_CANONICAL_URL" => "N",
                                "SET_BROWSER_TITLE" => "N",
                                "BROWSER_TITLE" => "-",
                                "SET_META_KEYWORDS" => "N",
                                "META_KEYWORDS" => "-",
                                "SET_META_DESCRIPTION" => "N",
                                "META_DESCRIPTION" => "-",
                                "SET_STATUS_404" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "ADD_ELEMENT_CHAIN" => "N",
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "USE_PERMISSIONS" => "N",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "3600",
                                "CACHE_GROUPS" => "Y",
                                "DISPLAY_TOP_PAGER" => "N",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "PAGER_TITLE" => "Страница",
                                "PAGER_TEMPLATE" => "",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "SHOW_404" => "Y",
                                "MESSAGE_404" => "",
                                "STRICT_SECTION_CHECK" => "N",
                                "PAGER_BASE_LINK" => "",
                                "PAGER_PARAMS_NAME" => "arrPager",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "AJAX_OPTION_HISTORY" => "N"
                            )
                        ); ?>
                    <?php } ?>

                    <?php if ($galleryType == 2) { ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:news.detail",
                            "primery_rabot",
                            array(
                                "DISPLAY_DATE" => "Y",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                "AJAX_MODE" => "N",
                                "IBLOCK_TYPE" => "other",
                                "IBLOCK_ID" => "5",
                                "ELEMENT_ID" => "",
                                "ELEMENT_CODE" => "for_home",
                                "CHECK_DATES" => "Y",
                                "FIELD_CODE" => array("ID"),
                                "PROPERTY_CODE" => array("GALLERY"),
                                "IBLOCK_URL" => "",
                                "DETAIL_URL" => "",
                                "SET_TITLE" => "N",
                                "SET_CANONICAL_URL" => "N",
                                "SET_BROWSER_TITLE" => "N",
                                "BROWSER_TITLE" => "-",
                                "SET_META_KEYWORDS" => "N",
                                "META_KEYWORDS" => "-",
                                "SET_META_DESCRIPTION" => "N",
                                "META_DESCRIPTION" => "-",
                                "SET_STATUS_404" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "ADD_ELEMENT_CHAIN" => "N",
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "USE_PERMISSIONS" => "N",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "3600",
                                "CACHE_GROUPS" => "Y",
                                "DISPLAY_TOP_PAGER" => "N",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "PAGER_TITLE" => "Страница",
                                "PAGER_TEMPLATE" => "",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "SHOW_404" => "Y",
                                "MESSAGE_404" => "",
                                "STRICT_SECTION_CHECK" => "N",
                                "PAGER_BASE_LINK" => "",
                                "PAGER_PARAMS_NAME" => "arrPager",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "AJAX_OPTION_HISTORY" => "N"
                            )
                        ); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //feedbacks block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_FEEDBACKS']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_FEEDBACKS_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-feedbacks" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_FEEDBACKS")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_FEEDBACKS_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-gallery-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <div class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/feedbacks-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/feedbacks-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "reviews",
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "N",
                            "IBLOCK_TYPE" => "content",
                            "IBLOCK_ID" => "13",
                            "NEWS_COUNT" => "20",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array("ID"),
                            "PROPERTY_CODE" => array("LINK", "RATING"),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "PAGER_TITLE" => "Новости",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => ""
                        )
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php //video block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_VIDEO']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_VIDEO_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-video" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_VIDEO")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_VIDEO_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-partners-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <div class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/video-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/video-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "video",
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "N",
                            "IBLOCK_TYPE" => "content",
                            "IBLOCK_ID" => "17",
                            "NEWS_COUNT" => "99",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array("ID"),
                            "PROPERTY_CODE" => array("LINK"),
                            "CHECK_DATES" => "N",
                            "DETAIL_URL" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "PAGER_TITLE" => "Новости",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => ""
                        )
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php //partners block 
    ?>
    <?php if ($indexOptions['LIST']['BLOCK_PARTNERS']["VALUE"] !== "N") : ?>
        <?php
        $imageFromSettings = $themeSettings['INDEX']['OPTIONS']['BLOCK_PARTNERS_BACKGROUND_IMAGE']['VALUE'];
        if ($imageFromSettings && strlen($imageFromSettings) > 0) {
            $bgImage = $imageFromSettings;
        } else {
            $bgImage = false;
        }
        ?>
        <div id="block-partners" class="b-home-block" data-order="<?= array_keys($arOrder, "BLOCK_PARTNERS")[0]; ?>" style="background-image: url(<?= $bgImage ?>); background-position: 50% 50%; background-size: cover; background-color: <?= $themeSettings['INDEX']['OPTIONS']['BLOCK_PARTNERS_BACKGROUND_COLOR']['VALUE'] ?>">
            <div class="b-partners-block b-block">
                <div class="container">
                    <div class="b-block-title-wrap">
                        <div class="b-block-title">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/partners-block-title.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                        <div class="b-block-subtitle">
                            <? $APPLICATION->IncludeFile(
                                "/include/home/partners-block-subtitle.php",
                                array(),
                                array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "partners-slider",
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "N",
                            "IBLOCK_TYPE" => "content",
                            "IBLOCK_ID" => "7",
                            "NEWS_COUNT" => "99",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "arrFilter",
                            "FIELD_CODE" => array("ID"),
                            "PROPERTY_CODE" => array("IMAGE"),
                            "CHECK_DATES" => "N",
                            "DETAIL_URL" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "PAGER_TITLE" => "Новости",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => ""
                        )
                    ); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div id="block-documents" class="b-home-block" data-order="8">
        <div class="b-documents-block b-block">
            <div class="container">
                <div class="b-block-title-wrap">
                    <div class="b-block-title">
                        <? $APPLICATION->IncludeFile(
                            "/include/home/documents-block-title.php",
                            array(),
                            array("MODE" => "php")
                        ); ?>
                    </div>
                    <div class="b-block-subtitle">
                        <? $APPLICATION->IncludeFile(
                            "/include/home/documents-block-subtitle.php",
                            array(),
                            array("MODE" => "php")
                        ); ?>
                    </div>
                </div>
                <? $APPLICATION->IncludeFile(
                    "/include/documents/documents.php",
                    array(),
                    array("MODE" => "php")
                ); ?>
            </div>
        </div>
    </div>
    
    <div id="block-safety" class="b-home-block" data-order="10">
        <div class="b-documents-block b-block">
            <div class="container">
                <div class="b-block-title-wrap">
                    <div class="b-block-title">
                        <? $APPLICATION->IncludeFile(
                            "/include/home/safety-block-title.php",
                            array(),
                            array("MODE" => "php")
                        ); ?>
                    </div>
                    <div class="b-block-subtitle">
                        <? $APPLICATION->IncludeFile(
                            "/include/home/safety-block-subtitle.php",
                            array(),
                            array("MODE" => "php")
                        ); ?>
                    </div>
                </div>
                <? $APPLICATION->IncludeFile(
                    "/include/safety/safety.php",
                    array(),
                    array("MODE" => "php")
                ); ?>
            </div>
        </div>
    </div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>