<div class="b-faq-wrapper">
        <?php
        CModule::IncludeModule('iblock');
        $arResult = [];
        $arFilter = Array("IBLOCK_ID"=>"4", 'GLOBAL_ACTIVE'=>'Y');
        $dblist = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, true, Array());
        $i = 0;
        while($ar_result = $dblist->GetNext()) {
            $arResult[$i]['ID'] = $ar_result['ID'];
            $arResult[$i]['NAME'] = $ar_result['NAME'];
            if($ar_result['ID']){
                $arElSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_QUESTION", "PROPERTY_ANSWER", "PROPERTY_VISIBLE");
                $arElFilter = Array("IBLOCK_ID"=>"4", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", 'SECTION_ID' => $ar_result['ID']);
                $res = CIBlockElement::GetList(Array('ID' => "DESC"), $arElFilter, false, false, $arElSelect);
                $j=0;
                while($ob = $res->GetNextElement())
                {
                    $arElFields = $ob->GetFields();

                    $arResult[$i]['ELEMENTS'][$j]['ID'] = $arElFields['ID'];
                    $arResult[$i]['ELEMENTS'][$j]['NAME'] = $arElFields['NAME'];
                    $arResult[$i]['ELEMENTS'][$j]['PROPERTY_QUESTION_VALUE'] = $arElFields['PROPERTY_QUESTION_VALUE'];
                    $arResult[$i]['ELEMENTS'][$j]['PROPERTY_ANSWER_VALUE'] = $arElFields['PROPERTY_ANSWER_VALUE'];
                    $arResult[$i]['ELEMENTS'][$j]['~PROPERTY_QUESTION_VALUE'] = $arElFields['~PROPERTY_QUESTION_VALUE'];
                    $arResult[$i]['ELEMENTS'][$j]['~PROPERTY_ANSWER_VALUE'] = $arElFields['~PROPERTY_ANSWER_VALUE'];
                    $arResult[$i]['ELEMENTS'][$j]['PROPERTY_VISIBLE_VALUE'] = $arElFields['PROPERTY_VISIBLE_VALUE'];
                    $arResult[$i]['ELEMENTS'][$j]['~PROPERTY_VISIBLE_VALUE'] = $arElFields['~PROPERTY_VISIBLE_VALUE'];
                    $j++;
                }
            }
            $i++;
        }
        ?>
        <?php if(!empty($arResult)):
            $sectionsCount = count($arResult);
        ?>
            <div class="b-faq-list">
            <?php foreach ($arResult as $result): ?>
                <div class="b-faq-inner">
                    <?php if($sectionsCount > 1){ ?>
                        <div class="b-title"><?=$result['NAME']?></div>
                    <?php } ?>
                    <?php if(!empty($result['ELEMENTS'])): ?>
                        <div class="b-faq-elements">
                            <?php foreach ($result['ELEMENTS'] as $element):?>
                            <?php
                                $visibleClass = 'b-none';
                                if($element['PROPERTY_VISIBLE_VALUE'] == 'Да') $visibleClass = '';
                            ?>
                                <div class="b-faq-element">
                                    <div class="b-question"><?=$element['~PROPERTY_QUESTION_VALUE']['TEXT']?></div>
                                    <div class="b-answer <?=$visibleClass?>"><?=$element['~PROPERTY_ANSWER_VALUE']['TEXT']?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            </div>
        <?php endif;?>
</div>