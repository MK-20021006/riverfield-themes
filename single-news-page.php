<head>
	<style>
	.page-header {
    height: 350px;
	background: #ddd;
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
.news-nav {
    display: flex;
    justify-content: center;
    margin: 10vh 0;
}
.news-nav_block {
    margin: 0 15px;
    background: #f9f9f9;
    flex: 1;
    padding: 20px;
    display: flex;
    justify-content: left;
    align-items: center;
	position: relative;
}
.news-nav_block.nav-previous {
    justify-content: flex-end;
}
.news-nav_block a {
    width: 80%;
    text-align: left;
}

.nav-previous.news-nav_block:after{
    position: absolute;
    left: 7%;
    content: "";
    width: 15px;
    height: 15px;
    border-top: 2px solid #7a7a7a;
    border-right: 2px solid #7a7a7a;
    transform: rotate(225deg);
}
.nav-next.news-nav_block:after{
    position: absolute;
    right: 7%;
    content: "";
    width: 15px;
    height: 15px;
    border-top: 2px solid #7a7a7a;
    border-right: 2px solid #7a7a7a;
    transform: rotate(45deg);
}
.news-pc{
	display: block;
}
.news-sp{
	display:none;	
}
@media screen and (max-width: 650px){
	.news-pc{
		display: none;
	}
	.news-sp{
		display:block;	
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
		<h1 class="page-header-title">NEWS</h1>
	</div>
</div>



<div class="page-main" style="width: 70%; margin:7vh auto 20vh;">
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	
	<div class="news-pc">
	<div class="news-nav">
		<div class="news-nav_block nav-previous"><?php previous_post_link('%link'); ?></div>
		<div class="news-nav_block nav-next"><?php next_post_link('%link'); ?></div>
	</div>
	</div>

	<div class="news-sp">
	<div class="news-nav">
		<div class="news-nav_block nav-previous"><?php previous_post_link('%link', '前の投稿へ'); ?></div>
		<div class="news-nav_block nav-next"><?php next_post_link('%link', '次の投稿へ'); ?></div>
	</div>
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
