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

//var_dump($arResult);
?>

<div class="prod_card cl">
   <div class="pc__prod-info">
      <h1><?=$arResult['NAME']?></h1>
      <div class="pc__code">Код товара: <span><?=$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE']?></span></div>

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
                  <input type="text" value="1" id="count_product"/>
                  <a class="plus" href="#"></a>
               </div>
            </div>

            <a href="javascript:void(0)" class="add2cart" onclick="addToBasket2(<?=$arResult['ID']?>, $('#count_product').val());">Добавить в корзину</a>
            <a href="#" class="bb_btn show-popup" data-id="oneclick"><span>Купить<br>в один клик</span></a>
            <a href="#" class="bb_btn spec_help show-popup" data-id="specialist"><span>Помощь<br>специалиста</span></a>
         </div>
      </div>

      <div class="pc__tabs">
         <div class="t-list cl">
            <a href="#"><span>Описание</span></a>
            <a href="#"><span>Технические характеристики</span></a>
            <a href="#"><span>Отзывы </span></a>
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
               <a href="#" class="mtb" onclick="return false">Отзывы</a>
               <div class="content">


                  <?$APPLICATION->IncludeComponent("bitrix:forum.topic.reviews", "reviews", Array(
                      "AJAX_POST" => "Y",	// Р�СЃРїРѕР»СЊР·РѕРІР°С‚СЊ AJAX РІ РґРёР°Р»РѕРіР°С…
                      "CACHE_TIME" => "0",	// Р’СЂРµРјСЏ РєРµС€РёСЂРѕРІР°РЅРёСЏ (СЃРµРє.)
                      "CACHE_TYPE" => "A",	// РўРёРї РєРµС€РёСЂРѕРІР°РЅРёСЏ
                      "DATE_TIME_FORMAT" => "d.m.Y H:i:s",	// Р¤РѕСЂРјР°С‚ РїРѕРєР°Р·Р° РґР°С‚С‹ Рё РІСЂРµРјРµРЅРё
                      "EDITOR_CODE_DEFAULT" => "Y",	// РџРѕ СѓРјРѕР»С‡Р°РЅРёСЋ РїРѕРєР°Р·С‹РІР°С‚СЊ РЅРµРІРёР·СѓР°Р»СЊРЅС‹Р№ СЂРµР¶РёРј СЂРµРґР°РєС‚РѕСЂР°
                      "ELEMENT_ID" => $arResult['ID'],	// ID СЌР»РµРјРµРЅС‚Р°
                      "FILES_COUNT" => "2",	// РњР°РєСЃРёРјР°Р»СЊРЅРѕРµ РєРѕР»РёС‡РµСЃС‚РІРѕ С„Р°Р№Р»РѕРІ, РїСЂРёРєСЂРµРїР»РµРЅРЅС‹С… Рє РѕРґРЅРѕРјСѓ СЃРѕРѕР±С‰РµРЅРёСЋ
                      "FORUM_ID" => "1",	// ID С„РѕСЂСѓРјР° РґР»СЏ РѕС‚Р·С‹РІРѕРІ
                      "IBLOCK_ID" => "11",	// РљРѕРґ РёРЅС„РѕСЂРјР°С†РёРѕРЅРЅРѕРіРѕ Р±Р»РѕРєР°
                      "IBLOCK_TYPE" => "1c_catalog",	// РўРёРї РёРЅС„РѕСЂРјР°С†РёРѕРЅРЅРѕРіРѕ Р±Р»РѕРєР° (РёСЃРїРѕР»СЊР·СѓРµС‚СЃСЏ С‚РѕР»СЊРєРѕ РґР»СЏ РїСЂРѕРІРµСЂРєРё)
                      "MESSAGES_PER_PAGE" => "10",	// РљРѕР»РёС‡РµСЃС‚РІРѕ СЃРѕРѕР±С‰РµРЅРёР№ РЅР° РѕРґРЅРѕР№ СЃС‚СЂР°РЅРёС†Рµ
                      "NAME_TEMPLATE" => "",	// Р¤РѕСЂРјР°С‚ РёРјРµРЅРё
                      "PAGE_NAVIGATION_TEMPLATE" => "",	// РќР°Р·РІР°РЅРёРµ С€Р°Р±Р»РѕРЅР° РґР»СЏ РІС‹РІРѕРґР° РїРѕСЃС‚СЂР°РЅРёС‡РЅРѕР№ РЅР°РІРёРіР°С†РёРё
                      "PREORDER" => "N",	// Р’С‹РІРѕРґРёС‚СЊ СЃРѕРѕР±С‰РµРЅРёСЏ РІ РїСЂСЏРјРѕРј РїРѕСЂСЏРґРєРµ
                      "RATING_TYPE" => "",	// Р’РёРґ РєРЅРѕРїРѕРє СЂРµР№С‚РёРЅРіР°
                      "SHOW_AVATAR" => "N",	// РџРѕРєР°Р·С‹РІР°С‚СЊ Р°РІР°С‚Р°СЂС‹ РїРѕР»СЊР·РѕРІР°С‚РµР»РµР№
                      "SHOW_LINK_TO_FORUM" => "N",	// РџРѕРєР°Р·Р°С‚СЊ СЃСЃС‹Р»РєСѓ РЅР° С„РѕСЂСѓРј
                      "SHOW_MINIMIZED" => "N",	// РЎРІРѕСЂР°С‡РёРІР°С‚СЊ С„РѕСЂРјСѓ РґРѕР±Р°РІР»РµРЅРёСЏ РѕС‚Р·С‹РІР°
                      "SHOW_RATING" => "N",	// Р’РєР»СЋС‡РёС‚СЊ СЂРµР№С‚РёРЅРі
                      "URL_TEMPLATES_DETAIL" => "",	// РЎС‚СЂР°РЅРёС†Р° СЌР»РµРјРµРЅС‚Р° РёРЅС„РѕР±Р»РѕРєР°
                      "URL_TEMPLATES_PROFILE_VIEW" => "",	// РЎС‚СЂР°РЅРёС†Р° РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ
                      "URL_TEMPLATES_READ" => "",	// РЎС‚СЂР°РЅРёС†Р° С‡С‚РµРЅРёСЏ С‚РµРјС‹ С„РѕСЂСѓРјР°
                      "USE_CAPTCHA" => "N",	// Р�СЃРїРѕР»СЊР·РѕРІР°С‚СЊ CAPTCHA
                      "COMPONENT_TEMPLATE" => ".default",
                      "SHOW_SUBSCRIBE" => "N"
                  ),
                      false
                  );?>


               </div>
            </div>
            <div class="tab tab_nal active">
               <a href="#" class="mtb" onclick="return false">Наличие в магазинах</a>
               <div class="content">
                  <?$APPLICATION->IncludeComponent("bitrix:catalog.store.amount", "store", Array(
                      "CACHE_TIME" => "36000",	// Р’СЂРµРјСЏ РєРµС€РёСЂРѕРІР°РЅРёСЏ (СЃРµРє.)
                      "CACHE_TYPE" => "N",	// РўРёРї РєРµС€РёСЂРѕРІР°РЅРёСЏ
                      "ELEMENT_CODE" => "",	// РљРѕРґ С‚РѕРІР°СЂР°
                      "ELEMENT_ID" => $arResult['ID'],	// РўРѕРІР°СЂ
                      "FIELDS" => array(	// РџРѕР»СЏ
                          0 => "TITLE",
                          1 => "ADDRESS",
                          2 => "DESCRIPTION",
                          3 => "PHONE",
                          4 => "EMAIL",
                          5 => "IMAGE_ID",
                          6 => "COORDINATES",
                          7 => "SCHEDULE",
                          8 => "",
                      ),
                      "IBLOCK_ID" => "11",	// Р�РЅС„РѕР±Р»РѕРє
                      "IBLOCK_TYPE" => "1c_catalog",	// РўРёРї РёРЅС„РѕР±Р»РѕРєР°
                      "MAIN_TITLE" => "",	// Р—Р°РіРѕР»РѕРІРѕРє
                      "MIN_AMOUNT" => "0",
                      "OFFER_ID" => "",	// РўРѕСЂРіРѕРІРѕРµ РїСЂРµРґР»РѕР¶РµРЅРёРµ
                      "SHOW_EMPTY_STORE" => "Y",	// РћС‚РѕР±СЂР°Р¶Р°С‚СЊ СЃРєР»Р°Рґ РїСЂРё РѕС‚СЃСѓС‚СЃС‚РІРёРё РЅР° РЅРµРј С‚РѕРІР°СЂР°
                      "SHOW_GENERAL_STORE_INFORMATION" => "N",	// РџРѕРєР°Р·С‹РІР°С‚СЊ РѕР±С‰СѓСЋ РёРЅС„РѕСЂРјР°С†РёСЋ РїРѕ СЃРєР»Р°РґР°Рј
                      "STORES" => array(	// РЎРєР»Р°РґС‹
                          0 => "1",
                          1 => "2",
                          2 => "",
                      ),
                      "STORE_PATH" => "",	// URL РЅР° СЃС‚СЂР°РЅРёС†Сѓ, РіРґРµ Р±СѓРґРµС‚ РїРѕРєР°Р·Р°РЅР° РґРµС‚Р°Р»СЊРЅР°СЏ РёРЅС„РѕСЂРјР°С†РёСЏ Рѕ СЃРєР»Р°РґРµ
                      "USER_FIELDS" => array(	// РЎРІРѕР№СЃС‚РІР°
                          0 => "",
                          1 => "",
                      ),
                      "USE_MIN_AMOUNT" => "Y",	// РџРѕРєР°Р·С‹РІР°С‚СЊ РІРјРµСЃС‚Рѕ С‚РѕС‡РЅРѕРіРѕ РєРѕР»РёС‡РµСЃС‚РІР° РёРЅС„РѕСЂРјР°С†РёСЋ Рѕ РґРѕСЃС‚Р°С‚РѕС‡РЅРѕСЃС‚Рё
                  ),
                      false
                  );?>
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
