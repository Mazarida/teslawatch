<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParam
 * @var array $arResult
 */
?>

<?if($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']):?>
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<?ShowMessage($arResult['ERROR_MESSAGE']);?>
		</div>
	</div>
<?endif;?>