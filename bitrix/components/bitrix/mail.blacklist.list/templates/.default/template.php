<?php

use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}
\Bitrix\Main\UI\Extension::load("ui.forms");
\Bitrix\Main\UI\Extension::load('ui.buttons');
\CJSCore::init("sidepanel");
$isIframe = isset($arResult["IFRAME"]) && $arResult["IFRAME"] === "Y";

$bodyClass = $APPLICATION->getPageProperty('BodyClass', false);
$APPLICATION->setPageProperty('BodyClass', trim(sprintf('%s %s', $bodyClass, 'pagetitle-toolbar-field-view pagetitle-mail-view')));

if ($isIframe):?>
<div class="mail-blacklist-is-iframe">
<?endif;

if (SITE_TEMPLATE_ID == 'bitrix24' && !$isIframe)
{
	$this->setViewTarget('inside_pagetitle'); ?>

	<div class="pagetitle-container pagetitle-flexible-space">
		<? $APPLICATION->includeComponent(
			'bitrix:main.ui.filter', '',
			[
				'FILTER_ID' => $arResult['FILTER_ID'],
				'GRID_ID' => $arResult['GRID_ID'],
				'ENABLE_LABEL' => true,
				'FILTER' => $arResult['FILTER'],
			]
		); ?>
	</div>

	<button class="ui-btn ui-btn-primary mail-blacklist-create-btn" data-role="blacklist-create-btn">
		<?= Loc::getMessage('MAIL_BLACKLIST_LIST_CREATE_BLACKLIST') ?>
	</button>

	<? $this->endViewTarget();
}
else
{
	$APPLICATION->includeComponent(
		'bitrix:main.ui.filter', '',
		[
			'FILTER_ID' => $arResult['FILTER_ID'],
			'GRID_ID' => $arResult['GRID_ID'],
			'ENABLE_LABEL' => true,
			'FILTER' => $arResult['FILTER'],
		]
	);?>
	<?$this->setViewTarget('pagetitle');?>
	<button class="ui-btn ui-btn-primary mail-blacklist-create-btn" data-role="blacklist-create-btn">
		<?= Loc::getMessage('MAIL_BLACKLIST_LIST_CREATE_BLACKLIST') ?>
	</button>
	<?$this->endViewTarget('pagetitle');
}

$APPLICATION->SetTitle(Loc::getMessage('MAIL_BLACKLIST_LIST_PAGE_TITLE'));

$arResult['GRID_DATA'] = $arColumns = [];

foreach ($arResult['ITEMS'] as $item)
{
	$gridActions = [];

	if ($item['CAN_DELETE'])
	{
		$gridActions[] = [
			'ICONCLASS' => 'menu-popup-item-delete',
			'TITLE' => Loc::getMessage('MAIL_BLACKLIST_LIST_DELETE_TITLE'),
			'TEXT' => Loc::getMessage('MAIL_BLACKLIST_LIST_DELETE_TEXT'),
			'ONCLICK' => "BX.Mail.Blacklist.List.onDeleteClick('" . CUtil::JSEscape($arResult['GRID_ID']) . "','" . CUtil::JSEscape($item['ID']) . "')",
			'DEFAULT' => true,
		];
	}

	$arResult['GRID_DATA'][] = [
		'id' => $item['ID'],
		'actions' => $gridActions,
		'data' => $item,
		'editable' => true,
		'columns' => [
			'EMAIL' => $item['EMAIL'],
			'IS_FOR_ALL_USERS' => $item['IS_FOR_ALL_USERS'],
		],
	];
}
unset($item);

$snippet = new \Bitrix\Main\Grid\Panel\Snippet();
$APPLICATION->IncludeComponent(
	'bitrix:main.ui.grid',
	'',
	[
		'GRID_ID' => $arResult['GRID_ID'],
		'MESSAGES' => $arResult['MESSAGES'],
		'AJAX_MODE' => 'Y',
		'AJAX_OPTION_HISTORY' => 'N',
		'AJAX_OPTION_JUMP' => 'N',
		'AJAX_OPTION_STYLE' => 'N',
		'HEADERS' => $arResult['HEADERS'],
		'SORT' => $arResult['SORT'],
		'SORT_VARS' => $arResult['SORT_VARS'],
		'ROWS' => $arResult['GRID_DATA'],
		'FOOTER' =>
			[
				[
					'title' => Loc::getMessage('CRM_ALL'),
					'value' => $arResult['ROWS_COUNT'],
				],
			],
		'EDITABLE' => $arResult['CAN_EDIT'],
		'ACTIONS' =>
			[
				'delete' => $arResult['CAN_DELETE'],
				'list' => [],
			],
		'ACTION_ALL_ROWS' => false,
		'NAV_OBJECT' => $arResult['ITEMS'],
		'ACTION_PANEL' => [
			'GROUPS' => [
				[
					'ITEMS' =>
						[
							$snippet->getRemoveButton(),
						],
				],
			],
		],
		'TOTAL_ROWS_COUNT' => $arResult['ROWS_COUNT'],
	],
	$component
);
?>
	<script>
		BX.message({
			MAIL_BLACKLIST_LIST_POPUP_BTN_CLOSE: '<?= CUtil::JSEscape(Loc::getMessage('MAIL_BLACKLIST_LIST_POPUP_BTN_CLOSE')) ?>',
			MAIL_BLACKLIST_LIST_AJAX_DELETE_CONFIRM: '<?= CUtil::JSEscape(Loc::getMessage('MAIL_BLACKLIST_LIST_AJAX_DELETE_CONFIRM')) ?>',
			MAIL_BLACKLIST_LIST_POPUP_BTN_ADD: '<?= CUtil::JSEscape(Loc::getMessage('MAIL_BLACKLIST_LIST_POPUP_BTN_ADD')) ?>',
			MAIL_BLACKLIST_LIST_POPUP_TITLE: '<?= CUtil::JSEscape(Loc::getMessage('MAIL_BLACKLIST_LIST_POPUP_TITLE')) ?>'
		});
		new BX.Mail.Blacklist.List({
			gridId: '<?= CUtil::JSEscape($arResult['GRID_ID'])?>'
		});
	</script>
<?if ($isIframe):?>
	</div>
<?endif;