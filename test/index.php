<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<?$APPLICATION->IncludeComponent("bitrix:forum.topic.reviews", "reviews", Array(
	"AJAX_POST" => "Y",	// �?спользовать AJAX в диалогах
		"CACHE_TIME" => "0",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",	// Формат показа даты и времени
		"EDITOR_CODE_DEFAULT" => "Y",	// По умолчанию показывать невизуальный режим редактора
		"ELEMENT_ID" => "9007",	// ID элемента
		"FILES_COUNT" => "2",	// Максимальное количество файлов, прикрепленных к одному сообщению
		"FORUM_ID" => "1",	// ID форума для отзывов
		"IBLOCK_ID" => "11",	// Код информационного блока
		"IBLOCK_TYPE" => "1c_catalog",	// Тип информационного блока (используется только для проверки)
		"MESSAGES_PER_PAGE" => "10",	// Количество сообщений на одной странице
		"NAME_TEMPLATE" => "",	// Формат имени
		"PAGE_NAVIGATION_TEMPLATE" => "",	// Название шаблона для вывода постраничной навигации
		"PREORDER" => "N",	// Выводить сообщения в прямом порядке
		"RATING_TYPE" => "",	// Вид кнопок рейтинга
		"SHOW_AVATAR" => "N",	// Показывать аватары пользователей
		"SHOW_LINK_TO_FORUM" => "N",	// Показать ссылку на форум
		"SHOW_MINIMIZED" => "N",	// Сворачивать форму добавления отзыва
		"SHOW_RATING" => "N",	// Включить рейтинг
		"URL_TEMPLATES_DETAIL" => "",	// Страница элемента инфоблока
		"URL_TEMPLATES_PROFILE_VIEW" => "",	// Страница пользователя
		"URL_TEMPLATES_READ" => "",	// Страница чтения темы форума
		"USE_CAPTCHA" => "N",	// �?спользовать CAPTCHA
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>