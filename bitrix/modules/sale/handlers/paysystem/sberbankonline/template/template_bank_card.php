<?
use Bitrix\Main\Page\Asset,
	Bitrix\Main\Localization\Loc;

Asset::getInstance()->addCss("/bitrix/themes/.default/sale.css");

Loc::loadMessages(__FILE__);

$sum = roundEx($params['SUM'], 2);
?>
<style>
	<?include_once "style.css" ?>
</style>

<div class="sale-paysystem-wrapper">
	<span class="tablebodytext">
		<?=Loc::getMessage('SALE_HANDLERS_PAY_SYSTEM_SBERBANK_DESCRIPTION')." ".SaleFormatCurrency($params['SUM'], $params['CURRENCY']);?>
	</span>
	<div class="sale-paysystem-sberbank-button-container">
		<form action="<?=$params['URL']?>" method="GET">
			<?
			if (isset($params['FORM_PARAMS']))
			{
				foreach ($params['FORM_PARAMS'] as $param => $value)
				{
					?>
					<input type="hidden" name="<?=$param?>" value="<?=$value?>">
					<?
				}
			}
			?>
			<span class="sale-paysystem-sberbank-button">
				<input class="sale-paysystem-sberbank-button-item" name="registerOrder" value="<?=Loc::getMessage('SALE_HANDLERS_PAY_SYSTEM_SBERBANK_BUTTON_PAID')?>" type="submit">
			</span>
			<span class="sale-paysystem-sberbank-button-descrition"><?=Loc::getMessage('SALE_HANDLERS_PAY_SYSTEM_SBERBANK_REDIRECT');?></span>
		</form>
	</div>
	<p>
		<span class="tablebodytext sale-paysystem-description">
			<?=Loc::getMessage('SALE_HANDLERS_PAY_SYSTEM_SBERBANK_WARNING_RETURN');?>
		</span>
	</p>
</div>