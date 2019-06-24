<?
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\Entity\Validator\RegExp;

class BookTable extends Bitrix\Main\ORM\Data\DataManager {
	static function getTableName () {
		return 'book';
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
			]),
			new Fields\StringField('AUTHOR', [
				'required' => true,
				'validation' => function () {
					return [
						new RegExp('/\w+/')
					]
				}
			]),
			new Reference(
				'CATALOG',
				CatalogTable::class,
				Join::on('this.PUBLISHER_ID', 'ref.ID')
			)->configureJoinType('inner')
		]
	}
}
?>