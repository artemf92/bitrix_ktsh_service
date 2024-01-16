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
$themeSettings = gedeGetAdminParams();
$countPC = $themeSettings['INDEX']['OPTIONS']['BLOCK_GALLERY_TYPE_1_PC']['VALUE'];
$countMOB = $themeSettings['INDEX']['OPTIONS']['BLOCK_GALLERY_TYPE_1_MOB']['VALUE'];

$classPC = '';
$classMob = '';
switch ($countPC){
    case 3:
        $classPC = 'col-lg-4';
        break;
    case 4:
        $classPC = 'col-lg-3';
        break;
    case 6:
        $classPC = 'col-lg-2';
        break;
    default:
        $classPC = 'col-lg-5th';
        break;
}
switch ($countMOB){
    case 2:
        $classMob = 'col-6';
        break;
    default:
        $classMob = 'col-12';
        break;
}
?>
<div class="b-our-works-wrap">

    <div class="b-gallery-plitka b-flex">
        <? foreach ($arResult['GALLERY'] as $image): ?>
            <div class="<?=$classMob?> <?=$classPC?> col-md-4 b-item">
                <div class="b-inner">
                    <a href="<?= $image['BIG'] ?>" data-fancybox="gallery">
                        <img class="img-responsive" src="<?= $image['MED'] ?>"/>
                    </a>
                </div>
            </div>
        <? endforeach; ?>

    </div>
</div>