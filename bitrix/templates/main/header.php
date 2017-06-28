<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Application,
    Bitrix\Main\Context,
    Bitrix\Main\Request,
    Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc;


if(defined("ERROR_404") && ERROR_404){ $error_404 = true; }

$pages   = $APPLICATION -> GetCurDir();     
$pages   = explode('/', $pages);
$is_main = (($APPLICATION -> GetCurDir() == '/') || ($APPLICATION -> GetCurDir() == SITE_DIR)) && !$error_404;
$noh1    = $pages[1] == 'personal' || $pages[1] == 'price' || ($pages[1] == 'catalog' && $pages[2]);
?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<title><?$APPLICATION->ShowTitle()?></title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		<!-- JavaScript -->
		<script src="//cdn.jsdelivr.net/alertifyjs/1.10.0/alertify.min.js"></script>
		<!-- CSS -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.10.0/css/alertify.min.css"/>
		<!-- Default theme -->
		<link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.10.0/css/themes/default.min.css"/>

		<?
		$APPLICATION->ShowHead();



		Asset::getInstance()->addString('<link rel="shortcut icon" href="/favicon.ico" type="image/gif">');
		Asset::getInstance()->addString('<link rel="icon" href="/favicon.ico">');
		Asset::getInstance()->addString('<meta name="msapplication-tooltip" content="«Полимер»">');
		Asset::getInstance()->addString('<meta name="msapplication-TileImage" content="/tileicon.png">');
		Asset::getInstance()->addString('<meta name="msapplication-TileColor" content="#014075">');
		Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
		Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1">');
		Asset::getInstance()->addString('<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,latin-ext" rel="stylesheet">');
		Asset::getInstance()->addString('<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic-ext,latin-ext" rel="stylesheet">');

		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/vendor.min.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/slick.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/fonts.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/ion.rangeSlider.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/ion.rangeSlider.skinModern.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/jquery-ui.min.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/jquery.fancybox.min.css');
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/social-likes_classic.css');


		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.min.js');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/vendor.min.js');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/slick.min.js');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery-ui.min.js');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/ion.rangeSlider.min.js');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.fancybox.min.js');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.kinetic.min.js');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/common.min.js');
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/social-likes.min.js');

		Asset::getInstance()->addJs('/js/function.js');
		?>


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

	</head>
   	<body>
   		<?$APPLICATION->ShowPanel()?>
		<!-- [if lt IE 10]>
			<p class="browsehappy"> Ваш браузер <strong>устарел</strong>.
			Пожалуйста <a href="http://browsehappy.com/">обновите</a> его.</p>
		<![endif]-->
      	<div class="container">
			<header>
				<div class="hmobile">
					<div class="wr cl">
						<a href="/" class="hmobile__logo">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/h_logo.jpg" alt="Полимер" width="165" height="37" />
						</a>
						<div class="hmobile__phone">+7 (473) 250-22-33</div>
						<a href="/search/index.php" class="hmobile__search"></a>
						<a href="#" class="menu__trigger">
							<span class="i1"></span>
							<span class="i2"></span>
							<span class="i3"></span>
						</a>
						<a href="/basket/" class="hmobile__cart cart">
							<span class="cart__number">2</span>
						</a>
					</div>
				</div><!--end::hmobile-->
				<div class="mm__wrap">
					<div class="wr cl">
						<div class="cl">
							<form id="mm__search" class="mm__search" method="get" action="/">
								<input class="search__input input" type="text" placeholder="Поиск" value="">
								<button type="submit" class="search__btn"></button>
							</form>
							<a href="/personal/" class="mm__account">Личный кабинет</a>
						</div><!--end::cl-->
						<ul class="mm__category cl">
							<li class="maincategory maincategory--1 cl">
								<a href="/catalog/">
									<span class="img"></span>
									<span class="name">Инженерная<br/> сантехника</span>
								</a>
							</li>
							<li class="maincategory maincategory--2 cl">
								<a href="/catalog/">
									<span class="img"></span>
									<span class="name">Cтроительные<br/> полимеры</span>
								</a>
							</li>
							<li class="maincategory maincategory--3 cl">
								<a href="/catalog/">
									<span class="img"></span>
									<span class="name">Прайс-листы</span>
								</a>
							</li>
						</ul>
						<div class="cl">
							<a href="/sale/" class="mm__action">Акции</a>
							<a href="/calc/" class="mm__calculation">Бесплатный расчет</a>
						</div>
						<div class="mm__phone">+7 (473) 250-22-33</div>
						<div class="cl">
							<div class="mm__timework header__timework">
								<div class="line cl">
									<div class="days">ПН-ПТ</div>
									<div class="hours">8:00 - 17:00</div>
								</div>
								<div class="line cl">
									<div class="days">CБ</div>
									<div class="hours">8:30 - 16:30</div>
								</div>
								<div class="line cl">
									<div class="days">ВС</div>
									<div class="hours"><span class="weekend">выходной</span></div>
								</div>
							</div><!--end::mm__timework-->
							<a href="#" class="header__letter show-popup" data-id="mailus">Написать письмо</a>
							<a href="/contacts/" class="header__adress">Адреса магазинов</a>
						</div><!--end::cl-->
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"top-mobile",
							Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "top",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(""),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "AUTO",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "top",
								"USE_EXT" => "N"
							)
						); // mm__menu?>
					</div><!--end::wr-->
				</div><!--end::mm__wrap-->
				<div class="header__top">
					<div class="wr cl">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "top-multilevel", Array(
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"MAX_LEVEL" => "2",	// Уровень вложенности меню
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_TYPE" => "A",	// Тип кеширования
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
							"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"COMPONENT_TEMPLATE" => "horizontal_multilevel",
							"MENU_THEME" => "site"
						),
						false
					); //menu__top ?>
					<a href="#" class="header__letter show-popup" data-id="mailus">Написать письмо</a>
					<a href="/contacts/" class="header__adress">Адреса магазинов</a>
					</div><!--end::wr-->
				</div><!--end::header__top-->
				<div class="header__main">
					<div class="wr cl">
						<a href="/" class="header__logo">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/h_logo.jpg" alt="Полимер" width="206" height="44">
						</a>
						<div class="header__phone">+7 (473) 250-22-33</div>
						<div class="header__timework">
							<div class="line cl">
								<div class="days">ПН-ПТ</div>
								<div class="hours">8:00 - 17:00</div>
							</div>
							<div class="line cl">
								<div class="days">CБ</div>
								<div class="hours">8:30 - 16:30</div>
							</div>
							<div class="line cl">
								<div class="days">ВС</div>
								<div class="hours"><span class="weekend">выходной</span></div>
							</div>
						</div>
						<a href="/calc/" class="header__calculation">Бесплатный<br>расчет</a>
						<a href="/price/" class="header__price">Прайс-листы</a>
					</div><!--end::wr-->
				</div><!--end::header__main-->
				<div class="header__bottom">
					<div class="wr cl">
						<div class="header__catalog cl">
							<a href="/catalog/root.php" class="catalog__trigger">
								<span class="i1"></span>
								<span class="i2"></span>
								<span class="i3"></span>
							</a>

							<a href="/catalog/root.php"  class="catalog__name">Каталог товаров</a>

							<div class="catalog-sections-menu">
								<div class="wr">
									<ul class="first-sections">
										<li>
											<a href="/catalog/">
												<img src="<?=SITE_TEMPLATE_PATH?>/img/category_1.png" width="90" height="65" alt="Инженерная сантехника" />
												Инженерная<br />сантехника
											</a>
											<div class="subsections">
												<ul>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Котельное оборудование</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Радиаторы отопления, арматура</a></li>
													<li >
														<a class="dd" href="#">+</a><a href="#" class="title" onclick="return false">Баки расширительные</a>
														<ul class="inner">
															<li><a href="#">Водонагреватели электрические</a></li>
															<li><a href="#">Модели классической круглой формы</a></li>
															<li><a href="#">Модели плоской формы</a></li>
															<li><a href="#">Компактные малоемкостные модели</a></li>
															<li><a href="#">Проточные</a></li>
															<li><a href="#">Запасные части для водонагревателей</a></li>
														</ul>
													</li>
												</ul>
												<ul>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Измерительные приборы</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Бойлеры лапаны, регуляторы давления</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Коллекторные системы</a></li>
												</ul>
												<ul>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Подводка гибкая (вода, газ)</a></li>
													<li><a class="dd" href="#">+</a><a ></a><a href="/catalog/section/" class="title">Счётчики воды и газа</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Сварочные аппараты</a></li>
												</ul>
											</div>
										</li>
										<li>
											<a href="/catalog/">
												<img src="<?=SITE_TEMPLATE_PATH?>/img/category_2.png" width="90" height="65" alt="Строительные материалы" />
												Строительные<br />материалы
											</a>
											<div class="subsections">
												<ul>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Котельное оборудование</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Радиаторы отопления, арматура</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Трубы и фитинги</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Насосное оборудование</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/section/" class="title">Краны шаровые, вентили</a></li>
													<li >
														<a class="dd" href="#">+</a><a href="#" class="title" onclick="return false">Баки расширительные</a>
														<ul class="inner">
															<li><a href="#">Водонагреватели электрические</a></li>
															<li><a href="#">Модели классической круглой формы</a></li>
															<li><a href="#">Модели плоской формы</a></li>
															<li><a href="#">Компактные малоемкостные модели</a></li>
															<li><a href="#">Проточные</a></li>
															<li><a href="#">Запасные части для водонагревателей</a></li>
														</ul>
													</li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Задвижки и затворы</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Баки пластиковые для воды</a></li>
												</ul>
												<ul>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Измерительные приборы</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Бойлеры лапаны, регуляторы давления</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Коллекторные системы</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Оборудование Danfoss, Esbe</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Сантехника</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Воздухоотводчики</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Люки смотровых колодцев</a></li>
												</ul>
												<ul>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Подводка гибкая (вода, газ)</a></li>
													<li><a class="dd" href="#">+</a><a ></a><a href="/catalog/" class="title">Счётчики воды и газа</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Сварочные аппараты</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Теплоизоляция</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">Сопутствующие материалы</a></li>
													<li><a class="dd" href="#">+</a><a href="/catalog/" class="title">РАСПРОДАЖА</a></li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					<div class="header__action">
						<span class="action__title">Акции</span>
						<ul class="action__list">
							<li><a href="/sale/">Черная пятница</a></li>
							<li><a href="/sale/">Наши акции</a></li>
							<li><a href="/sale/">Распродажа</a></li>
							<li><a href="/sale/">Уценка</a></li>
							<li><a href="/sale/">Спецпредложения</a></li>
						</ul>
						<span class="action__arrow"></span>
					</div>
					<div class="header__search">
						<form id="search" class="search" method="get" action="/">
							<input class="search__input input" type="text" placeholder="Поиск" value="">
							<button type="submit" class="search__btn"></button>
						</form>
					</div><!--end::header__search-->
					<a href="/personal/" class="header__account">Личный кабинет</a>

						<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "basket.small", Array(
							"HIDE_ON_BASKET_PAGES" => "Y",	// Не показывать на страницах корзины и оформления заказа
							"PATH_TO_BASKET" => SITE_DIR."personal/cart/",	// Страница корзины
							"PATH_TO_ORDER" => SITE_DIR."personal/order/",	// Страница оформления заказа
							"PATH_TO_PERSONAL" => SITE_DIR."personal/",	// Страница персонального раздела
							"PATH_TO_PROFILE" => SITE_DIR."personal/",	// Страница профиля
							"PATH_TO_REGISTER" => SITE_DIR."login/",	// Страница регистрации
							"POSITION_FIXED" => "N",	// Отображать корзину поверх шаблона
							"SHOW_AUTHOR" => "N",	// Добавить возможность авторизации
							"SHOW_EMPTY_VALUES" => "Y",	// Выводить нулевые значения в пустой корзине
							"SHOW_NUM_PRODUCTS" => "Y",	// Показывать количество товаров
							"SHOW_PERSONAL_LINK" => "Y",	// Отображать персональный раздел
							"SHOW_PRODUCTS" => "N",	// Показывать список товаров
							"SHOW_TOTAL_PRICE" => "Y",	// Показывать общую сумму по товарам
						),
							false
						);?>

					</div><!--end::wr-->
				</div><!--end::header__bottom-->
			</header>
			<?if(!$is_main){?>
			<div class="breadcrumbs cl">
	            <div class="wr">
	               <a href="#">Главная</a>
	               <span>Контакты</span>
	            </div>
	         </div><!--end::breadcrumbs-->
	         <?}?>
			<?if($is_main){?>
	        <div class="mp__banners cl">

				<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider-home", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
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
			0 => "CODE",
			1 => "NAME",
			2 => "PREVIEW_TEXT",
			3 => "PREVIEW_PICTURE",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "slider",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
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
		"COMPONENT_TEMPLATE" => "slider-home"
	),
	false
);?>

				<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"baners-home", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
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
			0 => "CODE",
			1 => "NAME",
			2 => "PREVIEW_TEXT",
			3 => "PREVIEW_PICTURE",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "baners",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
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
		"COMPONENT_TEMPLATE" => "baners-home"
	),
	false
);?>


	        </div><!--end::mp__banners-->
	        <?}?>
         	<div class="wr">
         		<?if(!$is_main && $pages[1] !== 'basket' && !($pages[1] == 'catalog' && $pages[3])){?>
	            <div class="page_content">
	            	<?if(!$noh1){?>
	               	<h1><?//$APPLICATION->ShowTitle(false)?></h1>
	               	<?$APPLICATION->IncludeComponent("bitrix:menu", "section", Array(
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"MAX_LEVEL" => "1",	// Уровень вложенности меню
							"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
								0 => "",
							),
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_TYPE" => "AUTO",	// Тип кеширования
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
							"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						),
						false
					); // mm__menu?>
	               	<?}?>
	            <?}?>