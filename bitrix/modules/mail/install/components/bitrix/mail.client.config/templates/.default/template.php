<?php

use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$newPath = \CComponentEngine::makePathFromTemplate(
	$arParams['PATH_TO_MAIL_CONFIG'],
	array('act' => 'new')
);

if (!$arResult['CAN_CONNECT_NEW_MAILBOX'])
{
	if (\CModule::includeModule('bitrix24'))
	{
		\CJsCore::init('popup');
		\CBitrix24::initLicenseInfoPopupJS();
	}
}

?>
<div class="mail-add">
	<div class="mail-add-inner">
		<div class="mail-add-header">
			<div class="mail-add-title"><?=Loc::getMessage('MAIL_CLIENT_CONFIG_PROMPT') ?></div>
			<div class="mail-add-desc"></div>
		</div>
		<div class="mail-add-services">
			<div class="mail-add-list">
				<? foreach ($arParams['SERVICES'] as $id => $settings): ?>
					<? if ($settings['type'] != 'imap') continue; ?>
					<a class="mail-add-item"
						<? if ($arResult['CAN_CONNECT_NEW_MAILBOX']): ?>
							href="<?=htmlspecialcharsbx(\CHTTP::urlAddParams($newPath, array('id' => $id))) ?>"
						<? else: ?>
							onclick="showLicenseInfoPopup('limit')"
						<? endif ?>>
						<? if ($settings['icon']): ?>
							<img class="mail-add-img" src="<?=$settings['icon'] ?>" alt="<?=htmlspecialcharsbx($settings['name']) ?>">
						<? else: ?>
							<span class="mail-add-text <? if (strlen($settings['name']) > 10): ?> mail-add-text-small"<? endif ?>">
								&nbsp;<?=htmlspecialcharsbx($settings['name']) ?>&nbsp;
							</span>
						<? endif ?>
					</a>
				<? endforeach ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	if (window === top.window)
	{
		BX.addCustomEvent(
			'SidePanel.Slider:onMessage',
			function (event)
			{
				if (event.getEventId() == 'mail-mailbox-config-success')
				{
					window.location.href = '<?=\CUtil::jsEscape($arParams['PATH_TO_MAIL_MSG_LIST']) ?>'.replace('#id#', event.data.id);

					top.BX.SidePanel.Instance.closeAll();
				}
			}
		);
	}

	function showLicenseInfoPopup(id)
	{
		B24 && B24.licenseInfoPopup && B24.licenseInfoPopup.show(
			'mail_setup_' + id,
			'<?=\CUtil::jsEscape(Loc::getMessage('MAIL_MAILBOX_LICENSE_CONNECTED_MAILBOXES_LIMIT_TITLE')) ?>',
			'<?=\CUtil::jsEscape(Loc::getMessage(
				'MAIL_MAILBOX_LICENSE_CONNECTED_MAILBOXES_LIMIT_BODY',
				array('#LIMIT#' => $arResult['MAX_ALLOWED_CONNECTED_MAILBOXES'])
			)) ?>'
		);
	}

	<? if (!$arResult['CAN_CONNECT_NEW_MAILBOX']): ?>
		showLicenseInfoPopup('limit');
	<? endif ?>

</script>
