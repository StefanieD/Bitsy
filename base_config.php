<?php

//include bitsy base elements
require_once('base/Autoload.php');
require_once('base/Config.php');



//set basic paths of framework
/*$config = Bitsy_Config::getInstance();
$config->set("bitsy_path", dirname(__FILE__));
$config->set("bitsy_base_path", $config->get("bitsy_path") . "/base");*/


Bitsy_Autoload::register();
?>