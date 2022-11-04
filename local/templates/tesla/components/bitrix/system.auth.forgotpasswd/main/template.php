<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @var array $arParams
 * @var array $arResult
 */

use Bitrix\Main\Localization\Loc;
?>

<div class="row justify-content-center">
	<div class="col-lg-6">
		<?ShowMessage($arParams["~AUTH_RESULT"]);?>
		<p><?=GetMessage("AUTH_FORGOT_PASSWORD_1")?></p>
		<div style="margin-bottom:15px;"><strong><?=GetMessage("AUTH_GET_CHECK_STRING")?></strong></div>
	</div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-3">
		<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
			<?if (strlen($arResult["BACKURL"]) > 0):?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?endif;?>

			<input type="hidden" name="AUTH_FORM" value="Y">
			<input type="hidden" name="TYPE" value="SEND_PWD">

			<div class="form-group d-block mx-auto mt-4" style="color:white;">
				<input type="text" name="USER_LOGIN" class="form-control text-center d-inline-block" id="login" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="<?=Loc::getMessage("AUTH_LOGIN")?>" />
			</div>

			<div class="form-group d-block mx-auto mt-4" style="color:white;"><?=Loc::getMessage("AUTH_OR")?></div>

			<div class="form-group d-block mx-auto mt-4" style="color:white;">
				<input type="text" name="USER_EMAIL" class="form-control text-center d-inline-block" id="email" placeholder="<?=Loc::getMessage("AUTH_EMAIL")?>" />
			</div>

			<?if($arResult["USE_CAPTCHA"]):?>
				<p class="form-row">
					<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				</p>

				<p class="form-row">
					<?=Loc::getMessage("system_auth_captcha")?>
					<input type="text" name="captcha_word" maxlength="50" value="" />
				</p>
			<?endif?>

			<div class="form-group d-block mx-auto mt-4" style="color: white;">
				<input type="submit" name="send_account_info" class="form-control text-center d-block py-2" id="btn" style="font-size: 1.3rem; border-radius: 8px;" value="<?=Loc::getMessage("AUTH_SEND")?>">
			</div>
		</form>
	</div>
</div>

<div class="row justify-content-center mt-sm-5 pt-sm-5">
	<div class="col-lg-3 text-center">
		<span>
			<a href="<?=PATH_TO_AUTH?>" style="color: white; font-size: 1.3rem; text-decoration: underline;"><?=Loc::getMessage("REMEMBER_PASSWORD_LINK_TITLE")?></a>
		</span>
	</div>
</div>

<script type="text/javascript">
	document.bform.USER_LOGIN.focus();
</script>
