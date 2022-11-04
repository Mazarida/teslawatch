<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Люди");
?>

<?$APPLICATION->IncludeComponent("bitrix:socialnetwork_user", ".default", array(
	"ITEM_DETAIL_COUNT" => "32",
	"ITEM_MAIN_COUNT" => "6",
	"DATE_TIME_FORMAT" => "d.m.y G:i",
	"NAME_TEMPLATE" => "",
	"SHOW_LOGIN" => "Y",
	"SHOW_RATING" => "Y",
	"RATING_ID" => #RATING_ID#,
	"ALLOW_RATING_SORT" => "Y",
	"CAN_OWNER_EDIT_DESKTOP" => "Y",
	"PATH_TO_GROUP" => SITE_DIR."groups/group/#group_id#/",
	"PATH_TO_GROUP_SUBSCRIBE" => SITE_DIR."groups/group/#group_id#/subscribe/",
	"PATH_TO_GROUP_SEARCH" => SITE_DIR."groups/",
	"PATH_TO_SEARCH_EXTERNAL" => SITE_DIR."people/index.php",
	"ALLOW_GROUP_CREATE_REDIRECT_REQUEST" => "Y",
	"GROUP_CREATE_REDIRECT_REQUEST" => SITE_DIR."groups/group/#group_id#/user_search/",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "#SITE_DIR#people/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_SHADOW" => "Y",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "Y",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_TIME_LONG" => "604800",
	"PATH_TO_SMILE" => "/bitrix/images/socialnetwork/smile/",
	"PATH_TO_BLOG_SMILE" => "/bitrix/images/blog/smile/",
	"PATH_TO_FORUM_SMILE" => "/bitrix/images/forum/smile/",
	"PATH_TO_FORUM_ICON" => "/bitrix/images/forum/icon/",
	"SET_TITLE" => "Y",
	"SET_NAV_CHAIN" => "Y",
	"USER_FIELDS_MAIN" => array(
		0 => "LAST_LOGIN",
		1 => "DATE_REGISTER",
		2 => "PERSONAL_BIRTHDAY",
		3 => "PERSONAL_GENDER",
	),
	"USER_PROPERTY_MAIN" => array(
	),
	"USER_FIELDS_CONTACT" => array(
		0 => "EMAIL",
		1 => "PERSONAL_WWW",
		2 => "PERSONAL_ICQ",
		3 => "PERSONAL_PHONE",
		4 => "PERSONAL_FAX",
		5 => "PERSONAL_MOBILE",
	),
	"USER_PROPERTY_CONTACT" => array(
		0 => "UF_SKYPE",
	),
	"USER_FIELDS_PERSONAL" => array(
		0 => "PERSONAL_PROFESSION",
		1 => "PERSONAL_NOTES",
	),
	"USER_PROPERTY_PERSONAL" => array(
		0 => "UF_TWITTER",
		1 => "UF_KONTAKT",
		2 => "UF_MOYMIR",
		3 => "UF_MYYANDEX",
	),
	"AJAX_LONG_TIMEOUT" => "60",
	"EDITABLE_FIELDS" => array(
		0 => "LOGIN",
		1 => "NAME",
		2 => "SECOND_NAME",
		3 => "LAST_NAME",
		4 => "EMAIL",
		5 => "PERSONAL_BIRTHDAY",
		6 => "PERSONAL_WWW",
		7 => "PERSONAL_ICQ",
		8 => "PERSONAL_GENDER",
		9 => "PERSONAL_PHOTO",
		10 => "PERSONAL_NOTES",
		11 => "PERSONAL_PHONE",
		12 => "PERSONAL_FAX",
		13 => "PERSONAL_MOBILE",
		14 => "PERSONAL_PAGER",
		15 => "PERSONAL_COUNTRY",
		16 => "PERSONAL_STATE",
		17 => "PERSONAL_CITY",
		18 => "PERSONAL_ZIP",
		19 => "PERSONAL_STREET",
		20 => "PERSONAL_MAILBOX",
		21 => "PASSWORD",
		22 => "FORUM_SHOW_NAME",
		23 => "FORUM_DESCRIPTION",
		24 => "FORUM_INTERESTS",
		25 => "FORUM_SIGNATURE",
		26 => "FORUM_AVATAR",
		27 => "FORUM_HIDE_FROM_ONLINE",
		28 => "FORUM_SUBSC_GET_MY_MESSAGE",
		29 => "BLOG_ALIAS",
		30 => "BLOG_DESCRIPTION",
		31 => "BLOG_INTERESTS",
		32 => "BLOG_AVATAR",
		33 => "UF_SKYPE",
		34 => "UF_TWITTER",	
		35 => "UF_KONTAKT",
		36 => "UF_MOYMIR",
		37 => "UF_MYYANDEX",	
	),
	"SHOW_YEAR" => "M",
	"USER_FIELDS_SEARCH_SIMPLE" => array(
		0 => "PERSONAL_CITY",
	),
	"USER_PROPERTIES_SEARCH_SIMPLE" => array(
	),
	"USER_FIELDS_SEARCH_ADV" => array(
		0 => "PERSONAL_GENDER",
		1 => "PERSONAL_COUNTRY",
		2 => "PERSONAL_CITY",
	),
	"USER_PROPERTIES_SEARCH_ADV" => array(
		0 => "UF_SKYPE",
	),
	"SONET_USER_FIELDS_LIST" => array(
		0 => "PERSONAL_BIRTHDAY",
		1 => "PERSONAL_GENDER",
		2 => "PERSONAL_CITY",
	),
	"SONET_USER_PROPERTY_LIST" => array(
		0 => "UF_SKYPE",
		1 => "UF_TWITTER",		
	),
	"SONET_USER_FIELDS_SEARCHABLE" => array(
		0 => "LOGIN",
		1 => "NAME",
		2 => "SECOND_NAME",
		3 => "LAST_NAME",
		4 => "PERSONAL_BIRTHDAY",
		5 => "PERSONAL_BIRTHDAY_YEAR",
		6 => "PERSONAL_BIRTHDAY_DAY",
		7 => "PERSONAL_PROFESSION",
		8 => "PERSONAL_GENDER",
		9 => "PERSONAL_COUNTRY",
		10 => "PERSONAL_STATE",
		11 => "PERSONAL_CITY",
		12 => "PERSONAL_ZIP",
		13 => "PERSONAL_STREET",
		14 => "PERSONAL_MAILBOX",
		15 => "WORK_COMPANY",
		16 => "WORK_DEPARTMENT",
		17 => "WORK_POSITION",
		18 => "WORK_COUNTRY",
		19 => "WORK_STATE",
		20 => "WORK_CITY",
		21 => "WORK_ZIP",
		22 => "WORK_STREET",
		23 => "WORK_MAILBOX",
	),
	"SONET_USER_PROPERTY_SEARCHABLE" => array(
		0 => "UF_SKYPE",
	),
	"BLOG_GROUP_ID" => "#BLOG_GROUP_ID#",
	"BLOG_COMMENT_AJAX_POST" => "Y",
	"FORUM_ID" => "#FORUM_ID#",
	"PHOTO_USER_IBLOCK_TYPE" => "photos",
	"PHOTO_USER_IBLOCK_ID" => "#PHOTO_USER_IBLOCK_ID#",
	"PHOTO_MODERATION" => "N",
	"PHOTO_SECTION_PAGE_ELEMENTS" => "15",
	"PHOTO_ELEMENTS_PAGE_ELEMENTS" => "50",
	"PHOTO_SLIDER_COUNT_CELL" => "3",
	"CELL_COUNT" => "0",
	"PHOTO_ALBUM_PHOTO_THUMBS_SIZE" => "120",
	"PHOTO_THUMBNAIL_SIZE" => "90",
	"PHOTO_JPEG_QUALITY1" => "95",
	"PHOTO_JPEG_QUALITY2" => "95",
	"PHOTO_JPEG_QUALITY" => "90",
	"PHOTO_ORIGINAL_SIZE" => "1280",
	"PHOTO_UPLOADER_TYPE" => "flash",
	"PHOTO_WATERMARK_MIN_PICTURE_SIZE" => "200",
	"PHOTO_PATH_TO_FONT" => "",
	"PHOTO_SHOW_WATERMARK" => "Y",
	"PHOTO_WATERMARK_RULES" => "USER",
	"PHOTO_PHOTO_UPLOAD_MAX_FILESIZE" => "1024",
	"PHOTO_USE_RATING" => "Y",
	"PHOTO_MAX_VOTE" => "5",
	"PHOTO_VOTE_NAMES" => array(
		0 => "1",
		1 => "2",
		2 => "3",
		3 => "4",
		4 => "5",
		5 => "",
	),
	"PHOTO_DISPLAY_AS_RATING" => "vote_avg",
	"PHOTO_USE_COMMENTS" => "#PHOTO_USE_COMMENTS#",
	"PHOTO_FORUM_ID" => "#PHOTO_FORUM_ID#",
	"PHOTO_USE_CAPTCHA" => "N",
	"SEARCH_DEFAULT_SORT" => "rank",
	"SEARCH_PAGE_RESULT_COUNT" => "10",
	"SEARCH_TAGS_PAGE_ELEMENTS" => "100",
	"SEARCH_TAGS_PERIOD" => "",
	"SEARCH_TAGS_FONT_MAX" => "50",
	"SEARCH_TAGS_FONT_MIN" => "10",
	"SEARCH_TAGS_COLOR_NEW" => "3E74E6",
	"SEARCH_TAGS_COLOR_OLD" => "C0C0C0",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"index" => "index.php",
		"user_reindex" => "user_reindex.php",
		"user_content_search" => "user/#user_id#/search/",
		"user" => "user/#user_id#/",
		"user_friends" => "user/#user_id#/friends/",
		"user_friends_add" => "user/#user_id#/friends/add/",
		"user_friends_delete" => "user/#user_id#/friends/delete/",
		"user_groups" => "user/#user_id#/groups/",
		"user_groups_add" => "user/#user_id#/groups/add/",
		"group_create" => "user/#user_id#/groups/create/",
		"user_profile_edit" => "user/#user_id#/edit/",
		"user_settings_edit" => "user/#user_id#/settings/",
		"user_features" => "user/#user_id#/features/",
		"group_request_group_search" => "group/#user_id#/group_search/",
		"group_request_user" => "group/#group_id#/user/#user_id#/request/",
		"search" => "index.php",
		"message_form" => "messages/form/#user_id#/",
		"message_form_mess" => "messages/form/#user_id#/#message_id#/",
		"user_ban" => "messages/ban/",
		"messages_chat" => "messages/chat/#user_id#/",
		"messages_input" => "messages/input/",
		"messages_input_user" => "messages/input/#user_id#/",
		"messages_output" => "messages/output/",
		"messages_output_user" => "messages/output/#user_id#/",
		"messages_users" => "messages/",
		"messages_users_messages" => "messages/#user_id#/",
		"log" => "log/",
		"subscribe" => "subscribe/",
		"user_subscribe" => "user/#user_id#/subscribe/",
		"user_photo" => "user/#user_id#/photo/",
		"user_blog" => "user/#user_id#/blog/",
		"user_blog_post_edit" => "user/#user_id#/blog/edit/#post_id#/",
		"user_blog_rss" => "user/#user_id#/blog/rss/#type#/",
		"user_blog_draft" => "user/#user_id#/blog/draft/",
		"user_blog_post" => "user/#user_id#/blog/#post_id#/",
		"user_blog_moderation" => "user/#user_id#/blog/moderation/",
		"user_forum" => "user/#user_id#/forum/",
		"user_forum_topic_edit" => "user/#user_id#/forum/edit/#topic_id#/",
		"user_forum_topic" => "user/#user_id#/forum/#topic_id#/",
	),
	"LOG_NEW_TEMPLATE" => "Y"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>