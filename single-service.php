<head>
	<style>
	.page-header {
    height: 350px;
	background:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);
    background-size: cover;
	margin-bottom: 20vh !important;
}
.breadcrumb{
   display: none;
}
h1.page-header-title {
    font-family: "Oswald";
    font-weight: 500;
    font-size: 2.5em;
    width: fit-content;
    position: relative;
    left: 15%;
    top: 20vh;
    background-color: #18467c;
    padding: 8vh 5vw;
    letter-spacing: 0.3em;
}
h1.page-header-title:before {
    content: "<?php the_title(); ?>";
    display: block;
	font-size: 11px;
}

@media screen and (max-width: 990px){
	h1.page-header-title {
		top: 17vh;
		left: auto !important;
		margin: auto !important;
		padding: 5vh 5vw;
	}
	.service-content_list {
		width: 95% !important;
		margin: auto;
		max-width: 850px;
	}
}

</style>

</head>


<?php lightning_get_template_part( 'header' ); ?>

<?php
do_action( 'lightning_site_header_before', 'lightning_site_header_before' );
if ( apply_filters( 'lightning_is_site_header', true, 'site_header' ) ) {
	lightning_get_template_part( 'template-parts/site-header' );
}
do_action( 'lightning_site_header_after', 'lightning_site_header_after' );
?>

<div class="page-header">
	<div class="page-header-inner container">
		<h1 class="page-header-title"><?php echo get_post_meta( get_the_ID(), 'subtitle', true ); ?></h1>
	</div>
</div>

<div class="page-head_desc">
	<p><?php echo get_post_meta( get_the_ID(), '事業説明', true ); ?></p>
</div>
<div class="service-content_list">
	<div class="service-card">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>/works/">
			<p>工事実績</p>
		</a>
	</div>
	<div class="service-card">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>/プラント解体建屋解体工事業/">
			<p>プラント解体・建屋解体工事業</p>
		</a>
	</div>
	<div class="service-card">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>/とび工事業大規模修繕工事事業/">
			<p>大規模修繕工事事業</p>
		</a>
	</div>
</div>

<div class="page-main" style="width: 90%; margin: auto; max-width: 1200px;">
<?php the_content(); ?>
<div class="service-cta">
	<h3><a href="/%e6%96%bd%e5%b7%a5%e4%be%9d%e9%a0%bc/">施工依頼はこちらから</a></h3>
</div>
</div>







<?php if ( is_active_sidebar( 'footer-before-widget' ) ) : ?>
	<div class="site-body-bottom">
		<div class="container">
			<?php dynamic_sidebar( 'footer-before-widget' ); ?>
		</div>
	</div>
<?php endif; ?>

<?php
do_action( 'lightning_site_footer_before', 'lightning_site_footer_before' );
if ( apply_filters( 'lightning_is_site_footer', true, 'site_footer' ) ) {
	lightning_get_template_part( 'template-parts/site-footer' );
}
do_action( 'lightning_site_footer_after', 'lightning_site_footer_after' );
?>
<?php lightning_get_template_part( 'footer' ); ?>
