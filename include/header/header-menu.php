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
</nav>