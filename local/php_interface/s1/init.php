<?
function debug($obj)
{
  $class = $GLOBALS['USER']->IsAdmin() ? '' : 'hidden';
  echo ('<pre class="' . $class . '">' . print_r($obj, true) . '</pre>');
}