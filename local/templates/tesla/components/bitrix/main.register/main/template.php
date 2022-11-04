<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

use Bitrix\Main\Localization\Loc;
?>

<?if($USER->IsAuthorized()):?>

	<?LocalRedirect(SITE_DIR);?>

<?else:?>

	<div class="row justify-content-center">
		<div class="col-lg-5 text-center">
			<span style="font-size: 1.5rem"><?=Loc::getMessage("REGISTER_WELCOME_MSG")?></span>
		</div>
	</div>

	<?if (count($arResult["ERRORS"]) > 0):?>
		<?foreach ($arResult["ERRORS"] as $key => $error)
			if (intval($key) == 0 && $key !== 0)
				$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".Loc::getMessage("REGISTER_FIELD_".$key)."&quot;", $error);?>

		<div class="row justify-content-center">
			<div class="col-lg-5">
				<?ShowError(implode("<br />", $arResult["ERRORS"]));?>
			</div>
		</div>

	<?elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
		<p><?=Loc::getMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
	<?endif;?>

	<div class="row justify-content-center">
		<div class="col-lg-3">
			<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data" class="register">

				<?if($arResult["BACKURL"] <> ''):?>
					<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
				<?endif;?>

				<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>
					<?if($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true):?>

						<div>
							<label for="user_reg_time_zone_auto" class="default-label-form">
								<?=Loc::getMessage("main_profile_time_zones_auto")?>
								<?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?>
									<span class="starrequired">*</span>
								<?endif?>
							</label>
							<select name="REGISTER[AUTO_TIME_ZONE]" onchange="this.form.elements['REGISTER[TIME_ZONE]'].disabled=(this.value != 'N')" id="user_reg_time_zone_auto">
								<option value=""><?=Loc::getMessage("main_profile_time_zones_auto_def")?></option>
								<option value="Y"<?=$arResult["VALUES"][$FIELD] == "Y" ? " selected=\"selected\"" : ""?>><?=Loc::getMessage("main_profile_time_zones_auto_yes")?></option>
								<option value="N"<?=$arResult["VALUES"][$FIELD] == "N" ? " selected=\"selected\"" : ""?>><?=Loc::getMessage("main_profile_time_zones_auto_no")?></option>
							</select>
						</div>

						<div>
							<label for="user_reg_time_zone" class="default-label-form"><?=Loc::getMessage("main_profile_time_zones_zones")?></label>
							<select name="REGISTER[TIME_ZONE]"<?if(!isset($_REQUEST["REGISTER"]["TIME_ZONE"])) echo 'disabled="disabled"'?> id="user_reg_time_zone">
								<?foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name):?>
									<option value="<?=htmlspecialcharsbx($tz)?>"<?=$arResult["VALUES"]["TIME_ZONE"] == $tz ? " selected=\"selected\"" : ""?>><?=htmlspecialcharsbx($tz_name)?></option>
								<?endforeach?>
							</select>
						</div>

					<?else:?>

						<div class="form-group d-block mx-auto mt-4" style="color:white;">
							<?/*<label class="default-label-form">
									<?=Loc::getMessage("REGISTER_FIELD_".$FIELD)?>:
									<?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?>
									<span class="required">*</span>
								<?endif;?>
								</label>*/?>

							<?switch ($FIELD) {
								case "PASSWORD":?>
									<input size="30"
										   type="password"
										   name="REGISTER[<?=$FIELD?>]"
										   value="<?=$arResult["VALUES"][$FIELD]?>"
										   autocomplete="off"
										   class="form-control text-center d-inline-block"
										   placeholder="<?=Loc::getMessage("REGISTER_FIELD_".$FIELD)?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y") echo '*';?>"
										/>
								<?if ($arResult["SECURE_AUTH"]):?>
									<span class="bx-auth-secure" id="bx_auth_secure" title="<?=Loc::getMessage("AUTH_SECURE_NOTE")?>" style="display:none">
													<span class="bx-auth-secure-icon"></span>
												</span>

									<noscript>
													<span class="bx-auth-secure" title="<?=Loc::getMessage("AUTH_NONSECURE_NOTE")?>">
														<span class="bx-auth-secure-icon bx-auth-secure-unlock"></span>
													</span>
									</noscript>

									<script type="text/javascript">
										document.getElementById('bx_auth_secure').style.display = 'inline-block';
									</script>
								<?endif;?>
									<?break;?>

								<?case "CONFIRM_PASSWORD":?>
									<input size="30"
										   type="password"
										   name="REGISTER[<?=$FIELD?>]"
										   value="<?=$arResult["VALUES"][$FIELD]?>"
										   autocomplete="off"
										   class="form-control text-center d-inline-block"
										   placeholder="<?=Loc::getMessage("REGISTER_FIELD_".$FIELD)?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y") echo '*';?>"
										/>
									<?break;?>

								<?case "PERSONAL_GENDER":?>
									<label><?=Loc::getMessage("USER_DONT_KNOW")?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y") echo '*';?>&nbsp;:&nbsp;</label>
									<select name="REGISTER[<?=$FIELD?>]">
										<?/*<option value=""><?=Loc::getMessage("USER_DONT_KNOW")?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y") echo '*';?></option>*/?>
										<option value="M"<?=$arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : ""?>><?=Loc::getMessage("USER_MALE")?></option>
										<option value="F"<?=$arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : ""?>><?=Loc::getMessage("USER_FEMALE")?></option>
									</select>
									<?break;?>

								<?case "PERSONAL_COUNTRY":?>
								<?case "WORK_COUNTRY":?>
									<select name="REGISTER[<?=$FIELD?>]">
										<?foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value):?>
											<option value="<?=$value?>"<?if ($value == $arResult["VALUES"][$FIELD]):?> selected="selected"<?endif?>><?=$arResult["COUNTRIES"]["reference"][$key]?></option>
										<?endforeach;?>
									</select>
									<?break;?>

								<?case "PERSONAL_PHOTO":?>
								<?case "WORK_LOGO":?>
									<input size="30" type="file" name="REGISTER_FILES_<?=$FIELD?>" class="input-text" />
									<?break;?>

								<?case "PERSONAL_NOTES":?>
								<?case "WORK_NOTES":?>
									<textarea cols="30" rows="5" name="REGISTER[<?=$FIELD?>]"><?=$arResult["VALUES"][$FIELD]?></textarea>
									<?break;?>

								<?default:?>
									<?/*if ($FIELD == "PERSONAL_BIRTHDAY"):?>
										<small><?=$arResult["DATE_FORMAT"]?></small><br />
									<?endif;*/?>
									<input size="30"
										   type="text"
										   name="REGISTER[<?=$FIELD?>]"
										   value="<?=$arResult["VALUES"][$FIELD]?>"
										   class="form-control text-center d-inline-block"
										   placeholder="<?=Loc::getMessage("REGISTER_FIELD_".$FIELD)?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y") echo '*';?>"
										/>

									<?if ($FIELD == "PERSONAL_BIRTHDAY") {
										$APPLICATION->IncludeComponent('bitrix:main.calendar', 'register', array(
											'SHOW_INPUT' => 'N',
											'FORM_NAME' => 'regform',
											'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
											'SHOW_TIME' => 'N'
										),
											null,
											array("HIDE_ICONS" => "Y")
										);
									}?>
								<?}?>
						</div>
					<?endif;?>
				<?endforeach;?>

				<?// ********************* User properties ***************************************************?>
				<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
					<div><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></div>
					<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
						<div><?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?></div>
						<?$APPLICATION->IncludeComponent(
							"bitrix:system.field.edit",
							$arUserField["USER_TYPE"]["USER_TYPE_ID"],
							array(
								"bVarsFromForm" => $arResult["bVarsFromForm"],
								"arUserField" => $arUserField,
								"form_name" => "regform"),
							null,
							array("HIDE_ICONS"=>"Y"));?>
					<?endforeach;?>
				<?endif;?>
				<?// ******************** /User properties ***************************************************?>

				<?/* CAPTCHA */
				if ($arResult["USE_CAPTCHA"] == "Y"):?>
					<div><b><?=Loc::getMessage("REGISTER_CAPTCHA_TITLE")?></b></div>

					<div>
						<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
					</div>

					<div>
						<?=Loc::getMessage("REGISTER_CAPTCHA_PROMT")?>:<span class="starrequired">*</span>
						<input type="text" name="captcha_word" maxlength="50" value="" />
					</div>
				<?endif; /* !CAPTCHA */?>

				<div class="form-group d-block mx-auto mt-4" style="color: white;">
					<input type="submit" name="register_submit_button" value="<?=Loc::getMessage("AUTH_REGISTER")?>" class="form-control text-center d-block py-2" style="font-size: 1.3rem; border-radius: 8px;" />
				</div>

				<input type="hidden" name="TYPE" value="REGISTRATION"/>
				<input type="hidden" name="register_submit_button" value="Y"/>
			</form>
		</div>
	</div>

	<div class="row justify-content-center mt-0 pt-0">
		<div class="col-lg-6 text-center">
			<?=$arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?>
		</div>
	</div>

	<div class="row justify-content-center  mt-0 mb-3 pt-0 pb-3">
		<div class="col-lg-6 text-center">
			*&nbsp;<?=Loc::getMessage("AUTH_REQ")?>
		</div>
	</div>

	<div class="row justify-content-center mt-0 pt-0">
		<div class="col-lg-6 text-center">
			<a href="<?=PATH_TO_AUTH?>" style="color: white; font-size: 1.3rem; text-decoration: underline;"><?=Loc::getMessage("REGISTER_AUTH_LINK_TITLE")?></a>
		</div>
	</div>
<?endif;?>