<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(dirname(__FILE__).'/.description.php');	//messages can not be loaded from lang/block.php

/**
 * @var StoreSalescenterOrderDetails $classBlock
 */
?>
<section class="landing-block g-pt-10 g-pb-10">
	<div class="container g-font-size-13">
		<?
		if (\Bitrix\Landing\Landing::getEditMode())
		{
			echo '
			<div class="g-min-height-200 g-flex-centered">
				<div class="g-pa-10 g-brd-html-dashed g-bg-white-opacity-0_8">
					'. Loc::getMessage('LANDING_BLOCK_STORE_SALESCENTER_ORDER_DETAIL-ALERT') .'
				</div>
			</div>
			';
		}
		else
		{
			$APPLICATION->IncludeComponent(
				'bitrix:salescenter.order.details',
				'.default',
				[
					'ID' => $classBlock->get('ORDER_ID'),
					'TEMPLATE_MODE' => 'lightmode',
					'ACTIVE_DATE_FORMAT' => 'd F Y',
					'ALLOW_SELECT_PAYMENT_PAY_SYSTEM' => 'Y',
				],
				false
			);
		}
		?>
	</div>
</section>
