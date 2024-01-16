<div class="b-prices-table">
    <?php
    CModule::IncludeModule('iblock');
    $arResult = [];
    $arFilter = Array("IBLOCK_ID"=>"11", 'GLOBAL_ACTIVE'=>'Y');
    $dblist = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, true, Array());
    $i = 0;
    while($ar_result = $dblist->GetNext()) {
        $arResult[$i]['ID'] = $ar_result['ID'];
        $arResult[$i]['NAME'] = $ar_result['NAME'];
        if($ar_result['ID']){
            $arElSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_PRICE", "PROPERTY_UNIT");
            $arElFilter = Array("IBLOCK_ID"=>"11", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", 'SECTION_ID' => $ar_result['ID']);
            $res = CIBlockElement::GetList(Array(), $arElFilter, false, false, $arElSelect);
            $j=0;
            while($ob = $res->GetNextElement())
            {
                $arElFields = $ob->GetFields();

                $arResult[$i]['ELEMENTS'][$j]['ID'] = $arElFields['ID'];
                $arResult[$i]['ELEMENTS'][$j]['NAME'] = $arElFields['NAME'];
                $arResult[$i]['ELEMENTS'][$j]['PROPERTY_PRICE_VALUE'] = $arElFields['PROPERTY_PRICE_VALUE'];
                $arResult[$i]['ELEMENTS'][$j]['PROPERTY_UNIT_VALUE'] = $arElFields['PROPERTY_UNIT_VALUE'];
                $j++;
            }
        }
        $i++;
    }
    ?>
    <?php if(!empty($arResult)):
        $sectionsCount = count($arResult);
    ?>
        <?php foreach ($arResult as $result): ?>
            <?php if($sectionsCount > 1){ ?>
                <div class="b-price-title"><?=$result['NAME']?></div>
            <?php }?>
            <?php if(!empty($result['ELEMENTS'])): ?>
                <div class="table-responsive">
                    <table class="table">
                        <?php foreach($result['ELEMENTS'] as $list): ?>
                            <tr>
                                <td><?=$list['NAME']?></td>
                                <td class="b-price">
                                    <?=$list['PROPERTY_PRICE_VALUE']?>
                                    <?php if($list['PROPERTY_UNIT_VALUE']){ ?>
                                        <span class="b-price-unit"> <?=$list['PROPERTY_UNIT_VALUE']?></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <button data-form-title="<?=$list['NAME']?>" data-toggle="modal" data-target="#b-zapis-form" class="btn b-btn b-btn-primary">Заказать</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

</div>