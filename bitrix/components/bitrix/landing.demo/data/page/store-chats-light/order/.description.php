<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'code' => 'store-chats-light/order',
	'name' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_LIGHT-ORDER-NAME'),
	'description' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_LIGHT-ORDER-DESC'),
	'type' => 'store',
	'version' => 3,
	'fields' => array(
		'RULE' => NULL,
		'ADDITIONAL_FIELDS' => array(
			'METAOG_TITLE' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_LIGHT-ORDER-RICH_NAME'),
			'METAOG_DESCRIPTION' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_LIGHT-ORDER-RICH_DESC'),
			'METAOG_IMAGE' => 'https://cdn.bitrix24.site/bitrix/images/demo/page/store-chats/order/preview.jpg',
			'VIEW_USE' => 'N',
			'VIEW_TYPE' => 'no',
			'THEME_CODE' => '3corporate',
			'THEME_CODE_TYPO' => '3corporate',
		),
	),
	

	'items' => array(
		'0' => array(
			'code' => '27.one_col_fix_title_and_text_2',
			'access' => 'X',
			'nodes' => array(
				'.landing-block-node-title' => array(
					0 => 'Order information',
				),
				'.landing-block-node-text' => array(
					0 => 'Sed feugiat porttitor nunc, non dignissim ipsum vestibulum in. Donec in blandit dolor.',
				),
			),
			'style' => array(
				'#wrapper' => array(
					0 => 'landing-block js-animation animation-none g-pt-0 g-pb-5 u-block-border u-block-border-margin-sm animation-none',
				),
				'.landing-block-node-title' => array(
					0 => 'landing-block-node-title h2 g-color-gray-dark-v1 text-left g-font-size-27',
				),
				'.landing-block-node-text' => array(
					0 => 'landing-block-node-text g-pb-1 g-color-gray-dark-v4 g-font-size-16 text-left',
				),
			),
		),
		'1' => array(
			'code' => 'store.salescenter.order.details',
			'nodes' => array(
				'bitrix:salescenter.order.details' => array(
					'TEMPLATE_MODE' => 'lightmode',
				)
			),
		),
		'2' => array(
			'code' => '52.3.mini_text_titile_with_btn_right',
			'access' => 'X',
			'nodes' => array(
				'.landing-block-node-text' => array(
					0 => '<a href="tel:+469548521" target="_self">+469 548 521</a>',
				),
				'.landing-block-node-button' => array(
					0 => array(
						'href' => 'tel:+469548521',
						'text' => 'Call now',
					),
				),
			),
			'style' => array(
				'.landing-block-node-container' => array(
					0 => 'landing-block-node-container row g-flex-centered align-items-center',
				),
				'.landing-block-node-title' => array(
					0 => 'landing-block-node-title h6 g-color-gray-dark-v4 g-mb-5 text-left g-font-size-16',
				),
				'.landing-block-node-text-container' => array(
					0 => 'landing-block-node-text-container text-left col-8 js-animation animation-none',
				),
				'.landing-block-node-text' => array(
					0 => 'landing-block-node-text g-color-gray-dark-v1 g-font-size-16',
				),
				'.landing-block-node-button-container' => array(
					0 => 'landing-block-node-button-container text-right col-4 js-animation slideInRight d-flex justify-content-end',
				),
				'.landing-block-node-button' => array(
					0 => 'landing-block-node-button btn btn-sm text-uppercase g-px-15 font-weight-bold g-mb-0 g-rounded-15 g-color-primary u-btn-outline-primary g-color-white--hover',
				),
				'#wrapper' => array(
					0 => 'landing-block g-pt-10 g-pb-10 g-bg-white u-block-border u-block-border-margin-md g-rounded-6',
				),
			),
		),
		'3' => array(
			'code' => '27.one_col_fix_title_and_text_2',
			'access' => 'X',
			'nodes' => array(
				'.landing-block-node-title' => array(
					0 => 'Address',
				),
				'.landing-block-node-text' => array(
					0 => '61 Oxford str., London, 3DG',
				),
			),
			'style' => array(
				'.landing-block-node-title' => array(
					0 => 'landing-block-node-title h2 g-color-gray-dark-v4 g-font-size-16 text-left g-mb-5',
				),
				'.landing-block-node-text' => array(
					0 => 'landing-block-node-text g-pb-1 g-color-gray-dark-v1 g-font-size-16 text-left',
				),
				'#wrapper' => array(
					0 => 'landing-block js-animation animation-none g-pt-10 g-pb-10 u-block-border-first g-rounded-6 u-block-border-margin-md u-block-border g-bg-white',
				),
			),
		),
		'4' => array(
			'code' => '16.1.google_map',
			'access' => 'X',
			'style' => array(
				'#wrapper' => array(
					0 => 'landing_block g-height-1 g-min-height-70vh u-block-border u-block-border-margin-md g-rounded-6 u-block-border-end g-bg-white g-pt-10 g-pb-10 g-pl-10 g-pr-10',
				),
			),
		),
		'5' => array(
			'code' => '55.1.list_of_links',
			'access' => 'X',
			'cards' => array(
				'.landing-block-node-list-item' => array(
					'source' => array(
						0 => array(
							'value' => 0,
							'type' => 'card',
						),
						1 => array(
							'value' => 0,
							'type' => 'card',
						),
						2 => array(
							'value' => 0,
							'type' => 'card',
						),
					),
				),
			),
			'nodes' => array(
				'.landing-block-node-link' => array(
					0 => array(
						'href' => '#landing@landing[store-chats-light/about]',
						'target' => '_self',
					),
					1 => array(
						'href' => '#landing@landing[store-chats-light/contacts]',
						'target' => '_self',
					),
					2 => array(
						'href' => '#landing@landing[store-chats-light/webform]',
						'target' => '_self',
					),
				),
				'.landing-block-node-link-text' => array(
					0 => 'About us',
					1 => 'Contacts',
					2 => 'Webform',
				),
			),
			'style' => array(
				'.landing-block-node-list-container' => array(
					0 => 'landing-block-node-list-container row no-gutters justify-content-center',
				),
				'.landing-block-node-list-item' => array(
					0 => 'landing-block-node-list-item g-brd-bottom g-brd-1 g-py-12 js-animation animation-none landing-card g-brd-gray-light-v5 g-font-size-18',
					1 => 'landing-block-node-list-item g-brd-bottom g-brd-1 g-py-12 js-animation animation-none landing-card g-brd-gray-light-v5 g-font-size-18',
					2 => 'landing-block-node-list-item g-brd-bottom g-brd-1 g-py-12 js-animation animation-none landing-card g-brd-gray-light-v5 g-font-size-18',
				),
				'.landing-block-node-link' => array(
					0 => 'landing-block-node-link row no-gutters justify-content-between align-items-center g-text-decoration-none--hover g-color-primary--hover g-font-size-18 g-color-gray-dark-v1',
					1 => 'landing-block-node-link row no-gutters justify-content-between align-items-center g-text-decoration-none--hover g-color-primary--hover g-font-size-18 g-color-gray-dark-v1',
					2 => 'landing-block-node-link row no-gutters justify-content-between align-items-center g-text-decoration-none--hover g-color-primary--hover g-font-size-18 g-color-gray-dark-v1',
				),
				'#wrapper' => array(
					0 => 'landing-block g-pt-10 g-pb-10 g-pl-15 g-pr-15 u-block-border u-block-border-margin-md g-rounded-6 g-bg-white',
				),
			),
		),
	),
);