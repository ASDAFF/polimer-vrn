<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

return array(
	'code' => 'store-chats-dark/contacts',
	'name' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_DARK-CONTACTS-NAME'),
	'description' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_DARK-CONTACTS-DESC'),
	'type' => 'store',
	'version' => 3,
	'fields' => array(
		'RULE' => null,
		'ADDITIONAL_FIELDS' => array(
			'METAOG_TITLE' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_DARK-CONTACTS-RICH_NAME'),
			'METAOG_DESCRIPTION' => Loc::getMessage('LANDING_DEMO_STORE_CHATS_DARK-CONTACTS-RICH_DESC'),
			'METAOG_IMAGE' => 'https://cdn.bitrix24.site/bitrix/images/demo/page/store-chats/contacts/preview.jpg',
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
					0 => 'Contact us',
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
					0 => 'landing-block-node-title h2 g-color-white text-left g-font-size-27',
				),
				'.landing-block-node-text' => array(
					0 => 'landing-block-node-text g-pb-1 g-color-white g-font-size-16 text-left',
				),
			),
		),
		'1' => array(
			'code' => '27.3.one_col_fix_title',
			'access' => 'X',
			'nodes' => array(
				'.landing-block-node-title' => array(
					0 => 'We are online',
				),
			),
			'style' => array(
				'.landing-block-node-title' => array(
					0 => 'landing-block-node-title h2 g-color-white-opacity-0_7 text-left g-font-size-16 g-mb-5',
				),
				'#wrapper' => array(
					0 => 'landing-block js-animation animation-none g-pt-10 g-pb-5 u-block-border-first g-rounded-6 u-block-border-margin-md u-block-border g-theme-bitrix-bg-dark-v1',
				),
			),
		),
		'2' => array(
			'code' => '15.social',
			'access' => 'X',
			'nodes' => array(),
			'style' => array(
				'.landing-block-node-list-item-link' => array(
					0 => 'landing-block-node-list-item-link d-block g-color-white text-center g-font-size-24 g-pt-10 g-pb-10 g-pl-30 g-pr-30 g-bg-facebook--hover g-bg-facebook g-mb-10 g-ml-5 g-mr-5',
					1 => 'landing-block-node-list-item-link d-block g-color-white text-center g-font-size-24 g-pt-10 g-pb-10 g-pl-30 g-pr-30 g-bg-instagram--hover g-bg-instagram g-mb-10 g-ml-5 g-mr-5',
					2 => 'landing-block-node-list-item-link d-block g-color-white text-center g-font-size-24 g-pt-10 g-pb-10 g-pl-30 g-pr-30 g-bg-twitter--hover g-bg-twitter g-mb-10 g-ml-5 g-mr-5',
					3 => 'landing-block-node-list-item-link d-block g-color-white text-center g-font-size-24 g-pt-10 g-pb-10 g-pl-30 g-pr-30 g-bg-youtube--hover g-bg-youtube g-mb-10 g-ml-5 g-mr-5',
					4 => 'landing-block-node-list-item-link d-block g-color-white text-center g-font-size-24 g-pt-10 g-pb-10 g-pl-30 g-pr-30 g-bg-telegram--hover g-bg-telegram g-mb-10 g-ml-5 g-mr-5',
					5 => 'landing-block-node-list-item-link d-block g-color-white text-center g-font-size-24 g-pt-10 g-pb-10 g-pl-30 g-pr-30 g-bg-whatsapp--hover g-bg-whatsapp g-mb-10 g-ml-5 g-mr-5',
				),
				'#wrapper' => array(
					0 => 'landing-block u-block-border u-block-border-margin-md g-rounded-6 u-block-border-end g-theme-bitrix-bg-dark-v1',
				),
			),
		),
		'3' => array(
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
					0 => 'landing-block-node-title h6 g-color-white-opacity-0_7 g-mb-5 text-left g-font-size-16',
				),
				'.landing-block-node-text-container' => array(
					0 => 'landing-block-node-text-container text-left col-8 js-animation animation-none',
				),
				'.landing-block-node-text' => array(
					0 => 'landing-block-node-text g-color-white g-font-size-16',
				),
				'.landing-block-node-button-container' => array(
					0 => 'landing-block-node-button-container text-right col-4 js-animation animation-none d-flex justify-content-end',
				),
				'.landing-block-node-button' => array(
					0 => 'landing-block-node-button btn btn-sm text-uppercase g-px-15 font-weight-bold g-mb-0 g-rounded-15 u-btn-outline-gray g-color-primary',
				),
				'#wrapper' => array(
					0 => 'landing-block g-pt-10 g-pb-10 g-theme-bitrix-bg-dark-v1 u-block-border u-block-border-margin-md g-rounded-6',
				),
			),
		),
		'4' => array(
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
					0 => 'landing-block-node-title h2 g-color-white-opacity-0_7 g-font-size-16 text-left g-mb-5',
				),
				'.landing-block-node-text' => array(
					0 => 'landing-block-node-text g-pb-1 g-color-white g-font-size-16 text-left',
				),
				'#wrapper' => array(
					0 => 'landing-block js-animation animation-none g-pt-10 g-pb-10 u-block-border-first g-rounded-6 u-block-border-margin-md u-block-border g-theme-bitrix-bg-dark-v1',
				),
			),
		),
		'5' => array(
			'code' => '16.1.google_map',
			'access' => 'X',
			'style' => array(
				'#wrapper' => array(
					0 => 'landing_block g-height-1 g-min-height-50vh u-block-border u-block-border-margin-md g-rounded-6 u-block-border-end g-theme-bitrix-bg-dark-v1 g-pt-10 g-pb-10 g-pl-10 g-pr-10',
				),
			),
		),
		'6' => array(
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
						'href' => '#landing@landing[store-chats-dark/about]',
						'target' => '_self',
					),
					1 => array(
						'href' => '#landing@landing[store-chats-dark/payinfo]',
						'target' => '_self',
					),
					2 => array(
						'href' => '#landing@landing[store-chats-dark/webform]',
						'target' => '_self',
					),
				),
				'.landing-block-node-link-text' => array(
					0 => 'About us',
					1 => 'Payment Information',
					2 => 'Webform',
				),
			),
			'style' => array(
				'.landing-block-node-list-container' => array(
					0 => 'landing-block-node-list-container row no-gutters justify-content-center',
				),
				'.landing-block-node-list-item' => array(
					0 => 'landing-block-node-list-item g-brd-bottom g-brd-1 g-py-12 js-animation animation-none landing-card g-brd-white-opacity-0_2 g-font-size-18',
					1 => 'landing-block-node-list-item g-brd-bottom g-brd-1 g-py-12 js-animation animation-none landing-card g-brd-white-opacity-0_2 g-font-size-18',
					2 => 'landing-block-node-list-item g-brd-bottom g-brd-1 g-py-12 js-animation animation-none landing-card g-brd-white-opacity-0_2 g-font-size-18',
				),
				'.landing-block-node-link' => array(
					0 => 'landing-block-node-link row no-gutters justify-content-between align-items-center g-text-decoration-none--hover g-color-primary--hover g-font-size-18 g-color-white',
					1 => 'landing-block-node-link row no-gutters justify-content-between align-items-center g-text-decoration-none--hover g-color-primary--hover g-font-size-18 g-color-white',
					2 => 'landing-block-node-link row no-gutters justify-content-between align-items-center g-text-decoration-none--hover g-color-primary--hover g-font-size-18 g-color-white',
				),
				'#wrapper' => array(
					0 => 'landing-block g-pt-10 g-pb-10 g-pl-15 g-pr-15 u-block-border u-block-border-margin-md g-rounded-6 g-theme-bitrix-bg-dark-v1',
				),
			),
		),
	),
);