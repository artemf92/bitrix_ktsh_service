<div class="b-faq-wrapper">
    <?php
    CModule::IncludeModule('iblock');
    $arResult = [];
    $arFilter = array("IBLOCK_ID" => "23", 'GLOBAL_ACTIVE' => 'Y');
    $dblist = CIBlockSection::GetList(array("SORT" => "ASC"), $arFilter, true, array());
    $i = 0;
    while ($ar_result = $dblist->GetNext()) {
        $arResult[$i]['ID'] = $ar_result['ID'];
        $arResult[$i]['NAME'] = $ar_result['NAME'];
        if ($ar_result['ID']) {
            $arElSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_QUESTION", "PROPERTY_ANSWER", "PROPERTY_VISIBLE", "PROPERTY_BUTTON_TEXT", "PROPERTY_BUTTON_LINK", "PROPERTY_FILE");
            $arElFilter = array("IBLOCK_ID" => "23", "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", 'SECTION_ID' => $ar_result['ID']);
            $res = CIBlockElement::GetList(array('ID' => "ASC"), $arElFilter, false, false, $arElSelect);
            $j = 0;
            while ($ob = $res->GetNextElement()) {
                $arElFields = $ob->GetFields();

                $arResult[$i]['ELEMENTS'][$j]['ID'] = $arElFields['ID'];
                $arResult[$i]['ELEMENTS'][$j]['NAME'] = $arElFields['NAME'];
                $arResult[$i]['ELEMENTS'][$j]['PROPERTY_QUESTION_VALUE'] = $arElFields['PROPERTY_QUESTION_VALUE'];
                $arResult[$i]['ELEMENTS'][$j]['PROPERTY_ANSWER_VALUE'] = $arElFields['PROPERTY_ANSWER_VALUE'];
                $arResult[$i]['ELEMENTS'][$j]['~PROPERTY_QUESTION_VALUE'] = $arElFields['~PROPERTY_QUESTION_VALUE'];
                $arResult[$i]['ELEMENTS'][$j]['~PROPERTY_ANSWER_VALUE'] = $arElFields['~PROPERTY_ANSWER_VALUE'];
                $arResult[$i]['ELEMENTS'][$j]['PROPERTY_VISIBLE_VALUE'] = $arElFields['PROPERTY_VISIBLE_VALUE'];
                $arResult[$i]['ELEMENTS'][$j]['~PROPERTY_VISIBLE_VALUE'] = $arElFields['~PROPERTY_VISIBLE_VALUE'];
                $arResult[$i]['ELEMENTS'][$j]['PROPERTY_BUTTON_TEXT_VALUE'] = $arElFields['PROPERTY_BUTTON_TEXT_VALUE'];
                $arResult[$i]['ELEMENTS'][$j]['PROPERTY_BUTTON_LINK_VALUE'] = $arElFields['PROPERTY_BUTTON_LINK_VALUE'];
                $arResult[$i]['ELEMENTS'][$j]['PROPERTY_FILE_VALUE'] = $arElFields['PROPERTY_FILE_VALUE'];
                $j++;
            }
        }
        $i++;
    }
    ?>
    <?php if (!empty($arResult)) :
        $sectionsCount = count($arResult);
    ?>
        <div class="b-faq-list">
            <?php foreach ($arResult as $result) : ?>
                <div class="b-faq-inner">
                    <?php if ($sectionsCount > 1) { ?>
                        <div class="b-title"><?= $result['NAME'] ?></div>
                    <?php } ?>
                    <?php if (!empty($result['ELEMENTS'])) : ?>
                        <div class="b-faq-elements">
                            <?php foreach ($result['ELEMENTS'] as $element) : ?>
                                <?php
                                $visibleClass = 'b-none';
                                if ($element['PROPERTY_VISIBLE_VALUE'] == 'Да') $visibleClass = '';
                                ?>
                                <div class="b-faq-element">
                                    <div class="b-question"><?= $element['~PROPERTY_QUESTION_VALUE']['TEXT'] ?></div>
                                    <div class="b-answer <?= $visibleClass ?>">
                                        <?= $element['~PROPERTY_ANSWER_VALUE']['TEXT'] ?>
                                        <? if ($element['PROPERTY_FILE_VALUE']) { ?>
                                            <br>
                                            <a href="<?= CFile::GetPath($element['PROPERTY_FILE_VALUE']) ?>" download="<?= $element['NAME'] ?>" class="mt-2 b-btn b-btn-primary"><?= $element['PROPERTY_BUTTON_TEXT_VALUE'] ?: 'Скачать' ?></a>
                                        <? } ?>
                                        <? if ($element['PROPERTY_BUTTON_LINK_VALUE']) { ?>
                                            <br>
                                            <a href="<?= $element['PROPERTY_BUTTON_LINK_VALUE'] ?>" rel="nofollow" target="_blank" class="mt-2 b-btn b-btn-primary"><?= $element['PROPERTY_BUTTON_TEXT_VALUE'] ?: 'Перейти' ?></a>
                                        <? } ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>