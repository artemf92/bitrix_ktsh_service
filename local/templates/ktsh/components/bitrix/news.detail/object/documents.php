<div class="b-documents-wrapper">
  <?php
  CModule::IncludeModule('iblock');
  $arrResult = [];
  $arFilter = array("IBLOCK_ID" => "21", 'GLOBAL_ACTIVE' => 'Y', 'ID' => 48);
  $dblist = CIBlockSection::GetList(array(), $arFilter, true, array());
  $i = 0;
  while ($ar_result = $dblist->GetNext()) {
    $arrResult[$i]['ID'] = $ar_result['ID'];
    $arrResult[$i]['NAME'] = $ar_result['NAME'];
    if ($ar_result['ID']) {
      $arElSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_FILE");
      $arElFilter = array("IBLOCK_ID" => "21", "ACTIVE" => "Y", 'SECTION_ID' => $ar_result['ID'], "PROPERTY_FOR_OBJECT" => $arResult['ID']);
      $res = CIBlockElement::GetList(array("ID" => "DESC"), $arElFilter, false, false, $arElSelect);
      $j = 0;
      while ($ob = $res->GetNextElement()) {
        $arElFields = $ob->GetFields();

        $arrResult[$i]['ELEMENTS'][$j]['ID'] = $arElFields['ID'];
        $arrResult[$i]['ELEMENTS'][$j]['NAME'] = $arElFields['NAME'];
        $arrResult[$i]['ELEMENTS'][$j]['PROPERTY_FILE_VALUE'] = $arElFields['PROPERTY_FILE_VALUE'];
        $arrResult[$i]['ELEMENTS'][$j]['~PROPERTY_FILE_VALUE'] = $arElFields['~PROPERTY_QUESTION_VALUE'];
        $j++;
      }
    }
    $i++;
  }
  ?>
  <?php if (!empty($arrResult)) :
    $sectionsCount = count($arrResult);
  ?>
    <div class="b-documents-list">
      <?php foreach ($arrResult as $result) : ?>
        <div class="b-documents-inner">
          <?php if ($sectionsCount > 1) { ?>
            <div class="b-title"><?= $result['NAME'] ?></div>
          <?php } ?>
          <?php if (!empty($result['ELEMENTS'])) : ?>
            <div class="b-documents-elements">
              <?php foreach ($result['ELEMENTS'] as $element) : ?>
                <?php
                //$visibleClass = 'b-none';
                //if($element['PROPERTY_VISIBLE_VALUE'] == 'Да') $visibleClass = '';
                $arFile = CFile::GetByID($element['PROPERTY_FILE_VALUE'])->Fetch();
                $fileName = preg_replace('/(.pdf)|(.doc)|(.docx)/', '', $arFile['ORIGINAL_NAME']);
                switch ($arFile['CONTENT_TYPE']) {
                  case 'application/pdf':
                    $iconClass = 'b-pdf';
                    break;
                  case 'application/msword':
                    $iconClass = 'b-doc';
                    break;
                  case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                    $iconClass = 'b-doc';
                    break;
                }
                ?>
                <div class="b-documents-element">
                  <div class="b-doctitle"><?= $element['NAME'] ?></div>
                  <div class="b-docfile">
                    <a href="<?= $arFile['SRC'] ?>" download="<?= $fileName ?>" rel="nofollow">
                      <span class="icon <?= $iconClass ?>">

                      </span>
                      <span class=" name">
                        Скачать
                        <? //= $fileName 
                        ?>
                      </span>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
    <? //<a href="/documents" class="btn b-btn btn-primary btn-center">Все документы</a>
    ?>
  <?php endif; ?>
</div>