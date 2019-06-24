<?
use \Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
CJSCore::Init(array('jquery2'));
?>
<form class="books-form">
	<label>
		<?=Loc::getMessage('TYPE_ID');?>
		<input class="books-form__input" type="text">
	</label>
	<button class="books-form__submit" type="submit"><?=Loc::getMessage('SEARCH');?></button>
</form>
<div class="books-table">
	<div class="books-table__row books-table__row-header">
		<div class="books-table__cell"><?=Loc::getMessage('NAME');?></div>
		<div class="books-table__cell"><?=Loc::getMessage('AUTHOR');?></div>
		<div class="books-table__cell"><?=Loc::getMessage('CATALOG');?></div>
	</div>
</div>
<script type="text/javascript">
	let componentPath = '<?=$componentPath;?>';
</script>