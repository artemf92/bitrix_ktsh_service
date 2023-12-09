<?php
define('NO_KEEP_STATISTIC', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if(!empty($_REQUEST['eventMessageId']))
{
    if(SITE_CHARSET == 'windows-1251')
    {
        foreach($_REQUEST as $key => $name)
        {
            $_REQUEST[$key] = mb_convert_encoding($_REQUEST[$key], 'windows-1251', 'utf-8');
        }
    }

    $result = CEventMessage::GetByID($_REQUEST['eventMessageId']);
    $arMessage = $result->Fetch();

    $data = array(
        'EVENT_NAME' => $arMessage['EVENT_NAME'],
        'DUPLICATE' => $_REQUEST['duplicateMessages'],
        'LID' => $arMessage['LID'],
        'MESSAGE_ID' => $_REQUEST['eventMessageId'],
        'C_FIELDS' => $_REQUEST
    );


    /** Save file */
    if(!empty($_FILES))
    {
        $_FILES[0]['MODULE_ID'] = 'main';
        $data['FILE'] = array(CFile::SaveFile($_FILES[0], 'main'));
    }

    //\Bitrix\Main\Mail\Event::send($data);
}