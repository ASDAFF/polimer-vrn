<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
if (!empty($arResult['ITEMS']))
{
?>


	<div class="ct__content">
		<div class="h1"><?=$arResult['NAME']?></div>

		<div class="products_roll">
			<div class="pr_header cl">
				<div class="sort">
					<label for="select_prh">Сортировать по:</label>
					<select name="select_prh" id="select_prh">
						<option selected>Популярности</option>
						<option>Наличию</option>
						<option>Цене</option>
					</select>
				</div>
				<div class="view">
					<a href="#" class="list">
						<div class="icon cl">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
						Список</a>
					<a href="#" class="tab active">
						<div class="icon cl">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
						Таблица</a>
				</div>
				<div class="quan">
					<label for="quan">Товаров на стр. :</label>
					<select name="quan" id="quan">
						<option selected>20</option>
						<option>40</option>
						<option>80</option>
					</select>
				</div>
				<a href="#" class="filter" onclick="return false">
					<span>Фильтр</span>
					<span>Закрыть</span>
				</a>
			</div>

			<div class="pr_box cl">

				<? foreach ($arResult['ITEMS'] as $key => $arItem): ?>

					<div class="item" id="product_<?=$arItem['ID']?>">
						<div class="hover">
							<div class="inner">
								<div class="compare">
									<label>
										<input type="checkbox">
										<span>Сравнить</span>
									</label>
								</div>
								<div class="close"></div>
								<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="pic">
                       <span>
                          <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
                       </span>
								</a>
								<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="title"><?=$arItem['NAME']?></a>
								<div class="cost">
									<span>
										<?
										$ar_res = CCatalogProduct::GetOptimalPrice($arItem['ID'], 1, $USER->GetUserGroupArray(), 'N');
										echo $ar_res['DISCOUNT_PRICE'];
										?>
									</span> Руб.</div>
								<? if($ar_res['PRODUCT_QUANTITY'] > 0): ?>
								<div class="quantity" id="count_<?=$arItem['ID']?>">
									<a class="minus na" href="#"></a>
									<input type="text" value="1"/>
									<a class="plus" href="#"></a>
								</div>
									<script>

											$('#count_<?=$arItem['ID']?> > .minus').click(function(){
												var count_val = $(this).parent().find('input').val();
												if(count_val < 2){
													$(this).addClass('na');
													$(this).parent().find('input').val(1);
												}else{
													var val = parseInt($(this).parent().find('input').val()) - 1;
													var cost = parseFloat($('#product_<?=$arItem['ID']?> .cost > span').text());
													var cost_total = cost*val;
													$('#product_<?=$arItem['ID']?> .cost_total > span').text(cost_total.toFixed(2));
													$(this).parent().find('input').val(val);
													$(this).parent().find('.plus').removeClass('na');

												}
												return false;
											});
											$('#count_<?=$arItem['ID']?> > .plus').click(function(){
												var count_val = $(this).parent().find('input').val();

												if(count_val < <?=$ar_res['PRODUCT_QUANTITY']?>){
													var val = parseInt($(this).parent().find('input').val()) + 1;
													var cost = parseFloat($('#product_<?=$arItem['ID']?> .cost > span').text());
													var cost_total = cost*val;
													$('#product_<?=$arItem['ID']?> .cost_total > span').text(cost_total.toFixed(2));
													$(this).parent().find('input').val(val);
													$(this).parent().find('.minus').removeClass('na');
												}else{
													$(this).addClass('na');
													$(this).parent().find('input').val(<?=$ar_res['PRODUCT_QUANTITY']?>);
												}
												return false;
											});



									</script>
								<div class="cost_total"><span><?=$ar_res['PRICE'];?></span> Руб.</div>
								<a href="javascript:void(0)" class="add2cart">
									<span class="txt1">В корзину</span>
									<span class="txt2" onclick="addToBasket2(<?=$arItem['ID']?>, $('#count_<?=$arItem['ID']?> input').val());">Добавить в корзину</span>
								</a>
								<div class="instock">Товар в наличии</div>

								<? endif; ?>

							</div>
						</div>
					</div>

				<? endforeach; ?>

			</div>

			<div class="pr_footer cl">
				<?
				if ($arParams["DISPLAY_BOTTOM_PAGER"])
				{
					?><? echo $arResult["NAV_STRING"]; ?><?
				}
				?>

				<div class="quan_b">
					<label for="quan_b">Товаров на стр. :</label>
					<select name="quan" id="quan_b">
						<option selected>20</option>
						<option>40</option>
						<option>80</option>
					</select>
				</div>
			</div>
		</div><!--end::products_roll-->

		<?$APPLICATION->IncludeComponent("bitrix:catalog.products.viewed", "products-viewed", Array(
			"ACTION_VARIABLE" => "action_cpv",	// РќР°Р·РІР°РЅРёРµ РїРµСЂРµРјРµРЅРЅРѕР№, РІ РєРѕС‚РѕСЂРѕР№ РїРµСЂРµРґР°РµС‚СЃСЏ РґРµР№СЃС‚РІРёРµ
			"ADDITIONAL_PICT_PROP_10" => "-",
			"ADDITIONAL_PICT_PROP_11" => "-",	// Р”РѕРїРѕР»РЅРёС‚РµР»СЊРЅР°СЏ РєР°СЂС‚РёРЅРєР°
			"ADDITIONAL_PICT_PROP_12" => "-",	// Р”РѕРїРѕР»РЅРёС‚РµР»СЊРЅР°СЏ РєР°СЂС‚РёРЅРєР°
			"ADD_PROPERTIES_TO_BASKET" => "Y",	// Р”РѕР±Р°РІР»СЏС‚СЊ РІ РєРѕСЂР·РёРЅСѓ СЃРІРѕР№СЃС‚РІР° С‚РѕРІР°СЂРѕРІ Рё РїСЂРµРґР»РѕР¶РµРЅРёР№
			"ADD_TO_BASKET_ACTION" => "ADD",	// РџРѕРєР°Р·С‹РІР°С‚СЊ РєРЅРѕРїРєСѓ РґРѕР±Р°РІР»РµРЅРёСЏ РІ РєРѕСЂР·РёРЅСѓ РёР»Рё РїРѕРєСѓРїРєРё
			"BASKET_URL" => "/personal/basket.php",	// URL, РІРµРґСѓС‰РёР№ РЅР° СЃС‚СЂР°РЅРёС†Сѓ СЃ РєРѕСЂР·РёРЅРѕР№ РїРѕРєСѓРїР°С‚РµР»СЏ
			"CACHE_GROUPS" => "Y",	// РЈС‡РёС‚С‹РІР°С‚СЊ РїСЂР°РІР° РґРѕСЃС‚СѓРїР°
			"CACHE_TIME" => "3600",	// Р’СЂРµРјСЏ РєРµС€РёСЂРѕРІР°РЅРёСЏ (СЃРµРє.)
			"CACHE_TYPE" => "A",	// РўРёРї РєРµС€РёСЂРѕРІР°РЅРёСЏ
			"CART_PROPERTIES_10" => array(
				0 => "",
				1 => "",
			),
			"CART_PROPERTIES_11" => array(	// РЎРІРѕР№СЃС‚РІР° РґР»СЏ РґРѕР±Р°РІР»РµРЅРёСЏ РІ РєРѕСЂР·РёРЅСѓ
				0 => "",
				1 => "",
			),
			"CART_PROPERTIES_12" => array(	// РЎРІРѕР№СЃС‚РІР° РґР»СЏ РґРѕР±Р°РІР»РµРЅРёСЏ РІ РєРѕСЂР·РёРЅСѓ
				0 => "",
				1 => "",
			),
			"CONVERT_CURRENCY" => "N",	// РџРѕРєР°Р·С‹РІР°С‚СЊ С†РµРЅС‹ РІ РѕРґРЅРѕР№ РІР°Р»СЋС‚Рµ
			"DEPTH" => "2",	// РњР°РєСЃРёРјР°Р»СЊРЅР°СЏ РѕС‚РѕР±СЂР°Р¶Р°РµРјР°СЏ РіР»СѓР±РёРЅР° СЂР°Р·РґРµР»РѕРІ
			"DISPLAY_COMPARE" => "N",	// Р Р°Р·СЂРµС€РёС‚СЊ СЃСЂР°РІРЅРµРЅРёРµ С‚РѕРІР°СЂРѕРІ
			"ENLARGE_PRODUCT" => "STRICT",	// Р’С‹РґРµР»СЏС‚СЊ С‚РѕРІР°СЂС‹ РІ СЃРїРёСЃРєРµ
			"HIDE_NOT_AVAILABLE" => "N",	// РќРµ РѕС‚РѕР±СЂР°Р¶Р°С‚СЊ С‚РѕРІР°СЂС‹, РєРѕС‚РѕСЂС‹С… РЅРµС‚ РЅР° СЃРєР»Р°РґР°С…
			"HIDE_NOT_AVAILABLE_OFFERS" => "N",	// РўРѕСЂРіРѕРІС‹Рµ РїСЂРµРґР»РѕР¶РµРЅРёСЏ, РЅРµРґРѕСЃС‚СѓРїРЅС‹Рµ РґР»СЏ РїРѕРєСѓРїРєРё
			"IBLOCK_ID" => "11",	// Р?РЅС„РѕР±Р»РѕРє
			"IBLOCK_MODE" => "single",	// РџРѕРєР°Р·С‹РІР°С‚СЊ С‚РѕРІР°СЂС‹ РёР·
			"IBLOCK_TYPE" => "1c_catalog",	// РўРёРї РёРЅС„РѕР±Р»РѕРєР°
			"LABEL_PROP_10" => "",
			"LABEL_PROP_11" => "",	// РЎРІРѕР№СЃС‚РІРѕ РјРµС‚РѕРє С‚РѕРІР°СЂР°
			"LABEL_PROP_POSITION" => "top-left",	// Р Р°СЃРїРѕР»РѕР¶РµРЅРёРµ РјРµС‚РѕРє С‚РѕРІР°СЂР°
			"MESS_BTN_ADD_TO_BASKET" => "Р’ РєРѕСЂР·РёРЅСѓ",	// РўРµРєСЃС‚ РєРЅРѕРїРєРё "Р”РѕР±Р°РІРёС‚СЊ РІ РєРѕСЂР·РёРЅСѓ"
			"MESS_BTN_BUY" => "РљСѓРїРёС‚СЊ",	// РўРµРєСЃС‚ РєРЅРѕРїРєРё "РљСѓРїРёС‚СЊ"
			"MESS_BTN_DETAIL" => "РџРѕРґСЂРѕР±РЅРµРµ",	// РўРµРєСЃС‚ РєРЅРѕРїРєРё "РџРѕРґСЂРѕР±РЅРµРµ"
			"MESS_BTN_SUBSCRIBE" => "РџРѕРґРїРёСЃР°С‚СЊСЃСЏ",	// РўРµРєСЃС‚ РєРЅРѕРїРєРё "РЈРІРµРґРѕРјРёС‚СЊ Рѕ РїРѕСЃС‚СѓРїР»РµРЅРёРё"
			"MESS_NOT_AVAILABLE" => "РќРµС‚ РІ РЅР°Р»РёС‡РёРё",	// РЎРѕРѕР±С‰РµРЅРёРµ РѕР± РѕС‚СЃСѓС‚СЃС‚РІРёРё С‚РѕРІР°СЂР°
			"OFFER_TREE_PROPS_12" => "",	// РЎРІРѕР№СЃС‚РІР° РґР»СЏ РіСЂСѓРїРїРёСЂРѕРІРєРё
			"PAGE_ELEMENT_COUNT" => "9",	// РљРѕР»РёС‡РµСЃС‚РІРѕ СЌР»РµРјРµРЅС‚РѕРІ РЅР° СЃС‚СЂР°РЅРёС†Рµ
			"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Р Р°Р·СЂРµС€РёС‚СЊ РґРѕР±Р°РІР»СЏС‚СЊ РІ РєРѕСЂР·РёРЅСѓ С‚РѕРІР°СЂС‹, Сѓ РєРѕС‚РѕСЂС‹С… Р·Р°РїРѕР»РЅРµРЅС‹ РЅРµ РІСЃРµ С…Р°СЂР°РєС‚РµСЂРёСЃС‚РёРєРё
			"PRICE_CODE" => "",	// РўРёРї С†РµРЅС‹
			"PRICE_VAT_INCLUDE" => "Y",	// Р’РєР»СЋС‡Р°С‚СЊ РќР”РЎ РІ С†РµРЅСѓ
			"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",	// РџРѕСЂСЏРґРѕРє РѕС‚РѕР±СЂР°Р¶РµРЅРёСЏ Р±Р»РѕРєРѕРІ С‚РѕРІР°СЂР°
			"PRODUCT_ID_VARIABLE" => "id",	// РќР°Р·РІР°РЅРёРµ РїРµСЂРµРјРµРЅРЅРѕР№, РІ РєРѕС‚РѕСЂРѕР№ РїРµСЂРµРґР°РµС‚СЃСЏ РєРѕРґ С‚РѕРІР°СЂР° РґР»СЏ РїРѕРєСѓРїРєРё
			"PRODUCT_PROPS_VARIABLE" => "prop",	// РќР°Р·РІР°РЅРёРµ РїРµСЂРµРјРµРЅРЅРѕР№, РІ РєРѕС‚РѕСЂРѕР№ РїРµСЂРµРґР°СЋС‚СЃСЏ С…Р°СЂР°РєС‚РµСЂРёСЃС‚РёРєРё С‚РѕРІР°СЂР°
			"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// РќР°Р·РІР°РЅРёРµ РїРµСЂРµРјРµРЅРЅРѕР№, РІ РєРѕС‚РѕСЂРѕР№ РїРµСЂРµРґР°РµС‚СЃСЏ РєРѕР»РёС‡РµСЃС‚РІРѕ С‚РѕРІР°СЂР°
			"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",	// Р’Р°СЂРёР°РЅС‚ РѕС‚РѕР±СЂР°Р¶РµРЅРёСЏ С‚РѕРІР°СЂРѕРІ
			"PRODUCT_SUBSCRIPTION" => "Y",	// Р Р°Р·СЂРµС€РёС‚СЊ РѕРїРѕРІРµС‰РµРЅРёСЏ РґР»СЏ РѕС‚СЃСѓС‚СЃС‚РІСѓСЋС‰РёС… С‚РѕРІР°СЂРѕРІ
			"PROPERTY_CODE_10" => array(
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE_11" => array(	// РЎРІРѕР№СЃС‚РІР° РґР»СЏ РѕС‚РѕР±СЂР°Р¶РµРЅРёСЏ
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE_12" => array(	// РЎРІРѕР№СЃС‚РІР° РґР»СЏ РѕС‚РѕР±СЂР°Р¶РµРЅРёСЏ
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE_MOBILE_11" => "",	// РЎРІРѕР№СЃС‚РІР° С‚РѕРІР°СЂРѕРІ, РѕС‚РѕР±СЂР°Р¶Р°РµРјС‹Рµ РЅР° РјРѕР±РёР»СЊРЅС‹С… СѓСЃС‚СЂРѕР№СЃС‚РІР°С…
			"SECTION_CODE" => "",	// РљРѕРґ СЂР°Р·РґРµР»Р°
			"SECTION_ELEMENT_CODE" => "",	// РЎРёРјРІРѕР»СЊРЅС‹Р№ РєРѕРґ СЌР»РµРјРµРЅС‚Р°, РґР»СЏ РєРѕС‚РѕСЂРѕРіРѕ Р±СѓРґРµС‚ РІС‹Р±СЂР°РЅ СЂР°Р·РґРµР»
			"SECTION_ELEMENT_ID" => $GLOBALS["CATALOG_CURRENT_ELEMENT_ID"],	// ID СЌР»РµРјРµРЅС‚Р°, РґР»СЏ РєРѕС‚РѕСЂРѕРіРѕ Р±СѓРґРµС‚ РІС‹Р±СЂР°РЅ СЂР°Р·РґРµР»
			"SECTION_ID" => $GLOBALS["CATALOG_CURRENT_SECTION_ID"],	// ID СЂР°Р·РґРµР»Р°
			"SHOW_CLOSE_POPUP" => "N",	// РџРѕРєР°Р·С‹РІР°С‚СЊ РєРЅРѕРїРєСѓ РїСЂРѕРґРѕР»Р¶РµРЅРёСЏ РїРѕРєСѓРїРѕРє РІРѕ РІСЃРїР»С‹РІР°СЋС‰РёС… РѕРєРЅР°С…
			"SHOW_DISCOUNT_PERCENT" => "N",	// РџРѕРєР°Р·С‹РІР°С‚СЊ РїСЂРѕС†РµРЅС‚ СЃРєРёРґРєРё
			"SHOW_FROM_SECTION" => "N",	// РџРѕРєР°Р·С‹РІР°С‚СЊ С‚РѕРІР°СЂС‹ РёР· СЂР°Р·РґРµР»Р°
			"SHOW_MAX_QUANTITY" => "N",	// РџРѕРєР°Р·С‹РІР°С‚СЊ РѕСЃС‚Р°С‚РѕРє С‚РѕРІР°СЂР°
			"SHOW_OLD_PRICE" => "N",	// РџРѕРєР°Р·С‹РІР°С‚СЊ СЃС‚Р°СЂСѓСЋ С†РµРЅСѓ
			"SHOW_PRICE_COUNT" => "1",	// Р’С‹РІРѕРґРёС‚СЊ С†РµРЅС‹ РґР»СЏ РєРѕР»РёС‡РµСЃС‚РІР°
			"SHOW_PRODUCTS_10" => "N",
			"SHOW_PRODUCTS_11" => "N",
			"SHOW_SLIDER" => "N",	// РџРѕРєР°Р·С‹РІР°С‚СЊ СЃР»Р°Р№РґРµСЂ РґР»СЏ С‚РѕРІР°СЂРѕРІ
			"SLIDER_INTERVAL" => "3000",
			"SLIDER_PROGRESS" => "N",
			"TEMPLATE_THEME" => "blue",	// Р¦РІРµС‚РѕРІР°СЏ С‚РµРјР°
			"USE_ENHANCED_ECOMMERCE" => "N",	// РћС‚РїСЂР°РІР»СЏС‚СЊ РґР°РЅРЅС‹Рµ СЌР»РµРєС‚СЂРѕРЅРЅРѕР№ С‚РѕСЂРіРѕРІР»Рё РІ Google Рё РЇРЅРґРµРєСЃ
			"USE_PRICE_COUNT" => "N",	// Р?СЃРїРѕР»СЊР·РѕРІР°С‚СЊ РІС‹РІРѕРґ С†РµРЅ СЃ РґРёР°РїР°Р·РѕРЅР°РјРё
			"USE_PRODUCT_QUANTITY" => "N",	// Р Р°Р·СЂРµС€РёС‚СЊ СѓРєР°Р·Р°РЅРёРµ РєРѕР»РёС‡РµСЃС‚РІР° С‚РѕРІР°СЂР°
			"COMPONENT_TEMPLATE" => ".default",
			"SET_VIEWED_IN_COMPONENT" => "Y"
		),
			false
		);?>

		<div class="related_articles cl">
			<div class="col-txt">
				<h1>Водонагреватели электрические</h1>
				<p>Компания ООО «Полимер» была основана в 2007 году как дочернее предприятие ООО «Металлинвест плюс» (одного из крупнейших поставщиков стального металлопроката и труб в Воронежской области с почти 20-летней историей). Изначально целью основания фирмы была продажа уже имеющимся клиентам большего ассортимента товаров, а именно полипропиленовых труб и фитингов.</p>
				<p>В настоящее время ООО «Полимер» является одной из крупнейших компаний оптово-розничной торговли материалами и оборудованием для отопления и водоснабжения в Воронежской области. Наш ассортимент постоянно расширяется и уже можно выделить несколько основных товарных групп:</p>
				<ul>
					<li>Инженерная сантехника (газовые котлы, радиаторы отопления, трубы и фитинги, запорная арматура, насосы и др.)</li>
					<li>Строительно-отделочные материалы (гипсокартон, сухие смеси, поликарбонат, лакокраска, инструменты, электрика, крепеж и др.)</li>
				</ul>
			</div>
			<div class="col-articles">
				<h1>Статьи</h1>
				<a href="#">Подробно о перфораторах</a>
				<a href="#">Что выбрать – перфоратор или дрель?</a>
				<a href="#">Устройство, тип патрона, функции перфоратора</a>
				<a href="#">Дополнительная оснастка для перфораторов</a>
				<a href="#">Как выбрать перфоратор – коротко о главном в водонагревателях</a>
				<a href="#" class="allarticles">Все статьи</a>
			</div>
		</div>
	</div>


<?}?>