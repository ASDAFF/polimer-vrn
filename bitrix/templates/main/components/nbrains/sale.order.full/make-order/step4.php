<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<div class="or__stages cl">
	<div class="stage s1 complite"><span>1</span><div class="text">Контактная <br>информация</div></div>
	<div class="stage s2 complite"><span>2</span><div class="text">Cпособ <br>получения</div></div>
	<div class="stage s3 active"><span>3</span><div class="text">Способ <br>оплаты</div></div>
<!--	<div class="stage s4"><span>4</span><div class="text">Подтверждение <br>заказа</div></div>-->
</div>

<div class="or__stages c2">

	<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "basket-info", Array(
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",	// Рассчитывать скидку для каждой позиции (на все количество товара)
		"COLUMNS_LIST" => array(	// Выводимые колонки
			0 => "NAME",
			1 => "PRICE",
			//2 => "PROPS",
			2 => "DISCOUNT",
			//	3 => "DELAY",
			4 => "QUANTITY",
			5 => "SUM",
			6 => "DELETE",
		),
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"PATH_TO_ORDER" => "/personal/order/make/",	// Страница оформления заказа
		"HIDE_COUPON" => "N",	// Спрятать поле ввода купона
		"QUANTITY_FLOAT" => "N",	// Использовать дробное значение количества
		"PRICE_VAT_SHOW_VALUE" => "Y",	// Отображать значение НДС
		"TEMPLATE_THEME" => "blue",	// Цветовая тема
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"AJAX_OPTION_ADDITIONAL" => "",
		"OFFERS_PROPS" => "",	// Свойства, влияющие на пересчет корзины
		"COMPONENT_TEMPLATE" => "basket",
		"USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
		"AUTO_CALCULATION" => "Y",	// Автопересчет корзины
		"ACTION_VARIABLE" => "basketAction",	// Название переменной действия
		"USE_GIFTS" => "Y",	// Показывать блок "Подарки"
		"GIFTS_PLACE" => "BOTTOM",	// Вывод блока "Подарки"
		"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",	// Текст заголовка "Подарки"
		"GIFTS_HIDE_BLOCK_TITLE" => "N",	// Скрыть заголовок "Подарки"
		"GIFTS_TEXT_LABEL_GIFT" => "Подарок",	// Текст метки "Подарка"
		"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "undefined",	// Название переменной, в которой передается количество товара
		"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"GIFTS_SHOW_OLD_PRICE" => "N",	// Показывать старую цену
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",	// Показывать процент скидки
		"GIFTS_SHOW_NAME" => "Y",	// Показывать название
		"GIFTS_SHOW_IMAGE" => "Y",	// Показывать изображение
		"GIFTS_MESS_BTN_BUY" => "Выбрать",	// Текст кнопки "Выбрать"
		"GIFTS_MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
		"GIFTS_PAGE_ELEMENT_COUNT" => "4",	// Количество элементов в строке
		"GIFTS_CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"GIFTS_HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
	),
		false
	);?>


</div>

<div class="or__content cl s3">
	<div class="title">Укажите удобный способ оплаты заказа</div>
	<div class="payment_types cl">

		<? foreach($arResult["PAY_SYSTEM"] as $key => $arPaySystem): ?>
		<a href="#" class="type t<?=$key+1;?>" <? if($key == 0){print 'style="border:5px solid #000"';}?>>
			<?= str_replace(' ','<br>',$arPaySystem["PSA_NAME"]) ?>
			<input type="radio" hidden id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>" name="PAY_SYSTEM_ID" value="<?= $arPaySystem["ID"] ?>"<?if ($arPaySystem["CHECKED"]=="Y") echo " checked";?>>
		</a>
		<? endforeach; ?>

	</div>
	<input type="submit" name="contButton" class="issue" value="<?= GetMessage("SALE_CONTINUE")?>">

</div>

<div class="clear"></div>
