<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

var_dump();
?>

<div class="prod_card cl">
   <div class="pc__prod-info">
      <h1><?=$arResult['NAME']?></h1>
      <div class="pc__code">Код товара: <span>13515348</span></div>

      <div class="cl">
         <div class="pc__prod-gallery cl">
            <div class="pg-thumbnails">
               <? foreach($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $key => $img):?>
               <div class="item <? if($key < 1): ?>active<? endif; ?>"><a href="#"><span><img src="<?=CFile::GetPath($img)?>" alt="<?=$arResult['NAME']?>"></span></a></div>
               <? endforeach; ?>

            </div>
            <div class="pg-current">
               <? foreach($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $key => $img):?>
               <a href="<?=CFile::GetPath($img)?>" class="<? if($key < 1): ?>active<? endif; ?>" data-fancybox="gallery<?=$arResult['ID']?>"><img src="<?=CFile::GetPath($img)?>" alt="<?=$arResult['NAME']?>"></a>
               <? endforeach; ?>
            </div>
         </div>

         <div class="pc__buy-block cl">
            <div class="bb_compare">
               <input type="checkbox" id="icompare">
               <label for="icompare">Сравнить</label>
            </div>

            <div class="bb_col">
               <div class="price">
                  <? foreach($arResult['ITEM_PRICES'] as $name => $price):?>
                  <div class="price-old"><span><?=$price['BASE_PRICE']?></span> руб.</div>
                  <div class="price-new"><span><?=$price['UNROUND_PRICE']?></span>  руб.</div>
                  <? endforeach; ?>
               </div>
               <a href="#" class="cheaper">Нашли дешевле ?</a>
            </div>

            <div class="bb_col right">
               <div class="sale">
                  <? foreach($arResult['ITEM_PRICES'] as $name => $price):?>
                  <span>СКИДКА <?=$price['PERCENT']?>%</span>
                  <? endforeach; ?>
                  <span>при заказе<br>с сайта</span>
               </div>
               <div class="quantity">
                  <a class="minus na" href="#"></a>
                  <input type="text" value="1"/>
                  <a class="plus" href="#"></a>
               </div>
            </div>

            <a href="#" class="add2cart">Добавить в корзину</a>
            <a href="#" class="bb_btn show-popup" data-id="oneclick"><span>Купить<br>в один клик</span></a>
            <a href="#" class="bb_btn spec_help show-popup" data-id="specialist"><span>Помощь<br>специалиста</span></a>
         </div>
      </div>

      <div class="pc__tabs">
         <div class="t-list cl">
            <a href="#"><span>Описание</span></a>
            <a href="#"><span>Технические характеристики</span></a>
            <a href="#"><span>Отзывы (<span class="count">23</span>)</span></a>
            <a href="#" class="active"><span>Наличие в магазинах</span></a>
         </div>
         <div class="t-content">
            <div class="tab tab_des">
               <a href="#" class="mtb" onclick="return false">Описание</a>
               <div class="content">
                  <?=$arResult['DETAIL_TEXT']?>
               </div>
            </div>
            <div class="tab tab_tec">
               <a href="#" class="mtb" onclick="return false">Технические характеристики</a>
               <div class="content">
                  <?
                  if (!empty($arResult['PROPERTIES']))
                  {
                     foreach($arResult['PROPERTIES'] as $property){
                        if(
                            strlen($property['VALUE']) > 1 AND
                            $property['MULTIPLE'] == "N" AND
                            ($property['PROPERTY_TYPE'] == "S" OR
                            $property['PROPERTY_TYPE'] == "L")
                        ){
                           ?>
                           <div class="line cl">
                              <div class="prop"><?=$property['NAME']?></div>
                              <div class="val"><?=$property['VALUE']?></div>
                           </div>
                           <?

                        }
                     }
                  }
                  ?>
               </div>
            </div>
            <div class="tab tab_fed">
               <a href="#" class="mtb" onclick="return false">Отзывы (<div class="count">23</div>)</a>
               <div class="content">
                  <div class="comment">
                     <div class="item main">
                        <div class="title">Иванов Иван</div>
                        <div class="date">15.05.2017</div>
                        <div class="txt">Настенный газовый двухконтурный котел CIAO 24 предназначен для отопления и горячего водоснабжения помещений различного назначения. Котёл CIAO c открытой камерой сгорания. Благодаря небольшим габаритам и хорошему соотношению цена/качество, котлы CIAO широко используются в многоэтажных домах с поквартирным теплоснабжением.</div>
                     </div>
                     <div class="item positive">
                        <div class="title">Достоинства</div>
                        <div class="txt">Благодаря небольшим габаритам и хорошему соотношению цена/качество, котлы CIAO широко используются в многоэтажных домах с поквартирным теплоснабжением.</div>
                     </div>
                     <div class="item negative">
                        <div class="title">Недостатки</div>
                        <div class="txt">Благодаря небольшим габаритам и хорошему соотношению цена/качество, котлы CIAO широко используются в многоэтажных домах с поквартирным теплоснабжением.</div>
                     </div>
                  </div>
                  <div class="comment">
                     <div class="item main">
                        <div class="title">Иванов Иван</div>
                        <div class="date">15.05.2017</div>
                        <div class="txt">Настенный газовый двухконтурный котел CIAO 24 предназначен для отопления и горячего водоснабжения помещений различного назначения. Котёл CIAO c открытой камерой сгорания. Благодаря небольшим габаритам и хорошему соотношению цена/качество, котлы CIAO широко используются в многоэтажных домах с поквартирным теплоснабжением.</div>
                     </div>
                     <div class="item positive">
                        <div class="title">Достоинства</div>
                        <div class="txt">Благодаря небольшим габаритам и хорошему соотношению цена/качество, котлы CIAO широко используются в многоэтажных домах с поквартирным теплоснабжением.</div>
                     </div>
                     <div class="item negative">
                        <div class="title">Недостатки</div>
                        <div class="txt">Благодаря небольшим габаритам и хорошему соотношению цена/качество, котлы CIAO широко используются в многоэтажных домах с поквартирным теплоснабжением.</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tab tab_nal active">
               <a href="#" class="mtb" onclick="return false">Наличие в магазинах</a>
               <div class="content">
                  <div class="tab-row cl head">
                     <div class="tab-cell">Адрес \ Телефон</div>
                     <div class="tab-cell">Наличие</div>
                     <div class="tab-cell">Забрать</div>
                     <div class="tab-cell">Режим работы</div>
                  </div>
                  <div class="tab-row cl">
                     <div class="tab-cell"><div class="mtn">Адрес \ Телефон</div>г. Воронеж, Ильюшина, д.10А <span>+7 (473) 237-35-55</span> e-mail: <a href="#">info@polimer-vrn.ru</a></div>
                     <div class="tab-cell">
                        <div class="mtn">Наличие</div>
                        <div class="qbar cl">
                           <span class="green"></span>
                           <span class="green"></span>
                           <span class="green"></span>
                           <span class="green"></span>
                           <span class="green"></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                        </div>
                        <div class="q">Много</div>
                     </div>
                     <div class="tab-cell">
                        <div class="mtn">Забрать</div>
                        <div class="when">Сегодня</div>
                        <div class="time"></div>
                     </div>
                     <div class="tab-cell"><div class="mtn">Режим работы</div>с 8:00 до 17:00 (пн-пт)<br>с 8:30 до 16:30 (сб)<br>воскресенье - <span>выходной</span></div>
                  </div>
                  <div class="tab-row cl">
                     <div class="tab-cell"><div class="mtn">Адрес \ Телефон</div>г. Воронеж, Ильюшина, д.10А <span>+7 (473) 237-35-55</span> e-mail: <a href="#">info@polimer-vrn.ru</a></div>
                     <div class="tab-cell">
                        <div class="mtn">Наличие</div>
                        <div class="qbar cl">
                           <span class="yellow"></span>
                           <span class="yellow"></span>
                           <span class="yellow"></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                        </div>
                        <div class="q">Мало</div>
                     </div>
                     <div class="tab-cell">
                        <div class="mtn">Забрать</div>
                        <div class="when">Завтра</div>
                        <div class="time">после 14:00</div>
                     </div>
                     <div class="tab-cell"><div class="mtn">Режим работы</div>с 8:00 до 17:00 (пн-пт)<br>с 8:30 до 16:30 (сб)<br>воскресенье - <span>выходной</span></div>
                  </div>
                  <div class="tab-row cl">
                     <div class="tab-cell"><div class="mtn">Адрес \ Телефон</div>г. Воронеж, Ильюшина, д.10А <span>+7 (473) 237-35-55</span> e-mail: <a href="#">info@polimer-vrn.ru</a></div>
                     <div class="tab-cell">
                        <div class="mtn">Наличие</div>
                        <div class="qbar cl">
                           <span class="red"></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                        </div>
                        <div class="q">1 шт.</div>
                     </div>
                     <div class="tab-cell">
                        <div class="mtn">Забрать</div>
                        <div class="when">Завтра</div>
                        <div class="time">после 14:00</div>
                     </div>
                     <div class="tab-cell"><div class="mtn">Режим работы</div>с 8:00 до 17:00 (пн-пт)<br>с 8:30 до 16:30 (сб)<br>воскресенье - <span>выходной</span></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div><!--end::pc__prod-info-->

   <div class="pc__prod-also">
      <div class="pc__vertical-carousel">
         <div class="vc-title">С этим товаром покупают</div>
         <div class="vc-shell">
            <div class="vc-block">
               <div>
                  <div class="item cl">
                     <a href="#"><span><img src="<?=SITE_TEMPLATE_PATH?>/img/card/vc/item1.png" alt=""></span></a>
                     <div class="cost"><span>1250</span> Руб.</div>
                     <a href="#" class="txt">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
                     <a href="#" class="add2cart">В корзину</a>
                  </div>
               </div>
               <div>
                  <div class="item cl">
                     <a href="#"><span><img src="<?=SITE_TEMPLATE_PATH?>/img/card/vc/item2.png" alt=""></span></a>
                     <div class="cost"><span>1250</span> Руб.</div>
                     <a href="#" class="txt">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
                     <a href="#" class="add2cart">В корзину</a>
                  </div>
               </div>
               <div>
                  <div class="item cl">
                     <a href="#"><span><img src="<?=SITE_TEMPLATE_PATH?>/img/card/vc/item3.png" alt=""></span></a>
                     <div class="cost"><span>1250</span> Руб.</div>
                     <a href="#" class="txt">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
                     <a href="#" class="add2cart">В корзину</a>
                  </div>
               </div>
               <div>
                  <div class="item cl">
                     <a href="#"><span><img src="<?=SITE_TEMPLATE_PATH?>/img/card/vc/item4.png" alt=""></span></a>
                     <div class="cost"><span>1250</span> Руб.</div>
                     <a href="#" class="txt">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
                     <a href="#" class="add2cart">В корзину</a>
                  </div>
               </div>
               <div>
                  <div class="item cl">
                     <a href="#"><span><img src="<?=SITE_TEMPLATE_PATH?>/img/card/vc/item2.png" alt=""></span></a>
                     <div class="cost"><span>1250</span> Руб.</div>
                     <a href="#" class="txt">Радиатор биметаллический RADENA BIMETALL CS 500, 10 секций</a>
                     <a href="#" class="add2cart">В корзину</a>
                  </div>
               </div>
            </div>
            <div class="vc-ctrl"></div>
         </div>
      </div>
   </div><!--end::pc__prod-also-->

   <div class="cl"></div>

</div><!--end::prod_card-->
