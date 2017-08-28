<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!function_exists('PrintPropsForm'))
{
	function PrintPropsForm($arSource=Array(), $PRINT_TITLE = "", $arParams)
	{
		if (!empty($arSource))
		{

			foreach($arSource as $key => $group){
				$arSource["ITEM"][$group['PROPS_GROUP_ID']]['ROWS'][] = $group;
				$arSource["ITEM"][$group['PROPS_GROUP_ID']]['NAME'] = $group['GROUP_NAME'];
			}

			foreach($arSource["ITEM"] as $group) {

				if(
					$group['NAME'] != "date_time_fis" AND
					$group['NAME'] != "group_store"
				):
				?><div class="group <?=$group['NAME']?>"><?
				 endif;

				$line = 0;
				foreach ($group['ROWS'] as $arProperties) {


					switch ($group['NAME']) {
						case "date_time_fis":
							break;
						case "group_store":
							break;
						case "personal_data_fis":
							?>
							<div class="table <?if($line < 2){print 'lines';}?>">
							<span><?= $arProperties["NAME"];
								if ($arProperties["REQUIED_FORMATED"] == "Y") {
									print "*";
								} ?></span>

								<div class="inp">
									<input type="text" maxlength="250" size="<?= $arProperties["SIZE1"] ?>" value="<?= $arProperties["VALUE"] ?>" name="<?= $arProperties["FIELD_NAME"] ?>">
								</div>
							</div>
							<?
							$line++;
							break;
						case "phone_group_fis":
							?>
							<div class="line ph">
								<input type="hidden" class="phone_hidden" maxlength="250" size="<?= $arProperties["SIZE1"] ?>" value="<?= $arProperties["VALUE"] ?>" name="<?= $arProperties["FIELD_NAME"] ?>">
								<span>Контактный телефон:</span>
								<?
								if($arProperties["VALUE"]){
								$num = explode(';',$arProperties["VALUE"]);
								}
								?>
								<div class="phone-add first">
									<div class="inp phone">
										<input class="phone" type="text" value="<?if($num){print $num[0];}?>">
									</div>

									<a href="#" class="addphone"><span></span><span></span>Добавить телефон</a>
								</div>

								<? foreach(array_slice($num, 1) as $number): ?>
									<? if(strlen($number) > 2): ?>
									<div class="phone-add first">
										<div class="inp phone">
											<input class="phone" type="text" value="<?=$number;?>">
										</div>
									</div>
									<? endif; ?>
								<? endforeach; ?>

							</div>
							<?
							break;
						default:
							if ($arProperties["TYPE"] == "TEXT") {
								?>
								<div class="line">
							<span><?= $arProperties["NAME"];
								if ($arProperties["REQUIED_FORMATED"] == "Y") {
									print "*";
								} ?></span>

									<div class="inp">
										<input type="text" maxlength="250" size="<?= $arProperties["SIZE1"] ?>"
											   value="<?= $arProperties["VALUE"] ?>" name="<?= $arProperties["FIELD_NAME"] ?>">
									</div>
								</div>
								<?
							}	elseif ($arProperties["TYPE"] == "TEXTAREA") {
								?>
								<div class="line">
							<span><?= $arProperties["NAME"];
								if ($arProperties["REQUIED_FORMATED"] == "Y") {
									print "*";
								} ?></span>

									<div class="tex">
								<textarea rows="<?= $arProperties["SIZE2"] ?>" cols="<?= $arProperties["SIZE1"] ?>"
										  name="<?= $arProperties["FIELD_NAME"] ?>"><?= $arProperties["VALUE"] ?></textarea>
									</div>
								</div>

								<?
							}
					}



					if (strlen($arProperties["DESCRIPTION"]) > 0) {
						?><br/>
						<small><? echo $arProperties["DESCRIPTION"] ?></small><?
					}
					?>


					<?
				}

				if(
					$group['NAME'] != "date_time_fis" AND
					$group['NAME'] != "group_store"
				):?>
				</div>
				<? endif; ?>

				<? if($group['NAME'] == 'date_time_fis'): ?>
					<div class="group tall date_time_fis">
						<div class="line dateline">
							<span class="g-title">Выбрать удобную дату и интервал времени доставки</span>
							<span><?= $group['ROWS'][0]["NAME"];
								if ($group['ROWS'][0]["REQUIED_FORMATED"] == "Y") {
									print "*";
								} ?>:</span>
							<div class="inp date"><input type="text" placeholder="Выбрать дату" value="<?= $group['ROWS'][0]["VALUE"] ?>" name="<?= $group['ROWS'][0]["FIELD_NAME"] ?>" id="date"></div>
							<span class="span_time"><?= $group['ROWS'][1]["NAME"];
								if ($group['ROWS'][1]["REQUIED_FORMATED"] == "Y") {
									print "*";
								} ?></span>
							<div class="inp time from">
								<input type="text" class="call_time" value="<?= $group['ROWS'][1]["VALUE"] ?>" name="<?= $group['ROWS'][1]["FIELD_NAME"] ?>">
							</div>
						</div>
					</div>
				<? endif; ?>

				<?
			}

			return true;
		}
		return false;
	}
}
?>


