<?php require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');

if(!empty($_REQUEST['eventMessageId']))
{
    $res = [];
    if(SITE_CHARSET == 'windows-1251')
    {
        foreach($_REQUEST as $key => $name)
        {
            $_REQUEST[$key] = mb_convert_encoding($_REQUEST[$key], 'windows-1251', 'utf-8');
        }
    }

    $result = CEventMessage::GetByID($_REQUEST['eventMessageId']);
    $arMessage = $result->Fetch();

    if(!empty($arMessage)){
        $el = new CIBlockElement;
        $data = array(
            'EVENT_NAME' => $arMessage['EVENT_NAME'],
            'DUPLICATE' => $_REQUEST['duplicateMessages'],
            'LID' => $arMessage['LID'],
            'MESSAGE_ID' => $_REQUEST['eventMessageId'],
            'C_FIELDS' => $_REQUEST
        );

        $event = new CEvent;

        $arEventFields = $_REQUEST;

        //Save file
        if(!empty($_FILES))
        {
            foreach($_FILES as $key => $file){
                $data['FILE'] = array(CFile::SaveFile($file, 'main'));
            }

        }

        $PROP = array();
        $PROP['FORM_NAME'] = $arEventFields['formName'] ?? '';
        $PROP['NAME'] = $arEventFields['userName'] ?? '';
        $PROP['PHONE'] = $arEventFields['userPhone'] ?? '';
        $PROP['EMAIL'] = $arEventFields['userEmail'] ?? '';
        $PROP['ADDRESS'] = $arEventFields['userAddress'] ?? '';
        $PROP['DATE'] = $arEventFields['userDate'] ?? '';
        $PROP['COUNT'] = $arEventFields['userCount'] ?? '';
        $PROP['COMMENT'] = $arEventFields['userComment'] ?? '';
        $PROP['FILE'] = $data['FILE'] ?? '';


        $iblockID = '18';

        if(isset($_REQUEST['resultsIblockId'])){
            $iblockID = $_REQUEST['resultsIblockId'];
        }

        $arLoadProductArray = Array(
            "MODIFIED_BY" => 1,
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID" => $iblockID,
            "PROPERTY_VALUES" => $PROP,
            "DATE_ACTIVE_FROM" => date('d.m.Y'),
            "NAME" => "Заявка от " . date('d.m.Y'),
            "ACTIVE" => "Y"
        );

        if ($PRODUCT_ID = $el->Add($arLoadProductArray))
            //echo "New ID: " . $PRODUCT_ID;
        

        $event->SendImmediate(
            $arMessage['EVENT_NAME'],
            SITE_ID,
            $arEventFields,
            $_REQUEST['duplicateMessages'],
            $_REQUEST['eventMessageId'],
            $data['FILE']
        );

        $res['send'] = 'success';

    } else {
        $res['send'] = 'failed';
    }
    echo json_encode($res);
}