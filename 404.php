<?php get_header();

$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");

$isMobile = false;


if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
	$isMobile = true;
}
  

function formatBulaName($string){
	$string = str_replace("INFORMAÇÕES", "", $string);
	$string = str_replace("APRESENTAÇÃO", "", $string);
	$string = str_replace("INDICAÇÕES", "",$string);
	$string = str_replace("GRAVIDEZ", "",$string);
	$string = str_replace("ADVERTÊNCIAS", "",$string);
	$string = str_replace("INTERAÇÕES MEDICAMENTOSAS", "",$string);
	$string = str_replace("REAÇÕES ADVERSAS", "",$string);
	$string = str_replace("POSOLOGIA DE", "",$string);
	$string = str_replace("SUPERDOSAGEM", "",$string);
	$string = str_replace("CARACTERÍSTICAS FARMACOLÓGICAS", "",$string);
	$string = str_replace("RESULTADOS DE EFICÁCIA", "",$string);
	$string = str_replace("MODO DE USAR", "",$string);
	$string = str_replace("GRUPOS DE RISCO", "",$string);
	$string = str_replace("ARMAZENAGEM", "",$string);
	$string = str_replace("DIZERES LEGAIS", "",$string);
	$string = str_replace("BULA PARA PACIENTE", "",$string);
	$string = str_replace("CONTRA-INDICAÇÕES", "",$string);

	return $string;
}

function char_formatter($string) {
	$map = array(
		'Á' => 'á',
		'À' => 'à',
		'Ã' => 'ã',
		'Â' => 'â',
		'É' => 'é',
		'Ê' => 'ê',
		'Í' => 'í',
		'Ó' => 'ó',
		'Ô' => 'ô',
		'Õ' => 'õ',
		'Ú' => 'ú',
		'Ü' => 'ü',
		'Ç' => 'ç');
	return ucfirst(strtolower(strtr($string, $map)));
}

?>

<div id="content">
	<style>
	#main ul{
		background-color: rgba(0,0,0,0.07);
		padding: 5px 15px;
		list-style-type: none;
		border-radius: 15px;
		width: fit-content;
		display: inline-block;
		margin: 5px;
	}

	#main ul li a{
		color: #C4170C;
		font-weight: 400;
	}
