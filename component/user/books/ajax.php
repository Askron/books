<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
CBitrixComponent::includeComponentClass('user:books');

if (array_key_exists('query', $_POST)) {
	echo json_encode(Books::getBookById($_POST['query']));
}
?>