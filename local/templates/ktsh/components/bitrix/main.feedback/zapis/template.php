<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>

<div class="zapis-form">
    <div class="b-zapis-form-title"></div>
    <div class="b-zapis-form-subtitle"><?=GetMessage('ZAPIS_FORM_SUBTITLE')?></div>
    <form method="post" class="sendForm" enctype="multipart/form-data"
          data-form="zapis-form"
          data-duplicateMessages="<?= $arParams["DUPLICATE_MESSAGES"]; ?>"
          data-url="<?= SITE_TEMPLATE_PATH . $arParams["AJAX_HANDLER"]; ?>"
    >
        <div class="form-elements">
            <? foreach ($arResult["ELEMENT"] as $element) { ?>

                <?= $element[0]; ?>
            <? } ?>
        </div>

        <input type="hidden" name="emailTo" value="<?= $arParams["EMAIL_TO"]; ?>"/>
        <input type="hidden" name="eventMessageId" value="<?= $arParams["EVENT_MESSAGE_ID"]; ?>"/>
        <input type="hidden" name="duplicateMessages" value="<?= $arParams['DUPLICATE_MESSAGES']; ?>"/>
        <input type="hidden" name="formName" value="<?= $arParams['FORM_NAME']; ?>"/>
        <input type="hidden" name="yaMetricTarget" value="<?= $arParams['YA_METRIC_TARGET']; ?>"/>
        <input type="hidden" name="yaMetricID" value="<?= $arParams['YA_METRIC_ID']; ?>"/>

        <input name="submit" type="submit" data-text="<?= $arParams["FORM_NAME_SUBMIT"]; ?>"
               value="<?= $arParams["FORM_NAME_SUBMIT"]; ?>"
               class="btn b-btn b-btn-primary"
        />
        <div class="b-politics"><?= GetMessage('POLITICS_1'); ?> <a href="/politika/" target="_blank"><?= GetMessage('POLITICS_2'); ?></a></div>
    </form>
</div>

