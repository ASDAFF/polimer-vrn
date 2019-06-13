<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

$return = array(
	'block' => array(
		'name' => Loc::getMessage('LANDING_BLOCK_STORE_SALESCENTER_ORDER_DETAIL-NAME'),
		'section' => array('store'),
		'type' => 'null',
		'namespace' => 'bitrix'
	),
	'nodes' => array(
		"bitrix:salescenter.order.details" => array(
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