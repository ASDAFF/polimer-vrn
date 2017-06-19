<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "contacts", Array(
    "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
    "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
    "CACHE_TYPE" => "A",	// Тип кеширования
    "COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
    "IBLOCK_ID" => "8",	// Инфоблок
    "IBLOCK_TYPE" => "contact",	// Тип инфоблока
    "SECTION_CODE" => "",	// Код раздела
    "SECTION_FIELDS" => array(	// Поля разделов
        0 => "",
        1 => "",
    ),
    "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
    "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
    "SECTION_USER_FIELDS" => array(	// Свойства разделов
        0 => "",
        1 => "",
    ),
    "SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
    "TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
    "VIEW_MODE" => "LINE",	// Вид списка подразделов
),
    false
);?>

   <div class="co__heads cl">
      <div class="rh-col">
         <div class="lvl">Директор</div>
         <div class="name">Рябцев Сергей Геннадьевич</div>
         <div class="phone">тел: (473) 237-35-55 <span>добавочный 201</span></div>
         <div class="mail">e-mail: <a href="#">rsg@polimer-vrn.ru</a></div>
      </div>
      <div class="rh-col">
         <div class="lvl">Начальник отдела снабжения</div>
         <div class="name">Старцев Дмитрий Олегович</div>
         <div class="phone">тел: (473) 237-35-55 <span>добавочный 327</span></div>
         <div class="mail">e-mail: <a href="#">dmitry@polimer-vrn.ru</a></div>
      </div>
      <div class="rh-col">
         <div class="lvl">Начальник отдела продаж</div>
         <div class="name">Грачёва Юлия Борисовна</div>
         <div class="phone">тел: (473) 237-35-55 <span>добавочный 323</span></div>
         <div class="mail">e-mail: <a href="#">gracheva@polimer-vrn.ru</a></div>
      </div>
   </div><!--end::co__heads-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>