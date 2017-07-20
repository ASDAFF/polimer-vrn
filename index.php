<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("«Полимер» — главная страница сайта");
?>
<div class="mp__categories">
	<ul class="maincategory__mobile cl">
		<li class="maincategory maincategory--1 cl">
			<a href="#">
				<span class="img"></span>
				<span class="name">Инженерная<br/> сантехника</span>
			</a>
		</li>
		<li class="maincategory maincategory--2 cl">
			<a href="#">
				<span class="img"></span>
				<span class="name">Cтроительные<br/> полимеры</span>
			</a>
		</li>
		<li class="maincategory maincategory--3 cl">
			<a href="#">
				<span class="img"></span>
				<span class="name">Прайс-листы</span>
			</a>
		</li>
	</ul>
	<ul class="tabslist cl">

		<?
		$arFilter = array('IBLOCK_ID' => 11,'DEPTH_LEVEL' => 1,"ACTIVE" => "Y");
		$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
		$inc = 1;
		$arrIdSection = array();
		while ($arSect = $rsSect->GetNext())
		{
			$arrIdSection[] = $arSect['ID'];
			?>
			<li class="maincategory maincategory--<?=$inc?> cl">
				<span class="img"></span>
				<span class="name"><?=$arSect['NAME'];?></span>
			</li>
			<?
			$inc++;
		}
		?>
		<li class="maincategory maincategory--3 cl">
			<span class="img"></span>
			<span class="name">Прайс-листы</span>
		</li>
	</ul>
   	<div class="tablist_content">

		<? foreach($arrIdSection as $sect): ?>
		<div class="tabitem">

			<?
			$arFilter = array('IBLOCK_ID' => 11,"SECTION_ID" => $sect,'DEPTH_LEVEL' => 2,"ACTIVE" => "Y");
			$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
			$inc = 1;
			$arrIdSection = array();
			$arrSection = array();
			while ($arSect = $rsSect->GetNext())
			{
				$arrSection[] = $arSect;
			}
			$rows = ceil(count($arrSection)/6);
			$section = array_chunk($arrSection,6);
			?>
			<? for($i = 0;$i < $rows;$i++):?>
			<div class="row cl category__line <?if($i >= 2):?>toggle_product_no<? endif; ?>">
				<? foreach($section[$i] as $item):?>
				<div class="category">
					<a href="<?=$item['SECTION_PAGE_URL']?>" class="link">
						<img src="<?=CFile::GetPath($item["PICTURE"]);?>" alt="<?=$item['NAME']?>" width="140" height="120" class="img">
						<span class="name"><?=str_replace(' ','<br>',$item['NAME'])?></span>
					</a>
				</div>
				<? endforeach; ?>
			</div><!-- row cl category__line-->
			<? endfor; ?>
			<a href="#" class="category__show">Показать ещё категории</a>
		</div><!-- end: tabitem -->
		<? endforeach; ?>
      	<div class="tabitem"></div>
		<!-- end: tabitem -->
   	</div><!-- end: tablist_content -->
</div><!--end::mp__categories-->
<div class="mp__products">
   	<div class="tabs">
      	<span class="tab active">Популярные товары</span>
      	<span class="tab">Новые поступления</span>
      	<span class="tab">Акции и скидки</span> 
   	</div><!--end::tabs-->
	<div class="tab_content">
		<div class="tab_item ac">
			<div class="slider_product" id="mp__product__popular">
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr1.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr2.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr3.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr3.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr4.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr5.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr6.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product ">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr1.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
			</div><!-- end::slider_product -->
		</div><!-- end::tab_item -->
		<div class="tab_item">
			<div class="slider_product" id="mp__product__new">
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr2.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr1.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr4.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr5.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr3.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr3.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr6.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product ">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr1.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
			</div><!-- end::slider_product -->
		</div><!-- end::tab_item -->
		<div class="tab_item">
			<div class="slider_product" id="mp__product__action">
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr6.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product ">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr1.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr3.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr3.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr4.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr5.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr1.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
				<div>
					<div class="product">
						<a href="/catalog/section/detail/">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/product/pr2.jpg" alt="" width="132" height="110" class="img">
						</a>
						<a href="/catalog/section/detail/" class="name">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
						<div class="price"><span>6 700</span> Руб</div>
						<a href="#" class="cart">В корзину</a>
					</div>
				</div>
			</div><!-- end::slider_product -->
		</div><!-- end::tab_item -->
   	</div><!-- end::tab_content -->
</div><!-- end::mp__products -->
<div class="mp__content cl">
	<div class="mp__company">
		<div class="content__title">О компании</div>
		<div class="company__text">
			<p>
				Компания ООО «Полимер» была основана в 2007 году как дочернее предприятие ООО «Металлинвест плюс» (одного из крупнейших поставщиков стального металлопроката и труб в Воронежской области с почти 20-летней историей). Изначально целью основания
			фирмы была продажа уже имеющимся клиентам большего ассортимента товаров, а именно полипропиленовых труб и фитингов.
			</p>
			<p>
				В настоящее время ООО «Полимер» является одной из крупнейших компаний оптово-розничной торговли материалами и оборудованием для отопления и водоснабжения в Воронежской области. Наш ассортимент постоянно расширяется и уже можно выделить несколько
			основных товарных групп:
			</p>
			<ul class="content__list">
				<li>Инженерная сантехника (газовые котлы, радиаторы отопления, трубы и фитинги, запорная арматура, насосы и др.)</li>
				<li>Строительно-отделочные материалы (гипсокартон, сухие смеси, поликарбонат, лакокраска, инструменты, электрика, крепеж и др.)</li>
			</ul>
		</div>
		<a href="/about/" class="content__link">Подробнее</a>
	</div>
	<div class="mp__articles cl">
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news-list-home", 
	array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "новости",
		"LINK_TITLE" => "news",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "50",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "news-list-home"
	),
	false
);?>

		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"articles-list-home", 
	array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "статьи",
		"LINK_TITLE" => "articles",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "50",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "articles-list-home"
	),
	false
);?>



	</div><!--end::mp__articles-->
</div><!--end::mp__content-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>