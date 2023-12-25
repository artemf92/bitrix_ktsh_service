<?php
$themeSettings = gedeGetAdminParams();

$indexOptions = $themeSettings['INDEX']['OPTIONS']['SORT_ORDER'];
$arOrder = explode(',', $indexOptions['VALUE']);

$blocks = $themeSettings['INDEX']['OPTIONS']['SORT_ORDER']['LIST'];
$options = $themeSettings['INDEX']['OPTIONS'];

?>
<nav class="b-main-menu">
    <ul class="">
        <?php foreach ($blocks as $key => $value) : ?>
            <?php
            if ($value['VALUE'] != 'Y') continue;
            $menuBlock = Gedestudio::getMenuByBlockName($key);
            if ($options[$menuBlock['MENU_NAME']]['VALUE'] == '') continue;
            ?>
            <li data-order="<?= array_keys($arOrder, $key)[0]; ?>">
                <a href="<?= $options[$menuBlock['MENU_LINK']]['VALUE'] ?>"><?= $options[$menuBlock['MENU_NAME']]['VALUE'] ?></a>
                <? if ($options[$menuBlock['MENU_NAME']]['VALUE'] == 'Объекты') { ?>
                    <ul class="submenu">
                        <li><a href="#" class="link">Объект #1</a></li>
                    </ul>
                <? } ?>
            </li>
        <?php endforeach; ?>
        <? $APPLICATION->IncludeFile(
            "/include/header/menu-last-elements.php",
            array(),
            array("MODE" => "php")
        ); ?>
    </ul>
    <div class="d-lg-none menu-mobile-wrap">
        <hr>
        <a href="#" class="btn b-btn b-btn-primary btn-lk-mobile">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
            </div>
            Личный кабинет
        </a>
        <button data-toggle="modal" data-target="#b-zapis-form" data-form-title="Оставить заявку" class="btn b-btn b-btn-primary">Оставить заявку</button>
        <button class="mobile-search">
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#0898d4" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </span>
        </button>
    </div>
</nav>