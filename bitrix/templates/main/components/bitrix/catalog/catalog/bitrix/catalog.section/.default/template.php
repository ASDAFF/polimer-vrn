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
										$ar_res = CPrice::GetBasePrice($arItem['ID']);
										echo $ar_res['PRICE'];
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

		<div class="h2">Вы смотрели</div>
		<div class="slider_product" id="mp__product__action">
			<div>
				<div class="product">
					<a href="/catalog/detail/">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr6.jpg" alt="" width="132" height="110" class="img">
					</a>
					<a href="/catalog/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
					<div class="price"><span>6 700</span> Руб</div>
					<a href="#" class="cart">В корзину</a>
				</div>
			</div>
			<div>
				<div class="product ">
					<a href="/catalog/detail/">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr1.jpg" alt="" width="132" height="110" class="img">
					</a>
					<a href="/catalog/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
					<div class="price"><span>6 700</span> Руб</div>
					<a href="#" class="cart">В корзину</a>
				</div>
			</div>
			<div>
				<div class="product">
					<a href="/catalog/detail/">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr3.jpg" alt="" width="132" height="110" class="img">
					</a>
					<a href="/catalog/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
					<div class="price"><span>6 700</span> Руб</div>
					<a href="#" class="cart">В корзину</a>
				</div>
			</div>
			<div>
				<div class="product">
					<a href="/catalog/detail/">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr3.jpg" alt="" width="132" height="110" class="img">
					</a>
					<a href="/catalog/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
					<div class="price"><span>6 700</span> Руб</div>
					<a href="#" class="cart">В корзину</a>
				</div>
			</div>
			<div>
				<div class="product">
					<a href="/catalog/detail/">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr4.jpg" alt="" width="132" height="110" class="img">
					</a>
					<a href="/catalog/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
					<div class="price"><span>6 700</span> Руб</div>
					<a href="#" class="cart">В корзину</a>
				</div>
			</div>
			<div>
				<div class="product">
					<a href="/catalog/detail/">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr5.jpg" alt="" width="132" height="110" class="img">
					</a>
					<a href="/catalog/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
					<div class="price"><span>6 700</span> Руб</div>
					<a href="#" class="cart">В корзину</a>
				</div>
			</div>
			<div>
				<div class="product">
					<a href="/catalog/detail/">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr1.jpg" alt="" width="132" height="110" class="img">
					</a>
					<a href="/catalog/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
					<div class="price"><span>6 700</span> Руб</div>
					<a href="#" class="cart">В корзину</a>
				</div>
			</div>
			<div>
				<div class="product">
					<a href="/catalog/detail/">
						<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr2.jpg" alt="" width="132" height="110" class="img">
					</a>
					<a href="/catalog/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
					<div class="price"><span>6 700</span> Руб</div>
					<a href="#" class="cart">В корзину</a>
				</div>
			</div>
		</div><!-- end::slider_product -->

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