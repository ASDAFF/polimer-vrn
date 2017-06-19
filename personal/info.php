<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>

<div class="lk_block cl">
   <a href="/" class="exit">Выйти</a>
   <div class="lk_leftbar">
      <a href="#" class="lk_sandwich">
         <span></span>
         <span></span>
         <span></span>
      </a>
      <h1 class="h1-lk">Личный кабинет</h1>
      <div class="welcome">
         Добро пожаловать,
         <span class="username">Иван И.</span>
         <span class="usermail">ivanoivanivanovich@gmail.com</span>
      </div>
      <div class="block-menu cl">
         <a href="/personal/orders-list.php" class="menu-item ph">История<br>заказов</a>
         <a href="/personal/info.php" class="menu-item pd active">Персональные<br>данные</a>
         <a href="/personal/security.php" class="menu-item ss">Настройки<br>безопасности</a>
      </div>
   </div>
   <div class="lk_content">
      <div class="header">Персональные данные</div>
      <div class="pd__block">
         <div class="face_type">
            <label>
               <input type="radio" name="face" checked>
               <span>Физическое лицо</span>
            </label>
            <label>
               <input type="radio" name="face">
               <span>Юридическое лицо</span>
            </label>
         </div>
         <div class="line"><span>ФИО</span><input type="text"></div>
         <div class="line"><span>E-mail</span><input type="text"></div>
         <div class="line"><span>Телефон</span><input type="text" class="phone_number"></div>
         <a href="#" class="add_adress"><span></span><span></span>Добавить адрес доставки</a>
         <a href="#" class="save">Сохранить изменения</a>
      </div>
   </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>