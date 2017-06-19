<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка");
?>

<div class="sh__cities">
  <a href="#" class="city active">Город</a>
  <a href="#" class="city">Область</a>
  <a href="#" class="city">Россия</a>
</div><!--end::sh__cities-->

<div class="delivery__areas">
  <div class="area-item active">
    <div class="row cl">
      <div class="sh__text">
         <p class="intro">Сделав заказ в нашей компании, <br>Вы можете забрать товар 2-мя способами:</p>
         <div class="type cl">
            <div class="shipby self">Самовывоз <br>товара</div>
            <div class="shipby us">Заказать <br>доставку</div>
         </div>
         <ul>
            <li>Цена доставки действительная при весе груза до 1тн., максимальный габаритный размер до 4м, объём до 12 куб.м. </li>
            <li>Во всех остальных случаях стоимость доставки уточняйте у менеджера.</li>
            <li>Доставка по городу и в пределах 15 км от города осуществляется в течение 1-2 рабочих дней с момента оформления заказа (возможность срочной доставки необходимо заранее уточнять у менеджера).</li>
         </ul>
         <p class="intro">В стоимость доставки включено время разгрузки <br>автомобиля силами клиента – 30 мин.</p>
         <p>При задержке автомобиля свыше указанного времени, дополнительное время<br>оплачивается по факту простоя из расчета стоимости:</p>
         <div class="cars cl">
            <div class="car">
               <img src="<?=SITE_TEMPLATE_PATH?>/img/sh_car1.png" alt="sh_car1.png" width="160" height="180">
               <div class="txt">
                  <div class="model">газель</div>
                  <div class="cost"><span>400</span>руб./час</div>
               </div>
            </div>
            <div class="car">
               <img src="<?=SITE_TEMPLATE_PATH?>/img/sh_car2.png" alt="sh_car1.png" width="160" height="180">
               <div class="txt">
                  <div class="model">Зубр</div>
                  <div class="cost"><span>1 200</span>руб./час</div>
               </div>
            </div>
            <div class="car">
               <img src="<?=SITE_TEMPLATE_PATH?>/img/sh_car3.png" alt="sh_car1.png" width="160" height="180">
               <div class="txt">
                  <div class="model">Маз</div>
                  <div class="cost"><span>1 800</span>руб./час</div>
               </div>
            </div>
         </div>
      </div>

      <div class="sh__visual">
         <p class="intro">Стоимость доставки по городу:</p>
         <div class="area_cost cl">
            <div class="area red"><span>400</span>руб.</div>
            <div class="area green"><span>600</span>руб.</div>
            <div class="area yellow"><span>800</span>руб.</div>
            <div class="area blue"><span>1000</span>руб.</div>
            <div class="area gray"><span>1200</span>руб.</div>
         </div>
         <div class="map"><span><img src="<?=SITE_TEMPLATE_PATH?>/img/shipping_area.jpg" width="560" height="610" alt=""></span></div>
      </div>
    </div>
  </div><!--end::area-->
  <div class="area-item">
    Доставка по области
    <div class="row cl">
      <div class="sh__text">
         <p class="intro">Сделав заказ в нашей компании, <br>Вы можете забрать товар 2-мя способами:</p>
         <div class="type cl">
            <div class="shipby self">Самовывоз <br>товара</div>
            <div class="shipby us">Заказать <br>доставку</div>
         </div>
         <ul>
            <li>Цена доставки действительная при весе груза до 1тн., максимальный габаритный размер до 4м, объём до 12 куб.м. </li>
            <li>Во всех остальных случаях стоимость доставки уточняйте у менеджера.</li>
            <li>Доставка по городу и в пределах 15 км от города осуществляется в течение 1-2 рабочих дней с момента оформления заказа (возможность срочной доставки необходимо заранее уточнять у менеджера).</li>
         </ul>
         <p class="intro">В стоимость доставки включено время разгрузки <br>автомобиля силами клиента – 30 мин.</p>
         <p>При задержке автомобиля свыше указанного времени, дополнительное время<br>оплачивается по факту простоя из расчета стоимости:</p>
         <div class="cars cl">
            <div class="car">
               <img src="<?=SITE_TEMPLATE_PATH?>/img/sh_car1.png" alt="sh_car1.png" width="160" height="180">
               <div class="txt">
                  <div class="model">газель</div>
                  <div class="cost"><span>400</span>руб./час</div>
               </div>
            </div>
            <div class="car">
               <img src="<?=SITE_TEMPLATE_PATH?>/img/sh_car2.png" alt="sh_car1.png" width="160" height="180">
               <div class="txt">
                  <div class="model">Зубр</div>
                  <div class="cost"><span>1 200</span>руб./час</div>
               </div>
            </div>
            <div class="car">
               <img src="<?=SITE_TEMPLATE_PATH?>/img/sh_car3.png" alt="sh_car1.png" width="160" height="180">
               <div class="txt">
                  <div class="model">Маз</div>
                  <div class="cost"><span>1 800</span>руб./час</div>
               </div>
            </div>
         </div>
      </div>

      <div class="sh__visual">
         <p class="intro">Стоимость доставки по городу:</p>
         <div class="area_cost cl">
            <div class="area red"><span>400</span>руб.</div>
            <div class="area green"><span>600</span>руб.</div>
            <div class="area yellow"><span>800</span>руб.</div>
            <div class="area blue"><span>1000</span>руб.</div>
            <div class="area gray"><span>1200</span>руб.</div>
         </div>
         <div class="map"><span><img src="<?=SITE_TEMPLATE_PATH?>/img/shipping_area.jpg" width="560" height="610" alt=""></span></div>
      </div>
    </div>
  </div><!--end::area-->
  <div class="area-item">
    Доставка по России
    <div class="row cl">
      <div class="sh__text">
         <p class="intro">Сделав заказ в нашей компании, <br>Вы можете забрать товар 2-мя способами:</p>
         <div class="type cl">
            <div class="shipby self">Самовывоз <br>товара</div>
            <div class="shipby us">Заказать <br>доставку</div>
         </div>
         <ul>
            <li>Цена доставки действительная при весе груза до 1тн., максимальный габаритный размер до 4м, объём до 12 куб.м. </li>
            <li>Во всех остальных случаях стоимость доставки уточняйте у менеджера.</li>
            <li>Доставка по городу и в пределах 15 км от города осуществляется в течение 1-2 рабочих дней с момента оформления заказа (возможность срочной доставки необходимо заранее уточнять у менеджера).</li>
         </ul>
         <p class="intro">В стоимость доставки включено время разгрузки <br>автомобиля силами клиента – 30 мин.</p>
         <p>При задержке автомобиля свыше указанного времени, дополнительное время<br>оплачивается по факту простоя из расчета стоимости:</p>
         <div class="cars cl">
            <div class="car">
               <img src="<?=SITE_TEMPLATE_PATH?>/img/sh_car1.png" alt="sh_car1.png" width="160" height="180">
               <div class="txt">
                  <div class="model">газель</div>
                  <div class="cost"><span>400</span>руб./час</div>
               </div>
            </div>
            <div class="car">
               <img src="<?=SITE_TEMPLATE_PATH?>/img/sh_car2.png" alt="sh_car1.png" width="160" height="180">
               <div class="txt">
                  <div class="model">Зубр</div>
                  <div class="cost"><span>1 200</span>руб./час</div>
               </div>
            </div>
            <div class="car">
               <img src="<?=SITE_TEMPLATE_PATH?>/img/sh_car3.png" alt="sh_car1.png" width="160" height="180">
               <div class="txt">
                  <div class="model">Маз</div>
                  <div class="cost"><span>1 800</span>руб./час</div>
               </div>
            </div>
         </div>
      </div>

      <div class="sh__visual">
         <p class="intro">Стоимость доставки по городу:</p>
         <div class="area_cost cl">
            <div class="area red"><span>400</span>руб.</div>
            <div class="area green"><span>600</span>руб.</div>
            <div class="area yellow"><span>800</span>руб.</div>
            <div class="area blue"><span>1000</span>руб.</div>
            <div class="area gray"><span>1200</span>руб.</div>
         </div>
         <div class="map"><span><img src="<?=SITE_TEMPLATE_PATH?>/img/shipping_area.jpg" width="560" height="610" alt=""></span></div>
      </div>
    </div>
  </div><!--end::area-->
</div><!--end::delivery__areas-->


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>