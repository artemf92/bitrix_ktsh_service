<?
foreach($arResult["ITEMS"] as $key => $arItem):
    /*$image = CFile::ResizeImageGet($arItem['PROPERTIES']['BACKGROUND_IMAGE']['VALUE'], array('width'=>1920, 'height'=>689), BX_RESIZE_IMAGE_EXACT, true);
    $imageSmall = CFile::ResizeImageGet($arItem['PROPERTIES']['BACKGROUND_IMAGE_MOBILE']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_EXACT, true);
    $arResult['ITEMS'][$key]['BACKGROUND_IMAGE'] = $image['src'];
    $arResult['ITEMS'][$key]['BACKGROUND_IMAGE_MOBILE'] = $imageSmall['src'];*/
    $image = CFile::ResizeImageGet($arItem['PROPERTIES']['BACKGROUND_IMAGE']['VALUE'], array('width'=>1920, 'height'=>689), BX_RESIZE_IMAGE_EXACT, true);
    $imageSmall = CFile::ResizeImageGet($arItem['PROPERTIES']['BACKGROUND_IMAGE_MOBILE']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_EXACT, true);
    $arResult['ITEMS'][$key]['BACKGROUND_IMAGE'] = CFile::GetPath($arItem['PROPERTIES']['BACKGROUND_IMAGE']['VALUE']);
    $arResult['ITEMS'][$key]['BACKGROUND_IMAGE_MOBILE'] = CFile::GetPath($arItem['PROPERTIES']['BACKGROUND_IMAGE_MOBILE']['VALUE']);
endforeach;

$sliderAnchor = $_GET['slider'] ?? false;

if($sliderAnchor){
    foreach($arResult["ITEMS"] as $key => $arItem):
        if ($arItem['PROPERTIES']['ANCHOR']['VALUE'] == $sliderAnchor){
            $el = $arItem;
            unset($arResult["ITEMS"][$key]);
            array_unshift($arResult["ITEMS"], $el);
        }
    endforeach;
}