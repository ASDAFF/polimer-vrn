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
								<li><a href="#">Адреса магазинов</a>
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
							<?$APPLICATION->IncludeComponent(
								"bitrix:menu", 
								"footer-catalog", 
								array(
									"ALLOW_MULTI_SELECT" => "N",
									"CHILD_MENU_TYPE" => "footer_catalog",
									"DELAY" => "N",
									"MAX_LEVEL" => "1",
									"MENU_CACHE_GET_VARS" => array(
									),
									"MENU_CACHE_TIME" => "3600",
									"MENU_CACHE_TYPE" => "A",
									"MENU_CACHE_USE_GROUPS" => "Y",
									"ROOT_MENU_TYPE" => "footer_catalog",
									"USE_EXT" => "N",
									"COMPONENT_TEMPLATE" => "footer-catalog"
								),
								false
							); //footer__list?>
						</div>
					</div>
					<div class="footer__bottom cl">
						<div class="footer__copyright">© 2006 — 2016. Полимер.</div>
						<ul class="footer__pay pay" title="Все способы оплаты">
							<li><a href="#" class="visa">Visa</a></li>
							<li><a href="#" class="master">MasterCard</a></li>
							<li><a href="#" class="qiwi">Qiwi</a></li>
							<li><a href="#" class="webmoney">Webmoney</a></li>
							<li><a href="#" class="ya">Яндекс Деньги</a></li>
						</ul>
						<div class="footer__studio"><a href="http://www.agrweb.ru" title="Создание сайтов на 1С-Битркикс" target="_blank">Создание сайта </a>
							<a href="http://www.agrweb.ru" target="_blank">
								<img src="<?=SITE_TEMPLATE_PATH?>/img/agrweb.png" width="110" height="10" alt="Разработчик сайта">
							</a>
						</div>
					</div>
				</footer>
			</div><!--end::wr-->
     	</div><!--end::container-->


     	<div class="popup" id="mailus">
     		<a href="#" class="close">&nbsp;</a>
     		<div class="title">Написать письмо</div>
     		<div class="subtitle">Если у Вас возник вопрос или Вы хотите оставить комментарий, воспользуйтесь формой обратной связи. Наши специалисты свяжутся с Вами в ближайшее время.</div>
     		<form action="#">
     			<fieldset>
     				<span class="line cl">
     					<span class="label">ФИО</span>
     					<span class="value"><input type="text" name="NAME" /></span>
     				</span>
     				<span class="line cl">
     					<span class="label">Телефон</span>
     					<span class="value"><input class="phone" type="text" name="PHONE" /></span>
     				</span>
     				<span class="line cl">
     					<span class="label">E-mail</span>
     					<span class="value"><input type="text" name="EMAIL" /></span>
     				</span>
     				<span class="line cl wide">
     					<span class="label">Текст сообщения</span>
     					<span class="value">
     						<textarea name="TEXT"></textarea>
     					</span>
     				</span>
     				<span class="line submit"><input type="submit" value="Отправить сообщение" /></span>
     			</fieldset>
     		</form>
     	</div>
     	<div class="popup" id="oneclick">
     		<a href="#" class="close">&nbsp;</a>
     		<div class="title">Купить в 1 клик</div>
     		<div class="subtitle">Укажите ваши данные и наши менеджеры свяжуться с вами для оформления заказа</div>
     		<form action="#">
     			<fieldset>
     				<span class="line cl">
     					<span class="label">ФИО</span>
     					<span class="value"><input type="text" name="NAME" /></span>
     				</span>
     				<span class="line cl">
     					<span class="label">Телефон</span>
     					<span class="value"><input class="phone" type="text" name="PHONE" /></span>
     				</span>
     				<span class="line cl">
     					<span class="label">E-mail</span>
     					<span class="value"><input type="text" name="EMAIL" /></span>
     				</span>
     				<span class="line submit"><input type="submit" value="Отправить" /></span>
     			</fieldset>
     		</form>
     	</div>
     	<div class="popup" id="specialist">
     		<a href="#" class="close">&nbsp;</a>
     		<div class="title">Бесплатная консультация</div>
     		<div class="subtitle">Укажите ваши данные и наши консультанты свяжуться с вами в ближайшее время</div>
     		<form action="#">
     			<fieldset>
     				<span class="line cl">
     					<span class="label">ФИО</span>
     					<span class="value"><input type="text" name="NAME" /></span>
     				</span>
     				<span class="line cl">
     					<span class="label">Телефон</span>
     					<span class="value"><input class="phone" type="text" name="PHONE" /></span>
     				</span>
     				<span class="line cl">
     					<span class="label">E-mail</span>
     					<span class="value"><input type="text" name="EMAIL" /></span>
     				</span>
     				<span class="line submit"><input type="submit" value="Отправить" /></span>
     			</fieldset>
     		</form>
     	</div>
	</body>
</html>