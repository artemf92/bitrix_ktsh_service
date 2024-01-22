<?php

namespace Sprint\Migration;


class Version20240122232957 extends Version
{
    protected $description = "Настройки от 22.01 модуля Конструктор";

    protected $moduleVersion = "4.6.1";

    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Option()->saveOption(array (
  'MODULE_ID' => 'gedestudio.axiland',
  'NAME' => '~bsm_stop_date',
  'VALUE' => 'WQl3CzNYAFZ5AwYAUXQKcEpVAQ==',
));
    }

    public function down()
    {
        //your code ...
    }
}
