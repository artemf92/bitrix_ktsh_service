<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/gedestudio.axiland/classes/general/GedestudioContent.php");
CModule::IncludeModule('iblock');

$data = GedestudioContent::getRequestDataBody();
$res = [];

if(!empty($data) && isset($data['productID'])) {

    $html = '';
    $product = GedestudioContent::getProductById('2', $data['productID']);

    if (!empty($product)) {
        $productId = $product['ID'];
        $productName = $product['NAME'];
        $mainImage = CFile::ResizeImageGet($product['DETAIL_PICTURE'], array('width' => 1920, 'height' => 1080), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $mainImageSmall = CFile::ResizeImageGet($product['DETAIL_PICTURE'], array('width' => 400, 'height' => 400), BX_RESIZE_IMAGE_PROPORTIONAL, true);

        if(isset($product['IMAGES']) && !empty($product['IMAGES'])){
            foreach ($product['IMAGES'] as $key => $additionaImage){
                $product['ADDITIONAL_IMAGES'][$key] =  CFile::GetPath($additionaImage);
            }
        }

        $res['send'] = 'success';
        $res['product'] = [
            'name' => $product['NAME'],
            'preview_text' => $product['PREVIEW_TEXT'] ?? false,
            'detail_text' => $product['DETAIL_TEXT'] ?? false,
            'price' => $product['PROPERTY_PRICE_VALUE'] ?? false,
            'main_image' => $mainImage['src'] ?? false,
            'main_image_small' => $mainImageSmall['src'] ?? false,
            'additional_images' => $product['ADDITIONAL_IMAGES'] ?? false,
        ];

    } else {
        $res['send'] = 'failed';
        $res['message'] = 'Not found';
    }

}

$encoding = mb_internal_encoding();

if($encoding == 'Windows-1251'){
    echo json_encode( mb_convert_encoding($res, 'utf-8', 'windows-1251'));
} else {
    echo json_encode($res);
}