<?php

namespace Sprint\Migration;

class Version20240123192845 extends Version
{
    protected $description   = "Правки блока \"Режим работы\"";
    protected $moduleVersion = "4.6.1";

    /**
     * @throws Exceptions\MigrationException
     * @throws Exceptions\RestartException
     * @return bool|void
     */
    public function up()
    {
        $this->getExchangeManager()
             ->IblockElementsImport()
             ->setExchangeResource('iblock_elements.xml')
             ->setLimit(20)
             ->execute(function ($item) {
                 $this->getHelperManager()
                      ->Iblock()
                      ->saveElementByXmlId(
                          $item['iblock_id'],
                          $item['fields'],
                          $item['properties']
                      );
             });
    }

    /**
     * @throws Exceptions\MigrationException
     * @throws Exceptions\RestartException
     * @return bool|void
     */
    public function down()
    {
        $this->getExchangeManager()
             ->IblockElementsImport()
             ->setExchangeResource('iblock_elements.xml')
             ->setLimit(10)
             ->execute(function ($item) {
                 $this->getHelperManager()
                     ->Iblock()
                     ->deleteElementByXmlId(
                         $item['iblock_id'],
                         $item['fields']['XML_ID']
                     );
             });
    }
}
