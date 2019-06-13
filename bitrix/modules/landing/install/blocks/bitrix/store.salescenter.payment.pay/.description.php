<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

$return = array(
	'block' => array(
		'name' => Loc::getMessage('LANDING_BLOCK_STORE_SALESCENTER_PAYMENT_PAY-NAME'),
		'section' => array('store'),
		'type' => 'null',
		'namespace' => 'bitrix'
	),
	'nodes' => array(
		'bitrix:salescenter.payment.pay' => array(
			'type' => 'component',
			'extra' => array(
				'editable' => array(
					// visual
					'TEMPLATE_MODE' => array(
						'style' => true,
					),
				),
			),
		),
	),
	'style' => array(
		'block' => array(
			'type' => array('block-default'),
		),
		'nodes' => array(),
	),
);


return $return;