BX(() => {
	$('.books-form__submit').on('click', (e) => {
		e.preventDefault();
		$.post(
			`${componentPath}/ajax.php`,
			{query: $('.books-form__input').val()},
			(res) => {
				$('.books-table__row:not(.books-table__row-header)').remove();
				$.each(JSON.parse(res), (k, v) => {
					$('.books-table').append(
`<div class="books-table__row">
	<div class="books-table__cell">${v['UF_NAME']}</div>
	<div class="books-table__cell">${v['UF_AUTHOR']}</div>
	<div class="books-table__cell">${v['CAT_UF_NAME']}</div>
</div>`
					);
				});
			}
		);
	});
});