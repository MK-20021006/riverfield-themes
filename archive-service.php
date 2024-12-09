<head>
	<style>
	.page-header {
    height: 350px;
	background:url(/new/wp-content/uploads/service-archive-top.png);
    background-size: cover;
	margin-bottom: 20vh !important;
}
.breadcrumb{
   display: none;
}
h1.page-header-title {
    font-family: "Oswald";
    font-weight: 500 !important;
    font-size: 2.5em;
    width: fit-content;
    position: relative;
    left: 15%;
    top: 20vh;
    background-color: #18467c;
    padding: 8vh 5vw;
    letter-spacing: 0.3em;
}
h1.page-header-title:after {
	content: "事業紹介";
    position: absolute;
    display: block;
    top: 30px;
    font-size: 14px;
}

/* archive-service */
.service-inner {
    background: #18467C;
    position: relative;
    height: 650px;
    margin: 20vh 0;
}
.service-textbox {
    width: 70%;
    max-width: 750px;
    background: #fff;
    padding: 7vh;
    margin: 7vh;
    position: relative;
    top: 10vh;
    z-index: 1;
}
.service-textbox {
    width: 48%;
    height: 75%;
    background: #fff;
    padding: 7vh;
    margin: 7vh;
    z-index: 1;
    position: relative;
    left: 5%;
    top: 25%;
}
.service-inner:after {
    content: "";
    position: absolute;
	background-size: cover;
    width: 50%;
    height: 85%;
    right: 0;
    bottom: 0;
}
/* プラント・特殊解体工事 */
.service1:after{
	background-image: url("/new/wp-content/uploads/plants.png");
}
/* 建屋・木造解体工事 */
.service2:after{
	background-image: url("/new/wp-content/uploads/steel-frame.png");			
}
/* とび・大規模修繕工事 */
.service3:after{
	background-image: url("/new/wp-content/uploads/paint.png");			
}

.service-inner:before {
    content: "";
	width: 100%;
	text-align: end;
    color: rgba(168, 168, 168, 0.15);
    position: absolute;
    font-size: 5em;
    bottom: -45px;
    z-index: 2;
    font-weight: bold;
}
.service1:before{
	content: "CONSTRUCTION RESULT";
}
.service2:before{
    content: "BUILDING DEMOLITION";
}
.service3:before{
	content: "LARGE SCALE REPAIR";
}

.service-textbox h2 {
    font-weight: 500;
    position: relative;
}
.service-textbox h2:after {
    content: "";
    width: 50%;
    border-bottom: 3px solid #18467C;
    position: absolute;
    left: 0;
    bottom: 0;
}
.service-textbox p{
	line-height: 2.3;
	width: 80%;
	font-weight: 500;
}

.service-inner:nth-child(2n) {
    background: #F9F9F9;
}
.service-inner:nth-child(2n) > .service-textbox {
    background: #18467C;
    color: #fff;
}
.service-inner:nth-child(2n) > .service-textbox h2:after {
    border-bottom: 3px solid #fff;
}

@media screen and (max-width: 750px){
	.service-textbox {
		width: 60%;
		height: 70%;
		margin: 0;
		top: 30%;
	}
	.service-inner:after{
		width: 100%;
		bottom: 15%;
		background-position-x: 30%;
	}
		.service-inner:before{
		bottom: 70%;
		color: rgb(255 255 255 / 35%);
	}
}
@media screen and (max-width: 600px){
	.service-textbox p{
		width: 100%;
	}
	.service-textbox {
		width: 75%;
		height: 55%;
		top: 45%;
		padding: 4vh;
	}
}
@media screen and (max-width: 600px){
	.service-textbox {
		height: 70%;
		top: 30%;
	}

}

</style>
</head>


<?php
use VektorInc\VK_Breadcrumb\VkBreadcrumb;
?>

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
		<h1 class="page-header-title">SERVICE</h1>
	</div>
</div>

<div class="service-list">
	<div class="service-inner service1">
		<div class="service-textbox">
			<h2>工事実績</h2>
			<p>河野組の主な工事実績を年代別でご確認いただけます。</p>
			<div class="btn-area works">
				<a href="<?php echo home_url( ); ?>/works/" target="_blank" class="btn bgleft">
				<span>MORE　　</span>
				</a>
			</div>
		</div>
	</div>
	<div class="service-inner service2">
		<div class="service-textbox">
			<h2>プラント解体・建屋解体工事業</h2>
			<p>近隣住民様への配慮・安全な工事・コンプライアンスを遵守しています。全てはお客様にご安心頂くため、どんな建物でも全力で施工させて頂きます。</p>
			<div class="btn-area works">
				<a href="<?php echo home_url( ); ?>/service/特殊解体・建屋解体工事業/" target="_blank" class="btn bgleft">
				<span>MORE　　</span>
				</a>
			</div>
		</div>
	</div>
	<div class="service-inner service3">
		<div class="service-textbox">
			<h2>大規模修繕工事事業</h2>
			<p>見積り～塗装色決め～工事～アフターフォローまでお客様満足第一をモットーに親切・丁寧に対応させて頂きます。様々なご要望に、信頼できる仲間と共に技術でお応え致します。</p>
			<div class="btn-area works">
				<a href="<?php echo home_url( ); ?>/とび工事業大規模修繕工事事業/" target="_blank" class="btn bgleft">
				<span>MORE　　</span>
				</a>
			</div>
		</div>
	</div>
	

</div>








	
<div class="service-cta">
	<h3><a href="/%e6%96%bd%e5%b7%a5%e4%be%9d%e9%a0%bc/">施工依頼はこちらから</a></h3>
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
