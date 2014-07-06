<?php
require_once ('./libs/smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('./view');
$smarty->setCompileDir('./libs/smarty/compiledTemplates');
$smarty->setCacheDir('./libs/smarty/cache');
$smarty->setConfigDir('./libs/smarty/config');

$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');

// echo "Hello it's ".date("H:i:s");