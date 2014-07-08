<?php 
require_once ('./libs/smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('./view');
$smarty->setCompileDir('./libs/smarty/compiledTemplates');
$smarty->setCacheDir('./libs/smarty/cache');
$smarty->setConfigDir('./libs/smarty/config');

$mysqli = new mysqli("sql2.olympe.in", "q324nmbn", "Droopy93", "q324nmbn");
// $mysqli->query("INSERT INTO lexique SET name='title', fr='Bienvenue', en='Welcome'");

$lexique = new Lexique($mysqli);
$smarty = $lexique->assign($smarty, "fr");

class Lexique {
	private $table = array();
	
	function __construct($mysqli) {
		$mysqli->query("SELECT * FROM lexique");
		$table = $mysqli->fetch_assoc();
	}
	
	private function assign($smarty, $languageCode) {
		foreach($table as $entry) {
			$smarty->assign($entry["name"], $entry[$languageCode]);
		}
		
		return $smarty;
	}
}
