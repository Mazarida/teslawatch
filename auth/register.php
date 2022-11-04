<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Регистрация");
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

			<?$APPLICATION->IncludeComponent("bitrix:main.register", "main", Array(
				"AUTH" => "Y",	// Автоматически авторизовать пользователей
				"REQUIRED_FIELDS" => array(	// Поля, обязательные для заполнения
					0 => "EMAIL",
					1 => "PERSONAL_GENDER",
					2 => "PERSONAL_BIRTHDAY",
				),
				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
				"SHOW_FIELDS" => array(	// Поля, которые показывать в форме
					0 => "EMAIL",
					1 => "PERSONAL_GENDER",
					2 => "PERSONAL_BIRTHDAY",
				),
				"SUCCESS_PAGE" => SITE_DIR,	// Страница окончания регистрации
				"USER_PROPERTY" => "",	// Показывать доп. свойства
				"USER_PROPERTY_NAME" => "",	// Название блока пользовательских свойств
				"USE_BACKURL" => "N",	// Отправлять пользователя по обратной ссылке, если она есть
			),
				false
			);?>
		</div>
	</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>