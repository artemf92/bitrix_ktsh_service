<div class="b-news-wrapper">
  <?php
  CModule::IncludeModule('iblock');
  $arrResult = [];
  $arFilter = array("IBLOCK_ID" => "12", 'GLOBAL_ACTIVE' => 'Y', /*'PROPERTY_FOR_OBJECT' => $arResult['ID']*/);
  $dblist = CIBlockElement::GetList(array(), $arFilter, false, false, array('ID', 'NAME', 'DETAIL_TEXT', 'DATE_CREATE', 'PROPERTY_IMAGE'));
  while ($ar_result = $dblist->GetNext()) {
    $arrResult[] = $ar_result;
  }
  // debug($arrResult);
  ?>
  <?php if (!empty($arrResult)) : ?>
    <div class="b-news-list">
      <div class="b-news-inner">
        <div class="b-news-elements">
          <?php foreach ($arrResult as $result) : ?>
            <div class="b-btn-secondary b-news-element p-4">
              <div class="b-image mb-3">
                <? $image = CFile::ResizeImageGet($result['PROPERTY_IMAGE_VALUE'], ['width' => 300, 'height' => 400]); ?>
                <? if ($image) { ?>
                  <img src="<?= $image['src'] ?>" alt="" class="rounded-lg">
                <? } ?>
              </div>
              <div class="b-title"><?= $result['NAME'] ?></div>
              <div class="b-text text-body">
                <?= $result['DETAIL_TEXT'] ?>
              </div>
              <div class="b-date mb-2 small text-muted"><?= $result['DATE_CREATE'] ?></div>
            </div>
            <hr>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>