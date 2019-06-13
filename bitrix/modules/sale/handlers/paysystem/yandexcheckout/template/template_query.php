<?
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

Bitrix\Main\Page\Asset::getInstance()->addCss("/bitrix/themes/.default/sale.css");

Loc::loadMessages(__FILE__);

$documentRoot = Application::getDocumentRoot();
$sum = round($params['SUM'], 2);
?>

<style>
	<?
	include_once $documentRoot."/bitrix/css/sale/flag.css";
	include_once "style.css";
	?>
</style>

<div class="paysystem-yandex darkmode" id="paysystem-yandex">
	<div class="order-payment-method-description">
		<form id="paysystem-yandex-form">
			<p class="mb-2"><?=Loc::getMessage('SALE_HANDLERS_PAY_SYSTEM_YANDEX_CHECKOUT_DESCRIPTION');?></p>
			<p class="mb-2"><?=Loc::getMessage('SALE_HANDLERS_PAY_SYSTEM_YANDEX_CHECKOUT_DESCRIPTION_SUM')." ".SaleFormatCurrency($params['SUM'], $params['CURRENCY']);?></p>
			<?if (isset($params['FIELDS'])):?>
				<fieldset class="paysystem-yandex-fieldset">
					<?foreach ($params['FIELDS'] as $field):?>
						<?if (in_array($field, $params['PHONE_FIELDS'])):?>
							<div class="paysystem-yandex-field-phone paysystem-yandex-success mb-4">
								<div class="paysystem-yandex-label-title-container">
									<div class="paysystem-yandex-label-title">
										<label for="<?=$field?>" class="paysystem-yandex-label "><?=Loc::getMessage('SALE_HANDLERS_PAY_SYSTEM_YANDEX_CHECKOUT_'.ToUpper($params['PAYMENT_METHOD']).'_'.ToUpper($field));?>:</label>
									</div>
								</div>
								<div class="paysystem-yandex-group">
									<div class="paysystem-yandex-label-content">
										<label class="paysystem-yandex-input-label">
											<i class="paysystem-yandex-icon fa fa-phone"></i>
											<span class="paysystem-yandex-input-phone-flag bx-flag-24 ru"></span>
											<input name="<?=$field;?>" value="" class="paysystem-yandex-input paysystem-yandex-input-phone" id="<?=$field?>" autocomplete="off" type="text" placeholder="">
										</label>
									</div>
								</div>
							</div>
						<?else:?>
							<div class="form-group paysystem-yandex-group" >
								<label for="<?=$field;?>"><?=Loc::getMessage('SALE_HANDLERS_PAY_SYSTEM_YANDEX_CHECKOUT_'.ToUpper($params['PAYMENT_METHOD']).'_'.ToUpper($field));?></label>
								<input type="text" name="<?=$field;?>" class="form-control" id="<?=$field;?>">
							</div>
						<?endif;?>
					<?endforeach;?>
				</fieldset>
			<?endif;?>
			<input class="landing-block-node-button text-uppercase btn btn-xl u-btn-primary g-font-weight-700 g-font-size-12 g-rounded-50" name="BuyButton" value="<?=Loc::getMessage('SALE_HANDLERS_PAY_SYSTEM_YANDEX_CHECKOUT_BUTTON_NEXT')?>" type="submit">
		</form>
	</div>
</div>

<?
$phoneCountryCode = null;
if (Bitrix\Main\Loader::includeModule('bitrix24'))
{
	$zone = \CBitrix24::getPortalZone();
	$zone = strtolower($zone);
	if (in_array($zone, array('kz', 'by', 'ua')))
	{
		$phoneCountryCode = $zone;
	}
}
?>

<script>
	<?
	include_once $documentRoot.'/bitrix/js/sale/masked.js';
	include_once 'script.js';
	?>

	BX.ready(function(){
		BX.PaymentPhoneForm = new BX.Sale.Yandexcheckout.PaymentPhoneForm(<?=CUtil::PhpToJSObject([
			'form' => 'paysystem-yandex-form',
			'phoneFormatDataUrl' => '/bitrix/js/sale/phone_mask',
			'phoneCountryCode' => $phoneCountryCode,
		])?>);

		BX.Sale.Yandexcheckout.init({
			formId: 'paysystem-yandex-form',
			paysystemBlockId: 'paysystem-yandex',
			ajaxUrl: '/bitrix/tools/sale_ps_ajax.php',
			paymentId: '<?=CUtil::JSEscape($params['PAYMENT_ID'])?>',
			paySystemId: '<?=CUtil::JSEscape($params['PAYSYSTEM_ID'])?>'
		});
	});
</script>