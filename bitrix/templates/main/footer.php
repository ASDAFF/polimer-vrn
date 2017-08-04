				<?if(!$is_main && $pages[1] !== 'basket' && !($pages[1] == 'catalog' && $pages[3])){?>
				</div><!--end::page_content-->
				<?}?>
				<footer>

					<div class="footer__top cl">
						<div class="footer__col col--1">
							<a href="/" class="footer__logo">
								<img src="<?=SITE_TEMPLATE_PATH?>/img/h_logo.jpg" alt="Полимер" width="206" height="44">
							</a>
							<p class="footer__logotext">Оптово-розничной торговля материалами и оборудованием для отопления и водоснабжения в Воронежской области.</p>
						</div><!--end::col__1-->
						<div class="footer__col col--2">
							<div class="footer__title">Контакты</div>
							<ul class="footer__list cl">
								<li>+7 (473) 250-22-33</li>
								<li>+7 (473) 250-22-33</li>
								<li><a href="/contacts/">Адреса магазинов</a>
							</li>
							</ul>
						</div><!--end::col__2-->
						<div class="footer__col col--3">
							<div class="footer__title">Компания</div>
							<?$APPLICATION->IncludeComponent(
								"bitrix:menu", 
								"footer-about", 
								array(
									"ALLOW_MULTI_SELECT" => "N",
									"CHILD_MENU_TYPE" => "top",
									"DELAY" => "N",
									"MAX_LEVEL" => "1",
									"MENU_CACHE_GET_VARS" => array(
									),
									"MENU_CACHE_TIME" => "3600",
									"MENU_CACHE_TYPE" => "A",
									"MENU_CACHE_USE_GROUPS" => "Y",
									"ROOT_MENU_TYPE" => "top",
									"USE_EXT" => "N",
									"COMPONENT_TEMPLATE" => "footer-about"
								),
								false
							); //footer__list  footer__list--50?>
						</div><!--end::col__3-->
						<div class="footer__col col--4">
							<div class="footer__title">Каталог</div>
							<div class="cl">
								<ul class="footer__list footer__list--50">
									<li><a href="/catalog/inzhenernaya_santekhnika_otoplenie_vodoprovod_kanalizatsiya/">Инженерная сантехника</a></li>
									<li><a href="/catalog/stroitelnye_materialy/">Строительные материалы</a></li>
								</ul>
							</div>
							<?
							/*
							$APPLICATION->IncludeComponent(
								"bitrix:menu", 
								"footer-catalog", 
								array(
									"ALLOW_MULTI_SELECT" => "N",
									"CHILD_MENU_TYPE" => "footer",
									"DELAY" => "N",
									"MAX_LEVEL" => "1",
									"MENU_CACHE_GET_VARS" => array(
									),
									"MENU_CACHE_TIME" => "3600",
									"MENU_CACHE_TYPE" => "A",
									"MENU_CACHE_USE_GROUPS" => "Y",
									"ROOT_MENU_TYPE" => "footer_catalog",
									"USE_EXT" => "N",
									"COMPONENT_TEMPLATE" => "footer"
								),
								false
							); //footer__list */?>
						</div>
					</div>
					<div class="footer__bottom cl">
						<div class="footer__copyright">© 2006 — <?=data("Y");?>. Полимер.</div>
						<ul class="footer__pay pay" title="Все способы оплаты">
							<li><a href="javascript:void(0)" class="visa">Visa</a></li>
							<li><a href="javascript:void(0)" class="master">MasterCard</a></li>
							<li><a href="javascript:void(0)" class="qiwi">Qiwi</a></li>
							<li><a href="javascript:void(0)" class="webmoney">Webmoney</a></li>
							<li><a href="javascript:void(0)" class="ya">Яндекс Деньги</a></li>
						</ul>
						<div class="footer__studio">


						</div>
					</div>
				</footer>
			</div><!--end::wr-->
     	</div><!--end::container-->

				<!— BEGIN JIVOSITE CODE {literal} —>
				<script type='text/javascript'>
					(function(){ var widget_id = 'Ms4VnpNIHY';var d=document;var w=window;function l(){
						var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
				</script>
				<!— {/literal} END JIVOSITE CODE —>


			<?$APPLICATION->IncludeComponent("nbrains:main.feedback", "write-mail", Array(
				"EMAIL_TO" => "sale@polimer-vrn",	// E-mail, на который будет отправлено письмо
				"EVENT_MESSAGE_ID" => array(	// Почтовые шаблоны для отправки письма
					0 => "88",
				),
				"IBLOCK_ID" => "14",	// Код информационного блока
				"IBLOCK_TYPE" => "feedback",	// Тип информационного блока (используется только для проверки)
				"OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
				"PROPERTY_CODE" => array(	// Поля формы
					0 => "FIO",
					1 => "PHONE",
					2 => "EMAIL",
					3 => "DESC",
					4 => "RULE",
				),
				"USE_CAPTCHA" => "N",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
			),
				false
			);?>


				<?$APPLICATION->IncludeComponent("nbrains:main.feedback", "buy-one-click", Array(
					"EMAIL_TO" => "sale@polimer-vrn",	// E-mail, на который будет отправлено письмо
					"EVENT_MESSAGE_ID" => array(	// Почтовые шаблоны для отправки письма
						0 => "88",
					),
					"IBLOCK_ID" => "15",	// Код информационного блока
					"IBLOCK_TYPE" => "feedback",	// Тип информационного блока (используется только для проверки)
					"OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
					"PROPERTY_CODE" => array(	// Поля формы
						0 => "FIO",
						1 => "PHONE",
						2 => "EMAIL",
						3 => "RULE",
					),
					"USE_CAPTCHA" => "N",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
				),
					false
				);?>

				<?$APPLICATION->IncludeComponent("nbrains:main.feedback", "free-consultant", Array(
					"EMAIL_TO" => "sale@polimer-vrn",	// E-mail, на который будет отправлено письмо
					"EVENT_MESSAGE_ID" => "",	// Почтовые шаблоны для отправки письма
					"IBLOCK_ID" => "16",	// Код информационного блока
					"IBLOCK_TYPE" => "feedback",	// Тип информационного блока (используется только для проверки)
					"OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
					"PROPERTY_CODE" => array(	// Поля формы
						0 => "FIO",
						1 => "PHONE",
						2 => "EMAIL",
						3 => "RULE",
					),
					"USE_CAPTCHA" => "N",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
				),
					false
				);?>


	</body>
</html>