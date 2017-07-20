<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>


<?$APPLICATION->IncludeComponent("bitrix:catalog.products.viewed", "products-viewed", Array(
    "ACTION_VARIABLE" => "action_cpv",	// Название переменной, в которой передается действие
    "ADDITIONAL_PICT_PROP_10" => "-",
    "ADDITIONAL_PICT_PROP_11" => "-",	// Дополнительная картинка
    "ADDITIONAL_PICT_PROP_12" => "-",	// Дополнительная картинка
    "ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
    "ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
    "BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
    "CACHE_TIME" => "3600",	// Время кеширования (сек.)
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CART_PROPERTIES_10" => array(
        0 => "",
        1 => "",
    ),
    "CART_PROPERTIES_11" => array(	// Свойства для добавления в корзину
        0 => "",
        1 => "",
    ),
    "CART_PROPERTIES_12" => array(	// Свойства для добавления в корзину
        0 => "",
        1 => "",
    ),
    "CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
    "DEPTH" => "2",	// Максимальная отображаемая глубина разделов
    "DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
    "ENLARGE_PRODUCT" => "STRICT",	// Выделять товары в списке
    "HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
    "HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Торговые предложения, недоступные для покупки
    "IBLOCK_ID" => "11",	// �?нфоблок
    "IBLOCK_MODE" => "single",	// Показывать товары из
    "IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
    "LABEL_PROP_10" => "",
    "LABEL_PROP_11" => "",	// Свойство меток товара
    "LABEL_PROP_POSITION" => "top-left",	// Расположение меток товара
    "MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
    "MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
    "MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
    "MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
    "MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
    "OFFER_TREE_PROPS_12" => "",	// Свойства для группировки
    "PAGE_ELEMENT_COUNT" => "9",	// Количество элементов на странице
    "PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
    "PRICE_CODE" => "",	// Тип цены
    "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
    "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",	// Порядок отображения блоков товара
    "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
    "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
    "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
    "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",	// Вариант отображения товаров
    "PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
    "PROPERTY_CODE_10" => array(
        0 => "",
        1 => "",
    ),
    "PROPERTY_CODE_11" => array(	// Свойства для отображения
        0 => "",
        1 => "",
    ),
    "PROPERTY_CODE_12" => array(	// Свойства для отображения
        0 => "",
        1 => "",
    ),
    "PROPERTY_CODE_MOBILE_11" => "",	// Свойства товаров, отображаемые на мобильных устройствах
    "SECTION_CODE" => "",	// Код раздела
    "SECTION_ELEMENT_CODE" => "",	// Символьный код элемента, для которого будет выбран раздел
    "SECTION_ELEMENT_ID" => $GLOBALS["CATALOG_CURRENT_ELEMENT_ID"],	// ID элемента, для которого будет выбран раздел
    "SECTION_ID" => $GLOBALS["CATALOG_CURRENT_SECTION_ID"],	// ID раздела
    "SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
    "SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
    "SHOW_FROM_SECTION" => "N",	// Показывать товары из раздела
    "SHOW_MAX_QUANTITY" => "N",	// Показывать остаток товара
    "SHOW_OLD_PRICE" => "N",	// Показывать старую цену
    "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
    "SHOW_PRODUCTS_10" => "N",
    "SHOW_PRODUCTS_11" => "N",
    "SHOW_SLIDER" => "N",	// Показывать слайдер для товаров
    "SLIDER_INTERVAL" => "3000",
    "SLIDER_PROGRESS" => "N",
    "TEMPLATE_THEME" => "blue",	// Цветовая тема
    "USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
    "USE_PRICE_COUNT" => "N",	// �?спользовать вывод цен с диапазонами
    "USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
    "COMPONENT_TEMPLATE" => ".default",
    "SET_VIEWED_IN_COMPONENT" => "Y"
),
    false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>