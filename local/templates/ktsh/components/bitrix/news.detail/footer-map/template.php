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

$re = '/src="(.*?)"/';
preg_match_all($re, $arResult['PROPERTIES']['MAP']['~VALUE'], $matches);
$src = $matches[1][0];

?>
<div class="b-footer-map">
    <div class="map-script" id="YaMaps">
        <? //=$arResult['PROPERTIES']['MAP']['~VALUE']
        ?>
        <div class="map-content" itemscope itemtype="http://schema.org/Organization">
            <?php if ($arResult['PROPERTIES']['LOGO']['VALUE']) :
                $logo = CFile::ResizeImageGet($arResult['PROPERTIES']['LOGO']['VALUE'], array('width' => 600, 'height' => 600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            ?>
                <div class="map-logo">
                    <img class="img-fluid" data-src="<?= $logo['src'] ?>" />
                </div>
            <?php endif; ?>
            <?php if ($arResult['PROPERTIES']['ADDRESS']['VALUE']) : ?>
                <div class="map-address" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress"><?= $arResult['PROPERTIES']['ADDRESS']['~VALUE'] ?></div>
            <?php endif; ?>
            <?php if ($arResult['PROPERTIES']['PHONE']['VALUE']) : ?>
                <ul class="map-phones">
                    <?php foreach ($arResult['PROPERTIES']['PHONE']['VALUE'] as $phone) : ?>
                        <li itemprop="telephone"><?= $phone ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if ($arResult['PROPERTIES']['OTHERS']['~VALUE']['TEXT']) : ?>
                <div class="map-others"><?= $arResult['PROPERTIES']['OTHERS']['~VALUE']['TEXT'] ?></div>
            <?php endif; ?>
            <div class="b-map-socials">
                <? $APPLICATION->IncludeFile(
                    SITE_DIR . "include/header/socials.php",
                    array(),
                    array("MODE" => "php")
                ); ?>
            </div>
        </div>
    </div>
</div>

<script>
    YaMapsShown = false;
    $(document).ready(function() {

        $(window).scroll(function() {
            if (!YaMapsShown) {
                if ($(window).scrollTop() + $(window).height() > $(document).height() - 700) {
                    showYaMaps();
                    YaMapsShown = true;
                }
            }
        });

    });

    function showYaMaps() {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "<?= $src ?>";
        document.getElementById("YaMaps").appendChild(script);
    }
</script>