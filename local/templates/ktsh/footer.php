<? if ($curPage != SITE_DIR . "index.php" && $APPLICATION->GetProperty("FULL_WIDE") != "Y") : ?>
    </div> <? //container 
            ?>
<? endif; ?>
<? if ($curPage != SITE_DIR . "index.php") : ?>
    </div> <? //b-site-inner 
            ?>
<? endif; ?>
</div> <? //b-content 
        ?>
<footer id="site-footer" class="b-site-footer">
    <?php
    CModule::IncludeModule('iblock');
    $mapElementActive = false;
    $mapElement = CIBlockElement::GetByID("67");
    if ($mapElementRes = $mapElement->GetNext()) {
        if ($mapElementRes['ACTIVE'] == 'Y') {
            $mapElementActive = true;
        }
    }
    ?>
    <?php if ($mapElementActive && $APPLICATION->GetCurDir() != '/objects/') : ?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.detail",
            "footer-map",
            array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "USE_SHARE" => "N",
                "SHARE_HIDE" => "N",
                "SHARE_TEMPLATE" => "",
                "SHARE_HANDLERS" => array("delicious"),
                "SHARE_SHORTEN_URL_LOGIN" => "",
                "SHARE_SHORTEN_URL_KEY" => "",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "news",
                "IBLOCK_ID" => "6",
                "ELEMENT_ID" => "67",
                "ELEMENT_CODE" => "",
                "CHECK_DATES" => "N",
                "FIELD_CODE" => array("ID"),
                "PROPERTY_CODE" => array("COORDS"),
                "IBLOCK_URL" => "news.php?ID=#IBLOCK_ID#\"",
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
                "ADD_SECTIONS_CHAIN" => "Y",
                "ADD_ELEMENT_CHAIN" => "N",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "USE_PERMISSIONS" => "N",
                "GROUP_PERMISSIONS" => array(),
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "CACHE_GROUPS" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TEMPLATE" => "",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "SHOW_404" => "N",
                "MESSAGE_404" => "",
                "STRICT_SECTION_CHECK" => "N",
                "PAGER_BASE_LINK" => "",
                "PAGER_PARAMS_NAME" => "arrPager",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N"
            )
        ); ?>
    <? else : ?>
        <section class="footer-contacts">
            <div class="container">
                <div class="footer-contacts__wrap">
                    <div class="footer-contacts__phone">
                        <div class="b-header-phone b-header-phone--footer">
                            <span>
                                <? $APPLICATION->IncludeFile(
                                    SITE_DIR . "include/header/phone.php",
                                    array(),
                                    array("MODE" => "php")
                                ); ?>
                            </span>
                        </div>
                        <? //<div class="footer-contacts__phone-text">Круглосуточный клиентский центр<br>Звонок бесплатный</div> 
                        ?>
                    </div>
                    <button data-toggle="modal" data-target="#b-zapis-form" class="btn btn-ajax b-btn b-btn-primary">Электронное обращение</button>
                </div>
            </div>
        </section>
        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom-wrap">
                    <div class="footer__copyright">
                        © <?= date('Y') ?>
                    </div>
                    <div class="footer__menu">
                        <ul class="footer__links">
                            <li class="footer__link"><a href="/politics/">Политика обработки персональных данных</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</footer>
<?php
$themeSettings = gedeGetAdminParams();

?>
</div> <? //site-wrap 
        ?>

<?php
$fixedButtonText = $themeSettings['INDEX']['OPTIONS']['BLOCK_FIXED_BUTTON_NAME']['VALUE'] ?? false;
$fixedButtonShowPc = $themeSettings['INDEX']['OPTIONS']['BLOCK_FIXED_BUTTON_SHOW_PC']['VALUE'] ?? false;
$fixedButtonShowMobile = $themeSettings['INDEX']['OPTIONS']['BLOCK_FIXED_BUTTON_SHOW_MOBILE']['VALUE'] ?? false;
$fixedButtonShowPosition = $themeSettings['INDEX']['OPTIONS']['BLOCK_FIXED_BUTTON_POSITION']['VALUE'] ?? false;

$showPCClass = '';
$showMobileClass = '';
$positionClass = $fixedButtonShowPosition == 1 ? 'position-left' : 'position-right';

if ($fixedButtonShowPc == 'Y') {
    $showPCClass = 'b-show-pc';
}
if ($fixedButtonShowMobile == 'Y') {
    $showMobileClass = 'b-show-mobile';
}
?>
<?php if ($fixedButtonText) : ?>
    <div class="b-fixed-button <?= $showPCClass ?> <?= $showMobileClass ?> <?= $positionClass ?>">
        <button data-form-title="<?= $fixedButtonText ?>" data-toggle="modal" data-target="#b-zapis-form" class="btn btn-ajax b-btn b-btn-primary"><?= $fixedButtonText ?></button>
    </div>
<?php endif; ?>

<div class="modal b-modal fade" id="success-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="success-title"><?= GetMessage('SUCCESS_TITLE'); ?></div>
                <div class="success-text"><?= GetMessage('SUCCESS_TEXT'); ?></div>
                <button type="button" class="btn b-btn b-btn-primary" data-dismiss="modal"><?= GetMessage('CLOSE_MODAL_TEXT'); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="search-bar">
    <input type="text" id="searchbar-text">
    <span class="search-bar__nav search-bar__nav--prev"></span>
    <span class="search-bar__nav search-bar__nav--next"></span>
    <span class="search-bar__clear" data-fa-search-clear>
        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
        </svg>
    </span>
</div>

<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/bootstrap.min.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.fancybox.min.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/swiper.min.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/slick.min.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.validate.min.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.min.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/axios.min.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/priority-nav.min.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.matchHeight.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/ttlazy.min.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/script.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/search.js"); ?>
<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/custom.js"); ?>



<? $APPLICATION->IncludeFile(
    SITE_DIR . "include/whatsap.php",
    array(),
    array("MODE" => "php")
); ?>
<? $APPLICATION->IncludeFile(
    SITE_DIR . "include/codes/footer.php",
    array(),
    array("MODE" => "php")
); ?>


</body>

</html>