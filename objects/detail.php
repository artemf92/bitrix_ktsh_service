<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Объекты");
?>
<div class="container">
  <div class="site-content with-sidebar">
    <div class="sidebar">
      <ul class="objects__tabs">
        <li class="objects__tab"><a href="https://dom.gosuslugi.ru/#!/houses" target="_blank" rel="nofollow">Общая информация</a></li>
        <li class="objects__tab"><a href="#tab2">Провайдеры</a></li>
        <li class="objects__tab"><a href="#tab3">Документы</a></li>
        <li class="objects__tab"><a href="#tab4">Отчеты для жителей</a></li>
      </ul>
    </div>
    <div class="content">
      <? $APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        "object",
        array(
          "ACTIVE_DATE_FORMAT" => "d.m.Y",
          "ADD_ELEMENT_CHAIN" => "Y",
          "ADD_SECTIONS_CHAIN" => "N",
          "AJAX_MODE" => "N",
          "AJAX_OPTION_ADDITIONAL" => "",
          "AJAX_OPTION_HISTORY" => "N",
          "AJAX_OPTION_JUMP" => "N",
          "AJAX_OPTION_STYLE" => "Y",
          "BROWSER_TITLE" => "-",
          "CACHE_GROUPS" => "Y",
          "CACHE_TIME" => "36000000",
          "CACHE_TYPE" => "A",
          "CHECK_DATES" => "Y",
          "DETAIL_URL" => "",
          "DISPLAY_BOTTOM_PAGER" => "Y",
          "DISPLAY_DATE" => "N",
          "DISPLAY_NAME" => "Y",
          "DISPLAY_PICTURE" => "Y",
          "DISPLAY_PREVIEW_TEXT" => "Y",
          "DISPLAY_TOP_PAGER" => "N",
          "ELEMENT_CODE" => $ELEMENT_CODE,
          "ELEMENT_ID" => "",
          "FIELD_CODE" => array(
            0 => "",
            1 => "",
          ),
          "IBLOCK_ID" => "14",
          "IBLOCK_TYPE" => "content",
          "IBLOCK_URL" => "",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
          "MESSAGE_404" => "",
          "META_DESCRIPTION" => "-",
          "META_KEYWORDS" => "-",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "PAGER_SHOW_ALL" => "N",
          "PAGER_TEMPLATE" => ".default",
          "PAGER_TITLE" => "Страница",
          "PROPERTY_CODE" => array(
            0 => "PROVIDERS",
            1 => "",
          ),
          "SET_BROWSER_TITLE" => "Y",
          "SET_CANONICAL_URL" => "N",
          "SET_LAST_MODIFIED" => "N",
          "SET_META_DESCRIPTION" => "Y",
          "SET_META_KEYWORDS" => "N",
          "SET_STATUS_404" => "N",
          "SET_TITLE" => "Y",
          "SHOW_404" => "N",
          "STRICT_SECTION_CHECK" => "N",
          "USE_PERMISSIONS" => "N",
          "USE_SHARE" => "N",
          "COMPONENT_TEMPLATE" => "object"
        ),
        false
      ); ?>
    </div>
  </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>