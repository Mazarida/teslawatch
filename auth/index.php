<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Авторизация");
?>

	<section>
		<div class="container">
			<div class="row justify-content-center text-center mt-5">
				<div class="col-lg-9">
					<?$APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath(SITE_DIR."/include/auth_logo.php"),
						Array(),
						Array("MODE" => "php")
					);?>
				</div>
			</div>

			<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "main", Array(
				"FORGOT_PASSWORD_URL" => PATH_TO_RECOVERY_PASSWORD,	// Страница забытого пароля
				"PROFILE_URL" => "",	// Страница профиля
				"REGISTER_URL" => PATH_TO_REGISTER,	// Страница регистрации
				"SHOW_ERRORS" => "Y",	// Показывать ошибки
			),
				false
			);?>
		</div>
	</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>