<div class="or__stages cl">
	<div class="stage s1"><span>1</span><div class="text">Контактная <br>информация</div></div>
	<div class="stage s2 active"><span>2</span><div class="text">Cпособ <br>получения</div></div>
	<div class="stage s3"><span>3</span><div class="text">Способ <br>оплаты</div></div>
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



<div class="or__content cl s2">

	<div class="title">Выберите удобный способ получения заказа</div>
	<div class="methods cl">
		<?
		foreach($arResult['PRINT_PROPS_FORM']['USER_PROPS_Y'] as $group){
			if($group['GROUP_NAME'] == 'group_store'){
				$name_field_store = $group['FIELD_NAME'];
			}
		}
		foreach($arResult["DELIVERY"] as $arDelivery):?>
		<a href="#" class="meth <?if ($arDelivery["CHECKED"]=="Y") echo "active";?>">
			<div class="inner">
				<?=$arDelivery['NAME']?><span><?=$arDelivery['DESCRIPTION']?></span>
			</div>
			<input style="display:none" type="radio" id-field="<?=$name_field_store;?>" id-store="<?=$arDelivery['STORE']?>" class="<?if ($arDelivery["CHECKED"]=="Y") echo "active";?>" id="ID_DELIERY_ID_<?= $arDelivery["ID"] ?>" name="<?=$arDelivery["FIELD_NAME"]?>" value="<?= $arDelivery["ID"] ?>" <?if ($arDelivery["CHECKED"]=="Y") echo "checked";?>>
		</a>
		<?endforeach;?>
	</div>

	<div class="methods_detail">
			<?
			$bPropsPrinted = PrintPropsForm($arResult["PRINT_PROPS_FORM"]["USER_PROPS_N"], GetMessage("SALE_INFO2ORDER"), $arParams);

			if(!empty($arResult["USER_PROFILES"]))
			{

			}
			else
			{
				?><input type="hidden" name="PROFILE_ID" value="0"><?
			}
			?>



			<?
			PrintPropsForm($arResult["PRINT_PROPS_FORM"]["USER_PROPS_Y"], GetMessage("SALE_NEW_PROFILE_TITLE"), $arParams);
			?>

									<div class="controls cl">
										<a href="/personal/order/make/?logout=yes" class="control prev">Предыдущий шаг</a>
										<a href="#" id="order_form_btn" class="control next">Следующий шаг</a>
<!--										<input type="submit" style="padding-left: 75px;" name="contButton" class="control next" value="--><?//= GetMessage("SALE_CONTINUE")?><!--">-->
									</div>
	</div>
</div>



<div class="clear"></div>