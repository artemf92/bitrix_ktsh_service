<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use Bitrix\Main\Loader;


if (!Loader::includeModule('gedestudio.axiland')) {
    echo Loc::getMessage('template.errors.module', ['#MODULE#' => 'gedestudio.axiland']);
    die();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.png"/>
    <link rel="icon" type="image/png" sizes="64x64" href="<?=SITE_TEMPLATE_PATH?>/favicon64.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_TEMPLATE_PATH?>/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/favicon16.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"  crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600;700&family=Exo+2:ital,wght@0,600;0,700;1,600;1,700&family=Merriweather:ital,wght@0,700;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,600;1,700&family=Open+Sans:ital,wght@0,700;1,600;1,700&family=Roboto:ital,wght@0,700;1,500;1,700&family=Ubuntu:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <? $APPLICATION->ShowMeta("keywords"); ?>
    <? $APPLICATION->ShowMeta("description"); ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <? $APPLICATION->ShowHead(); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css"); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/jquery.fancybox.min.css"); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/swiper.min.css"); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/hamburgers.min.css"); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/fonts/fontello/css/fontello.css"); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/priority-nav-core.css"); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/custom.css"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.min.js"); ?>
    <? $APPLICATION->IncludeFile(
        SITE_DIR . "include/codes/head.php",
        Array(),
        Array("MODE" => "php")
    ); ?>
</head>
<?
$curPage = $APPLICATION->GetCurPage(true);
$bodyClass = "";
if ($curPage == SITE_DIR . "index.php"):
    $bodyClass = "b-home-page";
else:
    $bodyClass = "b-other-page";
endif;
if($APPLICATION->GetProperty("without_h1") == "Y"){
    $bodyClass = $bodyClass . " b-without-h1";
}

?>
<body class="<?= $bodyClass; ?> <?=Gedestudio::pageClass()?>"  data-site-dir="<?=SITE_DIR?>">
<? $APPLICATION->IncludeFile(
    SITE_DIR . "include/codes/body.php",
    Array(),
    Array("MODE" => "php")
); ?>
<?php

$APPLICATION->ShowPanel();
$themeSettings = $APPLICATION->IncludeComponent('gedestudio.axiland:theme.settings', '', array(), false, array('HIDE_ICONS' => 'Y'));
$blackHeader = $themeSettings['COLORS']['OPTIONS']['BLACK_HEADER']['VALUE'] ?? false;
$blackHeaderMob = $themeSettings['COLORS']['OPTIONS']['BLACK_HEADER_MOB']['VALUE'] ?? false;

if($blackHeader == 'Y'){
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/black-header.css");
}
if($blackHeaderMob == 'Y'){
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/black-header-mob.css");
}

$showMobileSlogan = $themeSettings['INDEX']['OPTIONS']['BLOCK_MOBILE_HEADER_SETTING_SLOGAN']['VALUE'] ?? false;
$showMobileAddress = $themeSettings['INDEX']['OPTIONS']['BLOCK_MOBILE_HEADER_SETTING_ADDRESS']['VALUE'] ?? false;
$showMobilePhone = $themeSettings['INDEX']['OPTIONS']['BLOCK_MOBILE_HEADER_SETTING_PHONE']['VALUE'] ?? false;
$showMobileSocials = $themeSettings['INDEX']['OPTIONS']['BLOCK_MOBILE_HEADER_SETTING_SOCIALS']['VALUE'] ?? false;

$mobileSloganClass = '';
if($showMobileSlogan != 'Y'){
    $mobileSloganClass = 'b-hide-mobile';
}
$mobileAddressClass = '';
if($showMobileAddress != 'Y'){
    $mobileAddressClass = 'b-hide-mobile';
}
$mobilePhoneClass = '';
if($showMobilePhone != 'Y'){
    $mobilePhoneClass = 'b-hide-mobile';
}
$mobileSocialsClass = '';
if($showMobileSocials != 'Y'){
    $mobileSocialsClass = 'b-hide-mobile';
}

?>
<? CJSCore::Init(); ?>
<div class="site-wrap">
        <header class="header">
            <div class="container">
                <div class="b-up b-flex">
                    <div class="d-lg-none b-mobile-burger">
                        <button class="hamburger hamburger--slider" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"><?=GetMessage('GEDE_HEADER_MENU')?></span>
						</span>
                            <span class="b-burger-text"></span>
                        </button>
                    </div>
                    <div class="b-left b-flex">
                        <div class="b-logo">
                            <a href="/">
                                <? $APPLICATION->IncludeFile(
                                    SITE_DIR . "include/header/logo.php",
                                    Array(),
                                    Array("MODE" => "php")
                                ); ?>
                            </a>
                        </div>
                        <div class="b-slogan <?=$mobileSloganClass?>">
                            <? $APPLICATION->IncludeFile(
                                SITE_DIR . "include/header/slogan.php",
                                Array(),
                                Array("MODE" => "php")
                            ); ?>
                        </div>
                    </div>
                    <div class="b-center b-header-address <?=$mobileAddressClass?>">
                        <i class="icon-placeholder-filled-point"></i>
                        <span>
                            <? $APPLICATION->IncludeFile(
                                SITE_DIR . "include/header/address.php",
                                Array(),
                                Array("MODE" => "php")
                            ); ?>
                        </span>
                    </div>
                    <div class="b-right b-flex">
                        <div class="b-header-phone <?=$mobilePhoneClass?>">
                            <i class="icon-phone-call"></i>
                            <span>
                                <? $APPLICATION->IncludeFile(
                                    SITE_DIR . "include/header/phone.php",
                                    Array(),
                                    Array("MODE" => "php")
                                ); ?>
                            </span>
                        </div>
                        <div class="b-header-socials <?=$mobileSocialsClass?>">
                            <? $APPLICATION->IncludeFile(
                                SITE_DIR . "include/header/socials.php",
                                Array(),
                                Array("MODE" => "php")
                            ); ?>
                        </div>

                    </div>
                </div>
                <div class="b-down">
                    <? $APPLICATION->IncludeFile(
                        SITE_DIR . "include/header/header-menu.php",
                        Array(),
                        Array("MODE" => "php")
                    ); ?>
                </div>
            </div>
        </header>

        <div class="b-content">
            <? if ($curPage != SITE_DIR . "index.php"): ?>
                <div class="b-site-inner">
                    <? if($APPLICATION->GetProperty("hide_bc") != "Y"): ?>
                        <div class="container">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:breadcrumb",
                                "breadcrumbs",
                                array(
                                    "START_FROM" => "0",
                                    "PATH" => "",
                                    "SITE_ID" => "s1",
                                    "COMPONENT_TEMPLATE" => ".default"
                                ),
                                false
                            ); ?>
                        </div>
                    <? endif; ?>

                    <? if($APPLICATION->GetProperty("hide_h1") != "Y"): ?>
                        <div class="container">
                            <div class="b-page-title">
                                <h1><? $APPLICATION->ShowTitle() ?></h1>
                            </div>
                        </div>
                    <? endif;?>
            <? endif ?>