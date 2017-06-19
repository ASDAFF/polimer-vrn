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
         <a href="/personal/orders-list.php" class="menu-item ph active">История<br>заказов</a>
         <a href="/personal/info.php" class="menu-item pd">Персональные<br>данные</a>
         <a href="/personal/security.php" class="menu-item ss">Настройки<br>безопасности</a>
      </div>
   </div>
   <div class="lk_content">
      <div class="header">История заказов</div>
      
      <div class="ph__item">
         <div class="title cl">
            <div class="id">Заказ №<span class="num">179</span> от <span class="date">20.12.2017</span></div>
            <a href="#" class="detail">Подробнее о заказе</a>
         </div>
         <div class="inner">
            <div class="status_options">
               <div class="pos status cl">
                  <div class="line"></div>
                  <span>Статус:</span>
                  <span class="val">Принят к исполнению</span>
               </div>
               <div class="pos date cl">
                  <div class="line"></div>
                  <span>Дата формирование</span>
                  <span class="val">20.02.2017</span>
               </div>
               <a href="#" class="btn_prch cancel">Отменить заказ</a>
               <a href="#" class="btn_prch repeat">Повторить заказ</a>
            </div>
            <div class="sum">Сумма к оплате: <span>40 6890.2</span> <span>руб.</span></div>
            <div class="paid">Оплачен: <span>Нет</span></div>
            <div class="paytype">Способ оплаты: <span>Uniteller</span></div>
            <div class="delivery">Доставка: <span>Самовывоз</span></div>
            <div class="goods">Состав заказа:
               <ol>
                  <li><a href="#">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a> - <span>1 шт</span></li>
                  <li><a href="#">Радиатор  RADENA BIMETALL CS 500, 10 секций</a> - <span>10 шт</span></li>
                  <li><a href="#">Биметаллический RADENA BIMETALL CS 500, 10 секций</a> - <span>5 шт</span></li>
               </ol>
            </div>
         </div>
      </div>

      <div class="ph__item">
         <div class="title cl">
            <div class="id">Заказ №<span class="num">178</span> от <span class="date">20.12.2017</span></div>
            <a href="#" class="detail">Подробнее о заказе</a>
         </div>
         <div class="inner">
            <div class="status_options">
               <div class="pos status cl">
                  <div class="line"></div>
                  <span>Статус:</span>
                  <span class="val">Выполнен</span>
               </div>
               <div class="pos date cl">
                  <div class="line"></div>
                  <span>Дата формирование</span>
                  <span class="val">20.02.2017</span>
               </div>
               <a href="#" class="btn_prch cancel disabled">Отменить заказ</a>
               <a href="#" class="btn_prch repeat">Повторить заказ</a>
            </div>
            <div class="sum">Сумма к оплате: <span>40 6890.2</span> <span>руб.</span></div>
            <div class="paid">Оплачен: <span>Нет</span></div>
            <div class="paytype">Способ оплаты: <span>Uniteller</span></div>
            <div class="delivery">Доставка: <span>Самовывоз</span></div>
            <div class="goods">Состав заказа:
               <ol>
                  <li><a href="#">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a> - <span>1 шт</span></li>
                  <li><a href="#">Радиатор  RADENA BIMETALL CS 500, 10 секций</a> - <span>10 шт</span></li>
               </ol>
            </div>
         </div>
      </div>

      <div class="ph__item">
         <div class="title cl">
            <div class="id">Заказ №<span class="num">177</span> от <span class="date">20.12.2017</span></div>
            <a href="#" class="detail">Подробнее о заказе</a>
         </div>
         <div class="inner">
            <div class="status_options">
               <div class="pos status cl">
                  <div class="line"></div>
                  <span>Статус:</span>
                  <span class="val discard">Отменен</span>
               </div>
               <div class="pos date cl">
                  <div class="line"></div>
                  <span>Дата формирование</span>
                  <span class="val">20.02.2017</span>
               </div>
               <a href="#" class="btn_prch reprch">Оформить заказ заново</a>
            </div>
            <div class="sum">Сумма к оплате: <span>40 6890.2</span> <span>руб.</span></div>
            <div class="paid">Оплачен: <span>Нет</span></div>
            <div class="paytype">Способ оплаты: <span>Uniteller</span></div>
            <div class="delivery">Доставка: <span>Самовывоз</span></div>
            <div class="goods">Состав заказа:
               <ol>
                  <li><a href="#">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a> - <span>1 шт</span></li>
                  <li><a href="#">Радиатор  RADENA BIMETALL CS 500, 10 секций</a> - <span>10 шт</span></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>