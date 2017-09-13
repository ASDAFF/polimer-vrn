<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Loader;
global $APPLICATION;
if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}
if (isset($templateData['TEMPLATE_LIBRARY']) && !empty($templateData['TEMPLATE_LIBRARY']))
{
	$loadCurrency = false;
	if (!empty($templateData['CURRENCIES']))
		$loadCurrency = Loader::includeModule('currency');
	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);
	if ($loadCurrency)
	{
	?>
	<script type="text/javascript">
		BX.Currency.setCurrencies(<? echo $templateData['CURRENCIES']; ?>);
	</script>
<?
	}
}
if (isset($templateData['JS_OBJ']))
{
?><script type="text/javascript">
BX.ready(BX.defer(function(){
	if (!!window.<? echo $templateData['JS_OBJ']; ?>)
	{
		window.<? echo $templateData['JS_OBJ']; ?>.allowViewedCount(true);
	}
}));
</script><?
}
?>

<?$APPLICATION->IncludeComponent(
	"nbrains:main.feedback",
	"buy-one-click",
	array(
		"EMAIL_TO" => "sale@polimer-vrn",
		"EVENT_MESSAGE_ID" => array(
			0 => "90",
		),
		"IBLOCK_ID" => "15",
		"IBLOCK_TYPE" => "feedback",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"PROPERTY_CODE" => array(
			0 => "FIO",
			1 => "PHONE",
			2 => "EMAIL",
			3 => "RULE",
			4 => "PRODUCT",
			5 => "LINK_PRODUCT",
			6 => "IMG_PRODUCT",
			7 => "PRICE",
		),
		"USE_CAPTCHA" => "N",
		"COMPONENT_TEMPLATE" => "buy-one-click",
		"PRODUCT" => array(
			"NAME" => $arResult['NAME'],
			"LINK" => $arResult['DETAIL_PAGE_URL'],
			"IMG" => CFile::GetPath($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'][0]),
			"PRICE" => $arResult['ITEM_PRICES'][0]['UNROUND_PRICE'],
		)
	),
	false
);?>
