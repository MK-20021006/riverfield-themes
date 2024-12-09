<header id="site-header" class="<?php lightning_the_class_name( 'site-header' ); ?>">
	<?php do_action( 'lightning_site_header_prepend' ); ?>
	<div id="site-header-container" class="<?php lightning_the_class_name( 'site-header-container' ); ?> container">

		<?php
		if ( is_front_page() ) {
			$title_tag = 'h1';
		} else {
			$title_tag = 'div';
		}
		?>
		<<?php echo $title_tag; ?> class="<?php lightning_the_class_name( 'site-header-logo' ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span><?php lightning_print_headlogo(); ?></span>
		</a>
		</<?php echo $title_tag; ?>>

		<?php do_action( 'lightning_site_header_logo_after' ); ?>

		<?php
		if ( class_exists( 'VK_Description_Walker' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'global-nav',
					'container'       => 'nav',
					'container_class' => lightning_get_the_class_name( 'global-nav' ),
					'container_id'    => 'global-nav',
					'items_wrap'      => '<ul id="%1$s" class="%2$s vk-menu-acc global-nav-list nav">%3$s</ul>',
					'fallback_cb'     => '',
					'echo'            => true,
					'walker'          => new VK_Description_Walker(),
				)
			);
		}
		?>
	</div>
	<?php do_action( 'lightning_site_header_append' ); ?>
		
<div class="sp-menu">
  <button class="hamburger-menu" id="js-hamburger-menu">
    <span class="hamburger-menu__bar"></span>
    <span class="hamburger-menu__bar"></span>
    <span class="hamburger-menu__bar"></span>
  </button>
  <nav class="navigation">
    <ul class="navigation__list">
	<li class="navigation__list-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navigation__link">HOME</a></li>
	<li class="navigation__list-item">
	<div class="navigation__list-item drow-parent">
	<p>会社概要</p>
	<ul class="drow-menu">
	<li><a class="navigation__link" href="<?php echo esc_url( home_url( '/' ) ); ?>/%e4%bc%9a%e7%a4%be%e6%a6%82%e8%a6%81/">株式会社河野組</a></li>
	<li><a class="navigation__link" href="https://grant-kg.co.jp/">株式会社Grant</a></li>
	</ul>
	</div>
	</li>
	<li class="navigation__list-item">
	<div class="navigation__list-item drow-parent">
	<p>事業紹介</p>
	<ul class="drow-menu">
	<li><a class="navigation__link" href="<?php echo esc_url( home_url( '/' ) ); ?>/works/">工事実績</a></li>
	<li><a class="navigation__link" href="<?php echo esc_url( home_url( '/' ) ); ?>/service/%e3%83%97%e3%83%a9%e3%83%b3%e3%83%88%e8%a7%a3%e4%bd%93%e5%bb%ba%e5%b1%8b%e8%a7%a3%e4%bd%93%e4%ba%8b%e6%a5%ad/">特殊解体・建屋解体事業</a></li>
	<li><a class="navigation__link" href="<?php echo esc_url( home_url( '/' ) ); ?>/service/%e5%a4%a7%e8%a6%8f%e6%a8%a1%e4%bf%ae%e7%b9%95%e5%b7%a5%e4%ba%8b%e4%ba%8b%e6%a5%ad/">大規模修繕工事事業</a></li>
	</ul>
	</div>
	</li>   
	<li class="navigation__list-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/施工依頼/" class="navigation__link">施工依頼</a></li>
	<li class="navigation__list-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/協力業者募集/" class="navigation__link">協力業者募集</a></li>
	<li class="navigation__list-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/採用情報/" class="navigation__link">採用情報</a></li>
	<li class="navigation__list-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/お問い合わせ/" class="navigation__link">お問い合わせ</a></li>
	<li class="navigation__list-item">
	<div style="padding:10px;text-align:center">
	<a href="#" data-gt-lang="en" class="notranslate glink nturl gt_raw_link-xxjexk" title="English"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/new/wp-content/plugins/gtranslate/flags/svg/en-us.svg" width="32" height="32" alt="en" loading="lazy"></a> &nbsp; &nbsp; 
	<a href="#" data-gt-lang="ja" class="gt-current-lang notranslate glink nturl gt_raw_link-xxjexk" title="Japanese"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/new/wp-content/plugins/gtranslate/flags/svg/ja.svg" width="32" height="32" alt="ja" loading="lazy"></a>
	</div>
	</li>
    </ul>
  </nav>
</div>


<div id="slideR2" style="margin-right: 0px;">
	<div>
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/#sdgs"><img class="sdgs-image" src="<?php echo esc_url( home_url( '/' ) ); ?>/new/wp-content/uploads/sdgs-icon2.png"><span style="position: relative; top: -12px; margin-right: 5px;">SDGsへの取り組み</span></a></li>
	</div>
</div>


<div id="slideR" style="margin-right: 0px;">
	<span class="nav-icon"><i class="fa fa-heart-o"></i></span>
	<div>
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/施工依頼/">施工依頼</a></li>
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/採用情報/">採用情報</a></li>
	</div>
</div>	

</header>
