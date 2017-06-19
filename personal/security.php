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
         <a href="/personal/info.php" class="menu-item pd">Персональные<br>данные</a>
         <a href="/personal/security.php" class="menu-item ss active">Настройки<br>безопасности</a>
      </div>
   </div>
   <div class="lk_content">
      <div class="header">Настройки безопасности</div>
      <div class="ss__block">
         <div class="line"><span>Старый пароль</span><input type="text" class="pass"></div>
         <div class="line"><span>Новый пароль</span><input type="text" class="pass"></div>
         <div class="line"><span>Повтор пароля</span><input type="text" class="pass"><span class="req">Пароль должен содержать не менее 6 символов ,  кроме спец. символов и кириллицы</span></div>
         <a href="#" class="save">Сохранить изменения</a>
      </div>
   </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>