<?
if(!empty($arResult['PROPERTIES']['GALLERY']['VALUE'])):
    $gallery = $arResult['PROPERTIES']['GALLERY']['VALUE'];
    foreach($gallery as $key => $item):
        $minImage = CFile::ResizeImageGet($item, array('width'=>145, 'height'=>120), BX_RESIZE_IMAGE_EXACT, true);
        $medImage = CFile::ResizeImageGet($item, array('width'=>900, 'height'=>500), BX_RESIZE_IMAGE_EXACT, true);
        $bigImage = CFile::ResizeImageGet($item, array('width'=>1920, 'height'=>1080), BX_RESIZE_IMAGE_PROPORTIONAL , true);
        $arResult['GALLERY'][$key]['MIN'] = $minImage['src'];
        $arResult['GALLERY'][$key]['MED'] = $medImage['src'];
        $arResult['GALLERY'][$key]['BIG'] = $bigImage['src'];

    endforeach;
endif;