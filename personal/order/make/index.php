<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заказы");
?><?$APPLICATION->IncludeComponent(
	"nbrains:sale.order.full", 
	"make-order", 
	array(
		"ALLOW_PAY_FROM_ACCOUNT" => "Y",
		"CITY_OUT_LOCATION" => "Y",
		"COUNT_DELIVERY_TAX" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "Y",
		"DELIVERY_NO_SESSION" => "N",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"PATH_TO_AUTH" => "/auth.php",
		"PATH_TO_BASKET" => "basket.php",
		"PATH_TO_PAYMENT" => "payment.php",
		"PATH_TO_PERSONAL" => "index.php",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "Y",
		"PROP_1" => array(
		),
		"PROP_2" => array(
		),
		"SEND_NEW_USER_NOTIFY" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_AJAX_DELIVERY_LINK" => "Y",
		"SHOW_MENU" => "Y",
		"USE_AJAX_LOCATIONS" => "Y",
		"COMPONENT_TEMPLATE" => "make-order"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>