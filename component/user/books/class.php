<?
use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;
if (!Loader::includeModule('highloadblock')) {
	echo 1;
}

class Books extends CBitrixComponent {

	private function getHLClassById (int $id) {
		$block = HighloadBlockTable::getById($id)->fetch();
		$entity = HighloadBlockTable::compileEntity($block);
		return $entity->getDataClass();
	}

	static function getBookById (int $id) {
		return self::getHLClassById(2)::getList([
			'select' => [
				'UF_NAME',
				'UF_AUTHOR',
				'CAT_' => 'CATALOG_NAME'
			],
			'filter' => ['UF_CATALOG_ID' => $_POST['query']],
			'runtime' => [
				new \Bitrix\Main\Entity\ReferenceField(
					'CATALOG_NAME',
					self::getHLClassById(1),
					['=this.UF_CATALOG_ID' => 'ref.ID']
				)
			]
		])->fetchAll();
	}

	function executeComponent () {
		$this->includeComponentTemplate();
	}
	
}
?>