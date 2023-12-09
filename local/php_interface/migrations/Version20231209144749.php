<?php

namespace Sprint\Migration;


class Version20231209144749 extends Version
{
    protected $description = "Стартовые модули";

    protected $moduleVersion = "4.6.1";

    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'sprint.migration',
  'NAME' => 'upgrade3_0cb1fbfb39557866ff1875c8228ecb05',
  'VALUE' => '1',
));
    }

    public function down()
    {
        //your code ...
    }
}
