<link rel="stylesheet" href="css/modal.css"/>


<div class="modal-mask">
	<div class="tst-modal-overlay"></div>
	<div class="modal-close mc-dt">
		<svg  viewBox="0 0 36 36" class="icon">
			<use xlink:href="#cross-white"></use>
		</svg>		
	</div>
	<div class="modal" id="modal">
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window,document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '192530575279847'); 
			fbq('track', 'PageView');
			fbq('track', 'AddToCart');
		</script>
		<noscript>
			<img height="1" width="1" 
			src="https://www.facebook.com/tr?id=192530575279847&ev=PageView
			&noscript=1"/>
		</noscript>
		<div class="modal-close mobile-close">
			<svg  viewBox="0 0 32 32" class="icon mob">
				<use xlink:href="#cross-black"></use>
			</svg>
		</div>
		<form class="" id="ajax_form" action="" method="GET">
			
			<button type="button" id="prevBtn" class="btn prev" onclick="nextPrev(-1)">
				<svg viewBox="0 0 24 24" class="icon">
					<use xlink:href="#arrow-left "></use>
				</svg>
			</button>
	      	<!-- <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
	      	<div class="steps-progress" id="steps-progress">
	      		<!-- <svg width="94" height="94" viewBox="0 0 94 94" id="progress-circle"></svg>
	      		<span class="step-number" id="step-number"></span> -->
	      	</div>
			<div class="modal-content">
				<div class="tab">
					<h3 class="title">Енергія SCOUT потрібна вашому собаці?</h3>
					<input type="hidden" name="action" value="getfood">
					<div class="modal-description">
						<p>Залежно від способу життя собаки та його природних даних ми можемо зрозуміти, скільки енергії йому потрібно протягом дня. Пройдіть тест та дізнайтесь чи вашому чотирилапому необхідний високоенергетичний раціон SCOUT.</p>
					</div>
				</div>
				<div class="tab">
					<h3 class="title">Вкажіть породу вашого собаки</h3>
					<div class="modal-form-controls">
						<input type="text" name="breed" placeholder="Порода" class="">
					</div>
				</div>

				<div class="tab">
					<h3 class="title">Вкажіть вік вашого собаки</h3>
					<div class="modal-form-controls">
						<label class="modal-label-1">
							
							<input type="radio" class="radio_btn" name="age" value="to1" onclick="validateForm()" required="required">	
							<span>Менше року</span>		
						</label>
						<label class="modal-label-1">			
							<input type="radio" class="radio_btn" name="age" value="15" onclick="validateForm()" required="required">
							<span>1-5 років</span>
						</label>	
						<label class="modal-label-1">
							<input type="radio" class="radio_btn" name="age" value="610" onclick="validateForm()" required="required">
							<span>6-10 років</span>
						</label>	
						<label class="modal-label-1">							
							<input type="radio" class="radio_btn" name="age" value="1115" onclick="validateForm()" required="required">
							<span>11-15 років</span>
						</label>	
						<label class="modal-label-1">							
							<input type="radio" class="radio_btn" name="age" value="more15" onclick="validateForm()" required="required">
							<span>Більше 15 років</span>
						</label>	
					</div>
				</div>

				<div class="tab">
					<h3 class="title">Скільки важить ваша собака?</h3>
					<div class="modal-form-controls">
						<label class="modal-label-1">							
							<input type="radio" class="radio_btn" name="weight" value="to10" onclick="validateForm()">
							<span>Менше 10 кг</span>
						</label>
						<label class="modal-label-1">							
							<input type="radio" class="radio_btn" name="weight" value="1125" onclick="validateForm()">
							<span>11-25 кг</span>
						</label>
						<label class="modal-label-1">							
							<input type="radio" class="radio_btn" name="weight" value="2590" onclick="validateForm()">
							<span>25-90 кг</span>
						</label>
					</div>
				</div>

				<div class="tab">
					<h3 class="title">Як ви оцінюєте активність вашої собаки?</h3>
					<h4 class="subtitle" id="asc-text"></h4>

					<div class="modal-form-controls subtt">
						<label class="modal-label-1">		
							<input type="radio" class="radio_btn" name="activity" value="scaut" onclick="validateForm()" data-sub="На службі, полюванні або активність більше 4 год в день">
							<span>Супер-активна (собака-скаут)</span>
						</label>
						<label class="modal-label-1">		
							<input type="radio" class="radio_btn" name="activity" value="veryactive" onclick="validateForm()" data-sub="Більше 2,5 год в день, як під час прогулянок, так і вдома">
							<span>Дуже активна</span>
						</label>
						<label class="modal-label-1">		
							<input type="radio" class="radio_btn" name="activity" value="active" onclick="validateForm()" data-sub="Прогулянки 2-2,5 год на день, дома здебільшого неактивна">
							<span>Помірно активна</span>
						</label>
						<label class="modal-label-1">		
							<input type="radio" class="radio_btn" name="activity" value="noactive" onclick="validateForm()" data-sub="Менше 2 год на день, під час прогулянок, так і вдома">
							<span>Малоактивна</span>
						</label>
					</div>
				</div>

				<div class="tab">
					<h3 class="title">Чи схильна ваша собака до алергії?</h3>
					<div class="modal-form-controls">
						<label class="modal-label-1">		
							<input type="radio" class="radio_btn" name="allergies" value="yes" onclick="validateForm()">
							<span>Так</span>
						</label>
						<label class="modal-label-1">		
							<input type="radio" class="radio_btn" name="allergies" value="no" onclick="validateForm()">
							<span>Ні</span>
						</label>
					</div>
				</div>

				<div class="tab last">
					<h3 class="title">Чи є у вашої собаки надмірна вага?</h3>
					<div class="modal-form-controls">
						<label class="modal-label-1">		
							<input type="radio" class="radio_btn" name="overweight" value="yes" onclick="validateForm()">
							<span>Так</span>
						</label>
						<label class="modal-label-1">		
							<input type="radio" class="radio_btn" name="overweight" value="no" onclick="validateForm()">
							<span>Ні</span>
						</label>
					</div>
				</div>
				
				<div class="modal-btn" type="button" id="nextBtn" onclick="nextPrev(1)" onClick="ga('send', 'event', { eventCategory: 'Почати тест', eventAction: 'test'});">Починаємо!</div>
				
			</form>
			<div class="tab result" id="result_form">
				<div class="right-col-mob" id="result_img">
					<img src="img/pack.png">
				</div>
				<div class="left-col">
					<h3 class="title"><span id="result_box"></span></h3>
					<p id="result_desc">Залежно від активностей та способу життя Вашого собаки порції та денна норма раціону Scout відрізняється. Давайте пройдемо коротенький тест, аби зрозуміти чи потрібен Scout Вашій собаці і як правильно скласти денну норму преміум раціону.</p>
					<div class="box_oth_actv">
						<h4>Дізнайтеся про раціон Актив на офіційному сайті</h4>
						<a href="https://club4paws.com/product/dogs/club-4-paws-premium-aktiv-povnoratsionnii-sukhii-korm-dlia-doroslikh-aktivnikh-sobak-usikh-porid" class="btn_oth_actv">ДЕТАЛЬНІШЕ</a>
					</div>
					<div class="sbscrb">						
						<form id="modal_subscribe" method="GET">
							<p class="title">Щоб отримати корисну інформацію про<br> собак-скаутів залиште свій e-mail:</p>
							<input type="hidden" name="id" id="result_id" value="">
							<input type="hidden" name="action" value="subscribe">
							<input type="email" name="email" id="email-submit" required="required" placeholder="Введіть email">
							<button value="submit" class="sbscrb-submit">
								<svg  viewBox="0 0 24 24" class="icon">
									<use xlink:href="#arrow-right-white "></use>
								</svg>
							</button>
						</form>
						<div class="ms_result">
							<p id="modal_subscribe_result"></p>
						</div>
					</div>
				</div>
				<div class="m_ro_con">
					<h3>Переходьте за посиланням, щоб ознайомитись<br> з усіма  раціонами для собак</h3>
					<a href="https://club4paws.com/category/dogs" class="see_btn">ПЕРЕГЛЯНУТИ РАЦІОНИ</a>
				</div>
				<div class="right-col" id="result_img">
					<img src="img/pack.png">
				</div>				
			</div>
			<div class="tab senx">
				<h3 class="title">Тепер ми на зв'язку!</h3>
				<div class="modal-description">
					<p>Невдовзі Ви отримаєте першого листа з порадами щодо Скаут раціону для Вашого улюбленця.</p>
				</div>
			</div>

				
		</div>
		
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.16/d3.min.js"></script>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
<script src="js/modal.js"></script>


