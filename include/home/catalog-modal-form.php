<?php
$themeSettings = gedeGetAdminParams();
?>
<div class="modal b-modal fade" id="b-catalog-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php
                $yaMetricTarget = $themeSettings['INDEX']['OPTIONS']['BLOCK_YM_TARGET_NAME']['VALUE'] ?? false;
                $yaMetricID = $themeSettings['INDEX']['OPTIONS']['BLOCK_YM_ID']['VALUE'] ?? false;

                $APPLICATION->IncludeComponent(
                    "bitrix:main.feedback",
                    "catalogForm",
                    array(
                        "REQUIRED_FIELDS" => array(
                            0 => "PHONE",
                        ),
                        "COMPONENT_TEMPLATE" => "catalogForm",
                        "EVENT_MESSAGE_ID" => "34",
                        "RESULTS_IBLOCK_ID" => "19",
                        "YA_METRIC_TARGET" => $yaMetricTarget,
                        "YA_METRIC_ID" => $yaMetricID,
                        "ELEMENT_FORM" => array(
                            //COUNT, DATE, ADDRESS, COMMENT, FILE, NAME, PHONE, EMAIL
							//1 => "DATE",
                            0 => "COUNT",
							//2 => "ADDRESS",
							//3 => "COMMENT",
							//4 => "FILE",
                            5 => "NAME",
                            6 => "PHONE",
							//7 => "EMAIL",
                        ),
                        "USE_CAPTCHA" => "N",
                        "OK_TEXT" => "",
                        "FORM_NAME_SUBMIT" => $BUTTON_NAME,
                        "AJAX_HANDLER" => "/ajax/sendMessage.php",
                        "DUPLICATE_MESSAGES" => "N",
                    ),
                    false
                );?>
            </div>
        </div>
    </div>
</div>