<?
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\Entity\Validator\RegExp;

class CatalogTable extends Bitrix\Main\ORM\Data\DataManager {
	static function getTableName () {
		return 'catalog';
	}

	static function getMap () {
		return [
			new Fields\IntegerField('ID', [
				'primary' => true,
				'autocomplete' => true
			]),
			new Fields\StringField('NAME', [
				'required' => true,
				'validation' => function () {
					return [
						new RegExp('/\w+/')
					]
				}
			])
		]
	}
}
?>