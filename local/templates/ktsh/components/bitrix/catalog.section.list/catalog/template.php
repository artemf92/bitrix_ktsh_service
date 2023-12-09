<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$countPC = $themeSettings['INDEX']['OPTIONS']['BLOCK_CATALOG_COUNT_PC']['VALUE'] ?? 4;
$countMOB = $themeSettings['INDEX']['OPTIONS']['BLOCK_CATALOG_COUNT_MOBILE']['VALUE'] ?? 1;
$buttonName = $themeSettings['INDEX']['OPTIONS']['BLOCK_CATALOG_BUTTON_NAME']['VALUE'] ?? false;

$classPC = '';
$classMob = '';
switch ($countPC){
    case 3:
        $classPC = 'col-lg-4';
        break;
    case 4:
        $classPC = 'col-lg-3';
        break;
    case 5:
        $classPC = 'col-lg-2';
        break;
    default:
        $classPC = 'col-lg-3';
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

<?php if(!empty($arResult['SECTIONS'])): ?>
    <div class="b-catalog-wrap">
        <ul class="nav b-nav-tabs mb-5" id="b-catalog-tabs" role="tablist">
            <?php foreach ($arResult['SECTIONS'] as $key => $section): ?>
                <li class="nav-item mr-3" role="presentation">
                    <button
                            class="btn b-btn b-btn-catalog <?=$key == 0 ? 'active' : ''?>"
                            id="b-catalog-tab-<?=$key?>"
                            data-toggle="tab"
                            data-target="#<?=$section['CODE']?>"
                            type="button"
                            role="tab"
                            aria-selected="<?=$key == 0 ? true : false?>"
                    >
                        <?=$section['NAME']?>
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content" id="b-catalog-tab-content">
            <?php foreach ($arResult['SECTIONS'] as $key => $section): ?>
                <div
                    class="tab-pane fade show <?=$key == 0 ? 'active' : ''?>"
                    id="<?=$section['CODE']?>"
                    role="tabpanel"
                >
                    <?php $products = GedestudioContent::getProductsList($arParams['IBLOCK_ID'], $section['ID']);?>

                    <?php if(empty($products['ELEMENTS'])){ ?>
                        <div class="b-empty text-center my-4"><?=GetMessage('AXI_CATALOG_EMPTY'); ?></div>
                    <?php } { ?>
                        <div class="b-catalog-products b-services-list">
                            <div class="row">
                                <?php $i = 0; ?>
                                <?php foreach ($products['ELEMENTS'] as $product): ?>
                                    <?php
                                    $image = CFile::ResizeImageGet($product['PREVIEW_PICTURE'], array('width'=>650, 'height'=>650), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                    if($i % 2 == 0){
                                        $itemClass = 'b-even';
                                    } else {
                                        $itemClass = 'b-odd';
                                    }
                                    ?>
                                    <div class="<?=$classMob?> <?=$classPC?> col-md-4 b-item <?=$itemClass?>">
                                        <div class="b-item-inner">
                                            <div class="b-img">
                                                <span data-toggle="modal" data-target="#b-catalog-detail-modal" data-product-id="<?=$product['ID']?>">
                                                    <img class="img-fluid" data-src="<?=$image['src']?>" alt="<?=$product['NAME']?>">
                                                </span>
                                            </div>
                                            <div class="b-item-content-wrap">
                                                <div class="b-item-content">
                                                    <div class="b-title">
                                                        <span data-toggle="modal" data-target="#b-catalog-detail-modal" data-product-id="<?=$product['ID']?>"><?=$product['NAME']?></span>
                                                    </div>
                                                    <div class="b-text">
                                                        <?php if($product['PREVIEW_TEXT']):?>
                                                            <?=$product['PREVIEW_TEXT']?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if($product['PRICE']):?>
                                                        <div class="b-price"><?=$product['PRICE']?> </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="b-list-buttons">
                                                    <?php if($buttonName): ?>
                                                        <button data-toggle="modal" data-form-title="<?=$product['NAME']?>" data-target="#b-catalog-form" class="btn b-btn b-btn-catalog b-btn-secondary"><?=$buttonName?></button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
    $APPLICATION->IncludeFile(
        SITE_DIR . "include/home/catalog-modal-form.php",
        array("BUTTON_NAME" => $buttonName),
        array("MODE" => "php")
    );
?>

    <div class="modal b-modal fade" id="b-catalog-detail-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="spinner-border d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="b-catalog-detail-modal-product">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="b-catalog-modal-images">
                                    <div class="b-catalog-modal-images-main">

                                    </div>
                                    <div class="b-catalog-modal-images-additional">

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <h3 class="b-catalog-modal-product-name"></h3>
                                <div class="b-catalog-modal-preview-text"></div>
                                <div class="b-catalog-modal-product-price"><span></span></div>
                                <?php if($buttonName): ?>
                                    <button id="catalog-modal-button" data-toggle="modal" data-form-title="" data-target="#b-catalog-form" class="btn b-btn b-btn-catalog b-btn-primary"><?=$buttonName?></button>
                                <?php endif; ?>
                                <div class="b-catalog-modal-detail-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
