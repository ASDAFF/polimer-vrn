<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'parent' => 'store-chats-dark',
	'code' => 'store-chats-dark/footer',
	'name' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_DARK-FOOTER-NAME'),
	'description' => '',
	'active' => true,
	'preview' => '',
	'preview2x' => '',
	'preview3x' => '',
	'preview_url' => '',
	'show_in_list' => 'N',
	'type' => 'store',
	'version' => 3,
	'fields' => array(
		'TITLE' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_DARK-FOOTER-NAME'),
		'RULE' => null,
		'ADDITIONAL_FIELDS' => array(
			'VIEW_USE' => 'N',
			'VIEW_TYPE' => 'no',
			'THEME_CODE' => '3corporate',
			'THEME_CODE_TYPO' => '3corporate',
		),
	),
	'layout' => array(),
	'items' => array(
		'0' => array(
			'code' => '17.copyright',
			'nodes' => array(
				'.landing-block-node-text' => array(
					0 => '2019 &copy; All rights reserved',
				),
			),
		),
	),
);