<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Бесплатный подбор оборудования");
?>

<div class="row cl">
  <div class="rq__form">
     <p>Наши консультации помогут Вам избежать стандартных ошибок и как следствие сэкономить время и деньги.</p>
     <div class="line">
        <span>ФИО</span>
        <input type="text" class="fio">
     </div>
     <div class="line pl">
        <span>Телефон</span>
        <input type="text" class="phone">
        <span class="txt_ct">Время звонка, до</span>
        <input type="text" class="call_time">
     </div>
     <div class="line">
        <span>E-mail</span>
        <input type="text" class="mail">
     </div>
     <div class="line textarea">
        <span>Текст заявки</span>
        <textarea name="request_txt" cols="30" rows="7" placeholder="Введите краткий текст"></textarea>
     </div>
     <a href="#" class="attach">Прикрепите план здания или техническое задание <span>(файл до 50 мб)</span></a>
     <a href="#" class="send">Отправить сообщение</a>
  </div>

  <div class="rq__list">
     <div class="title">Мы не просто продаем оборудование для отопления, водоснабжения и канализации. Мы решаем эти проблемы для Вас. Обратившись в нашу компанию Вы получите:</div>
     <ul>
        <li>Бесплатную консультацию по правильной организации систем отопления, водоснабжения и канализации;</li>
        <li>Квалифицированный подбор и расчет характеристик оборудования под Ваши потребности;</li>
        <li>Рекомендации по монтажу от ведущих заводов-изготовителей отопительного оборудования.</li>
     </ul>
  </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>