<svg xmlns="https://www.w3.org/2000/svg" style="display: none;">
    <defs>
        <g id="cross-white">
        	<path fill-rule="evenodd" clip-rule="evenodd" d="M18.0002 20.769L33.2308 35.9997L36 33.2305L20.7694 17.9998L35.9997 2.76949L33.2305 0.000283856L18.0002 15.2306L2.76953 0L0.000323387 2.76921L15.2309 17.9998L0 33.2308L2.76921 36L18.0002 20.769Z" fill="#EFF3EF"/>
    	</g>

    	<g id="cross-black">
        	<path fill-rule="evenodd" clip-rule="evenodd" d="M16.0001 17.3845L23.6154 24.9999L25 23.6153L17.3847 15.9999L24.9998 8.38474L23.6152 7.00014L16.0001 14.6153L8.38477 7L7.00016 8.3846L14.6155 15.9999L7 23.6154L8.3846 25L16.0001 17.3845Z" fill="#505050"/>
    	</g>

    	<g id="arrow-left">
    		<path d="M1.12116 10.9393C0.535372 11.5251 0.535372 12.4749 1.12116 13.0607L10.6671 22.6066C11.2529 23.1924 12.2026 23.1924 12.7884 22.6066C13.3742 22.0208 13.3742 21.0711 12.7884 20.4853L4.30314 12L12.7884 3.51472C13.3742 2.92893 13.3742 1.97919 12.7884 1.3934C12.2026 0.807612 11.2529 0.807613 10.6671 1.3934L1.12116 10.9393ZM24 10.5L2.18182 10.5L2.18182 13.5L24 13.5L24 10.5Z" fill="black"/>
    	</g>

    	<g id="arrow-right-white">
    		<path d="M23.0605 13.0607C23.6463 12.4749 23.6463 11.5251 23.0605 10.9393L13.5145 1.3934C12.9288 0.807614 11.979 0.807614 11.3932 1.3934C10.8074 1.97919 10.8074 2.92893 11.3932 3.51472L19.8785 12L11.3932 20.4853C10.8074 21.0711 10.8074 22.0208 11.3932 22.6066C11.979 23.1924 12.9288 23.1924 13.5145 22.6066L23.0605 13.0607ZM0.18164 13.5L21.9998 13.5L21.9998 10.5L0.181641 10.5L0.18164 13.5Z" fill="white"/>
    	</g>
    </defs>
</svg>