</style>
<div id="inner-content" class="wrap cf">
	<script type="text/javascript" class="teads" async="true" src="//a.teads.tv/page/85379/tag">
	</script>
	<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
		<?php
		$codeUl = "";
		if(!$isMobile){?>
			<div style="width: fit-content; margin: 0 auto;">
				<div class="adsense-tag-sb" style='height:fit-content; width:728px;'>

				</div>
			</div>
			<br>
			<hr style="opacity: 0.3;">
		<?php }else{ ?>
			<div class="ad-mobile" style="width: fit-content; margin: 0 auto;">
				<div class="adsense-tag-lmb" style='height:100px; width:320px;'>

				</div>
			</div>
			<br>
			<hr style="opacity: 0.3;">
		<?php }
		/* FAZENDO A QUERY PARA BUSCAR TODOS OS POSTS NA SINGLE */
			// Buscando o caminho que contém a categoria
		$url = $_SERVER['REQUEST_URI'];
			// Formatando a string para obter apenas a categoria
		$format = substr($url,6,4);
			// Retirando a barra caso ela exists
		$format = str_replace('/','', $format); 
			// Fazendo a query que irá buscar pela categoria passada pela url
		$args = ['post_type'=>'post',
		'numberposts' => 99,
		'posts_per_page'=>-1,
		'category_name'=> $format,
		'ORDER'=>'ASC'];
		$query = new WP_Query($args);
		if($query->have_posts()):
			while($query->have_posts()):
				$query->the_post();
				$formatedTitle = str_replace(formatBulaName(get_the_title()),"",get_the_title());

				if($formatedTitle != ""):
					if($formatedTitle == "POSOLOGIA DE") $formatedTitle = "POSOLOGIA";

					$codeUl .= '<ul>
					<li>
					<a href="'.get_permalink().'">'.char_formatter($formatedTitle).'</a>
					</li>
					</ul>';

				endif; endwhile; endif; ?>

				<?php 
				// Fazendo a gambiQuery
				$gambiArgs = [ 
					'post_type'=>'bula',
					'post_per_page'=>1,
					'tax_query'=>[
						['taxonomy'=>'id_da_bula',
						'field'=>'slug',
						'terms'=>$format
					]
				]
			];
			$gambiQuery = new WP_Query($gambiArgs);
			?>
			<?php if ($gambiQuery->have_posts()) : while ($gambiQuery->have_posts()) : $gambiQuery->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

					<header class="article-header entry-header">

						<h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php echo char_formatter(get_the_title()); ?></h1>

						<p class="description">
							<span><?php echo formatBulaName(get_the_title()); ?></span> com posologia, indicações, efeitos colaterais, interações e outras informações. Todas as informações contidas na bula de <span><?php echo formatBulaName(get_the_title()); ?></span> têm a intenção de informar e educar, não pretendendo, de forma alguma, substituir as orientações de um profissional médico ou servir como recomendação para qualquer tipo de tratamento. Decisões relacionadas a tratamento de pacientes com <span><?php echo formatBulaName(get_the_title()); ?></span> devem ser tomadas por profissionais autorizados, considerando as características de cada paciente.
						</p>

						<?php echo $codeUl; ?>
					</header> <!-- end article header -->

					<?php if(!$isMobile){?>
						<hr style="opacity: 0.3;">
						<br>
						<div style="width: fit-content; margin: 0 auto;">
							<div class="adsense-tag-sb" style='height:90px; width:728px;'>
							</div>
						</div>
					<?php }else{ ?>
						<hr style="opacity: 0.3;">
						<br>
						<div class="ad-mobile" style="width: fit-content; margin: 0 auto;">
							<div class="adsense-tag-lmb" style='height:100px; width:320px;'>

							</div>
						</div>

						<br>
						<hr style="opacity: 0.3;">
					<?php } ?>
					<section class="entry-content cf" itemprop="articleBody">
						<?php the_content(); ?>
						</section> <?php // end article section ?>

						<footer class="article-footer">

							</footer> <?php // end article footer ?>

							<?php //comments_template(); ?>

							</article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
									<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
								</footer>
							</article>

						<?php endif; ?>
						<div class="entry-content">
							<div id="taboola-below-article-thumbnails"></div>
							<script type="text/javascript">
								window._taboola = window._taboola || [];
								_taboola.push({
									mode: 'thumbnails-a',
									container: 'taboola-below-article-thumbnails',
									placement: 'Below Article Thumbnails',
									target_type: 'mix'
								});

													//var x = document.getElementById("teste").textContent.split(" ");


												</script>
											</div>
										</main>
									</div>
								</div>
								<script>


									let divContent = document.getElementsByClassName("entry-content")[0];
									let pElement = divContent.getElementsByTagName("p");
									let brElement = pElement[0].getElementsByTagName("br");
									//let br = pElement.getElementsByTagName("br");
									let adCode = document.createElement("div");
									adCode.classList.add("adsense-tag-sb");
									adCode.style.width = "728px";
									adCode.style.height = "fit-content";

									if(pElement.length > 1){
										if(screen.width > 768){
											let count = 1;
											let tempSBtags = document.getElementsByClassName('adsense-tag-sb');
											tempSBtags = tempSBtags[tempSBtags.length - 1];
											for(let i = 0; i < pElement.length; i++){
												if(pElement[i].offsetTop - tempSBtags.offsetTop > 550){
													var number;
													number=Math.floor((Math.random()*100000)+1);
													sbCodes.push('div-gpt-ad-15384qwed57304-'+number);
													console.log(sbCodes[sbCodes.length - 1]);

													googletag.cmd.push(function() {
														googletag.defineSlot('/21620903742/sb_1-MedicinaNet', [728, 90], sbCodes[sbCodes.length - 1]).addService(googletag.pubads());
														googletag.pubads().enableSingleRequest();
														googletag.enableServices();
													});
													count++;
													console.log("Insere anúncio!");
													//divContent.insertBefore(adCode, pElement[i].nextElementSibling);
													pElement[i].innerHTML += '<hr style="opacity: 0.3;"><br><div style="width: fit-content; margin: 0 auto;">										<div class="adsense-tag-sb" style="height:90px;width:728px;"></div></div><br><hr style="opacity: 0.3;">';
													tempSBtags = document.getElementsByClassName('adsense-tag-sb')[count];
												}
											}
										}else{
											let count = 1;
											let tempLMBtags = document.getElementsByClassName('adsense-tag-lmb');
											tempLMBtags = tempLMBtags[tempLMBtags.length - 1];
											for(let i = 0; i < pElement.length; i++){
												if(pElement[i].offsetTop - tempLMBtags.offsetTop > 550){
													var number;
													number=Math.floor((Math.random()*100000)+1);
													sbCodes.push('div-gpt-ad-15384qwed57304-'+number);
													console.log(sbCodes[sbCodes.length - 1]);

													googletag.cmd.push(function() {
														googletag.defineSlot('/21620903742/320x100-MedicinaNet', [320, 100], sbCodes[sbCodes - 1]).addService(googletag.pubads());
														googletag.pubads().enableSingleRequest();
														googletag.enableServices();
													});
													count++;
													console.log("Insere anúncio!");
													//divContent.insertBefore(adCode, pElement[i].nextElementSibling);
													pElement[i].innerHTML += '<hr style="opacity: 0.3;"><br><div class="ad-mobile" style="width: fit-content; margin: 0 auto;">										<div class="adsense-tag-lmb" style="height:fit-content;width:320px;"></div></div><br><hr style="opacity: 0.3;">';
													tempLMBtags = document.getElementsByClassName('adsense-tag-lmb')[count];
												}
											}
										}
									}else{
										console.log("Só tem 1");
										if(screen.width > 768){
											let count = 1;
											let tempSBtags = document.getElementsByClassName('adsense-tag-sb');
											let spanElement = document.createElement("span");

											spanElement.classList.add('breaker');
											spanElement.innerHTML = '<br/>';
											Array.from(document.querySelectorAll('br')).map(br => br.replaceWith(spanElement.cloneNode(true)));

											let allSpanEl = document.querySelectorAll('span.breaker');

											tempSBtags = tempSBtags[tempSBtags.length - 1];
											for(let i = 0; i < allSpanEl.length; i++){
												if(allSpanEl[i].offsetTop - tempSBtags.offsetTop > 550){
													var number;
													number=Math.floor((Math.random()*100000)+1);
													sbCodes.push('div-gpt-ad-15384qwed57304-'+number);
													console.log(sbCodes[sbCodes.length - 1]);

													googletag.cmd.push(function() {
														googletag.defineSlot('/21620903742/sb_1-MedicinaNet', [728, 90], sbCodes[sbCodes.length - 1]).addService(googletag.pubads());
														googletag.pubads().enableSingleRequest();
														googletag.enableServices();
													});
													count++;
													console.log("Insere anúncio!");
													//divContent.insertBefore(adCode, pElement[i].nextElementSibling);
													allSpanEl[i].insertAdjacentHTML("afterend", '<hr style="opacity: 0.3;"><br><div style="width: fit-content; margin: 0 auto;">										<div class="adsense-tag-sb" style="height:90px;width:728px;"></div></div><br><hr style="opacity: 0.3;">');
													tempSBtags = document.getElementsByClassName('adsense-tag-sb')[count];
												}
											}
										}else{
											let count = 1;
											let tempLMBtags = document.getElementsByClassName('adsense-tag-lmb');
											tempLMBtags = tempLMBtags[tempLMBtags.length - 1];
											for(let i = 0; i < pElement.length; i++){
												if(pElement[i].offsetTop - tempLMBtags.offsetTop > 550){
													var number;
													number=Math.floor((Math.random()*100000)+1);
													sbCodes.push('div-gpt-ad-15384qwed57304-'+number);
													console.log(sbCodes[sbCodes.length - 1]);

													googletag.cmd.push(function() {
														googletag.defineSlot('/21620903742/320x100-MedicinaNet', [320, 100], sbCodes[sbCodes - 1]).addService(googletag.pubads());
														googletag.pubads().enableSingleRequest();
														googletag.enableServices();
													});
													count++;
													console.log("Insere anúncio!");
													//divContent.insertBefore(adCode, pElement[i].nextElementSibling);
													pElement[i].innerHTML += '<hr style="opacity: 0.3;"><br><div class="ad-mobile" style="width: fit-content; margin: 0 auto;">										<div class="adsense-tag-lmb" style="height:fit-content;width:320px;"></div></div><br><hr style="opacity: 0.3;">';
													tempLMBtags = document.getElementsByClassName('adsense-tag-lmb')[count];
												}
											}
										}
									}

									document.addEventListener("DOMContentLoaded", function(event) {
										if(screen.width < 768){
											let adsenseTagsLMB = document.getElementsByClassName('adsense-tag-lmb');
											for(let i = 0; i < adsenseTagsLMB.length; i++){
												adsenseTagsLMB[i].id = sbCodes[i];
												console.log(i + " " + adsenseTagsLMB[i].id + " " + sbCodes[i]);

												googletag.cmd.push(function() { googletag.display(sbCodes[i]); });
											}
										}else{
											let adsenseTagsSB = document.getElementsByClassName('adsense-tag-sb');
											let adsenseTagsBB = document.getElementsByClassName('adsense-tag-bb');
											for(let i = 0; i < adsenseTagsSB.length; i++){
												adsenseTagsSB[i].id = sbCodes[i];
												googletag.cmd.push(function() { googletag.display(sbCodes[i]); });
											}
											for(let i = 0; i < adsenseTagsBB.length; i++){
												adsenseTagsBB[i].id = bbCodes[i];
												googletag.cmd.push(function() { googletag.display(bbCodes[i]); });
											}
										}
									});

									document.addEventListener("DOMContentLoaded", function(event) {

									});
								</script>

								<script type="text/javascript">


					//pElement.insertBefore(adCode, br[1].nextElementSibling);

				</script>

				<?php get_footer(); ?>
