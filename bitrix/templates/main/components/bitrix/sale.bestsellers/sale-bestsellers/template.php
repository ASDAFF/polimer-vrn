<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$this->setFrameMode(true);
?>

<?if($arResult['ITEMS']):?>
<div class="slider_product" id="mp__product__popular">

	<? foreach($arResult['ITEMS'] as $item):?>
	<div>
		<div class="product">
			<a href="<?=$item['DETAIL_PAGE_URL']?>" style="display: block;height: 110px;">
				<img src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" alt="" height="110" style="max-height: 110px;margin: 0 auto;" class="img">
			</a>
			<a href="<?=$item['DETAIL_PAGE_URL']?>" class="name"><?=$item['NAME']?></a>
			<div class="price"><span>
					<?
					$ar_res = CCatalogProduct::GetOptimalPrice($item['ID'], 1, $USER->GetUserGroupArray(), 'N');
					echo $ar_res['DISCOUNT_PRICE'];
					?>
				</span> Руб</div>
			<a href="javascript:void(0)" onclick="addToBasket2(<?=$item['ID']?>, 1);" class="cart">В корзину</a>
		</div>
	</div>
	<? endforeach; ?>

</div><!-- end::slider_product -->
<?endif;?>