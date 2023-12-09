<?
if(!empty($arResult['PROPERTIES']['GALLERY']['VALUE'])):
    $gallery = $arResult['PROPERTIES']['GALLERY']['VALUE'];
    foreach($gallery as $key => $item):
        $medImage = CFile::ResizeImageGet($item, array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_EXACT, true);
        $bigImage = CFile::ResizeImageGet($item, array('width'=>1920, 'height'=>1080), BX_RESIZE_IMAGE_PROPORTIONAL , true);
        $arResult['GALLERY'][$key]['MED'] = $medImage['src'];
        $arResult['GALLERY'][$key]['BIG'] = $bigImage['src'];

    endforeach;
endif;