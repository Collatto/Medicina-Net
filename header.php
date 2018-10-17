<!doctype html>
<!-- For internet explorer -->
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<!-- End for internet explorer -->
<head>
	<title><?php wp_title(''); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<link rel="apple-touch-icon" href="http://sitephphmt.wpengine.com/wp-content/themes/bones//library/images/apple-touch-icon.png">
	<link rel="icon" href="http://www.medicinanet.com.br/img/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<!-- For internet explorer -->
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php //echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<!-- End for internet explorer -->
	<?php wp_head(); ?>
	<!-- Analytics -->
	<!-- Put the analytics here -->
	<!-- End of analytics -->
	<script type="text/javascript">
		window._taboola = window._taboola || [];
		_taboola.push({article:'auto'});
		!function (e, f, u, i) {
			if (!document.getElementById(i)){
				e.async = 1;
				e.src = u;
				e.id = i;
				f.parentNode.insertBefore(e, f);
			}
		}(document.createElement('script'),
			document.getElementsByTagName('script')[0],
			'//cdn.taboola.com/libtrc/alright-medicinanet/loader.js',
			'tb_loader_script');
		if(window.performance && typeof window.performance.mark == 'function')
			{window.performance.mark('tbl_ic');}
	</script>

	<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
	<script>
		var googletag = googletag || {};
		googletag.cmd = googletag.cmd || [];
	</script>

	<script>
		var sbCodes = ['div-gpt-ad-1538417365859-0','div-gpt-ad-1538417657304-0','div-gpt-ad-1538417657305-0','div-gpt-ad-1538417657306-0'];
		var bbCodes = ['div-gpt-ad-153asda17365859-0','div-gpt-ad-15384qwed57304-0','div-gpt-ad-1tqss417657305-0','div-gpt-ad-15rqgr317657306-0'];


		googletag.cmd.push(function() {

			if(screen.width < 768){
				for(let i = 0; i < sbCodes.length; i++){
					googletag.defineSlot('/21620903742/320x100-MedicinaNet', [320, 100], sbCodes[i]).addService(googletag.pubads());
				}
			}else{
				for(let i = 0; i < sbCodes.length; i++){
					googletag.defineSlot('/21620903742/sb_1-MedicinaNet', [728, 90], sbCodes[i]).addService(googletag.pubads());
				}
				for(let i = 0; i < bbCodes.length; i++){
					googletag.defineSlot('/21620903742/970x250-MedicinaNet', [[970, 90], [728, 90], [970, 250]], bbCodes[i]).addService(googletag.pubads());
				}

			}
			googletag.pubads().enableSingleRequest();
			googletag.enableServices();
		});

		function openBusca(){
			let caixaBusca = document.getElementById("caixa-busca");
			let logoImg = document.getElementById("logo");
			let searchIcon = document.getElementById("search-icon");
			let redBar = document.getElementById("inner-header");

			caixaBusca.style.display = "block";
			logoImg.style.display = "none";
			searchIcon.style.display = "none";
			redBar.style.height = "55px";


		}

		function closeBusca(){
			let caixaBusca = document.getElementById("caixa-busca");
			let logoImg = document.getElementById("logo");
			let searchIcon = document.getElementById("search-icon");

			caixaBusca.style.display = "none";
			logoImg.style.display = "block";
			searchIcon.style.display = "block";
			redBar.style.height = "unset";
		}



	</script>
</script>
</head>
<body <?php body_class(); ?>>

	<div id="caixa-busca" style="z-index: 999">
		<div class="close" onclick="closeBusca()">
			<span></span>
			<span></span>
		</div>
		<form method="POST" action="<?php echo home_url(); ?>" style="z-index: 9999">
			<input type="text" placeholder="BUSCAR BULAS OU CID 10" name="pesquisa">
			<input type="submit" style="display: none;">
		</form>
	</div>
	<div id="container">
		<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
			<div id="inner-header" class="wrap cf">
				<p id="logo" class="h1">
					<a href="<?php echo home_url(); ?>" rel="nofollow">
						<img src="<?php echo get_template_directory_uri(); ?>/library/images/logotipo.png"/>
					</a>
				</p>
				<div class="header-title-center">
					<p>Bulas de Medicamentos</p>
				</div>
				<div id="busca">
					<form method="POST" action="<?php echo home_url(); ?>">
						<input type="text"  placeholder="BUSCAR BULAS OU CID 10" name="pesquisa">
						<input type="submit" style="display: none;">
					</form>
					<img id="search-icon" src="http://sitephphmt.wpengine.com/wp-content/uploads/2018/09/magnifying-glass-1.png" alt="lupa icon" onclick="openBusca()">
				</div>

			</div>
		</header>
		<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<ul id="menu-menu-principal" class="nav top-nav cf">
				<li id="menu-item-203796" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-203794 current_page_item menu-item-203796">
					<a href="http://www.medicinanet.com.br" target="_blank">
						<img src="http://sitephphmt.wpengine.com/wp-content/uploads/2018/10/home.png" alt="home icon"> Portal
					</a>
				</li>
			</ul>
		</nav>
