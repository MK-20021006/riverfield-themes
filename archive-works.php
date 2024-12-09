<head>
	<style>
	.page-header {
    height: 750px;
	background:url(/new/wp-content/uploads/archive-works-head2.jpg);
	background-position: center;
    background-size: cover;
	margin-bottom: 20vh !important;
	position: relative;
}
.breadcrumb{
   display: none;
}
h1.page-header-title {
    font-family: "Oswald";
    font-weight: 500;
    font-size: 2.5em;
    width: fit-content;
    position: absolute;
    left: 15%;
    top: 25vh;
    background-color: #18467c;
    padding: 8vh 5vw;
    letter-spacing: 0.3em;
}
h1.page-header-title:after {
    content: "工事実績";
    position: absolute;
    display: block;
    top: 30px;
    font-size: 14px;
}

/* レイアウト */
.works-case_box {
    background: #fff;
    padding: 5%;
	margin-bottom: 15vh;
}
.works-title {
    margin: 7vh auto;
    width: fit-content;
	position: relative;
}
.works-title:after {
    content: "";
    position: absolute;
    border-bottom: 3px solid #18467C;
    width: 80%;
    bottom: 0;
    left: 10%;
}
.works-title h2 {
    font-weight: 500;
    font-family: 'Noto Sans JP';
}

/* 絞り込みタブ */
.tab{
    list-style:none;
    padding:0;
    margin:0 auto 20px auto;
    width:100%;
    display:flex;
	font-family:'Noto Sans JP';
}
.tab li{
    width:50%;
    background: #fff;
    margin-right:5px;
    border:1px solid #dfdfdf;
    text-align: center;
    padding:15px 0;
	color: #2D2D2D;
}
.tab li.active {
    background: #18467C;
    color: #fff;
}
/* ページャー */
.tab_sub{
    margin:20px auto;
    padding:0;
    display:flex;
	flex-wrap: wrap;
    list-style:none;
	font-family: 'Noto Sans JP';
}
.tab_sub li{
    padding: 7px 1.5em;
    margin: 0 auto 20px;
}
.tab_sub li.active{
    background:#18467C;
	color: #fff;
    position: relative;
}
.tab_sub li.active:after {
    content: "";
    width: 16px;
    height: 16px;
    position: absolute;
    border-bottom: 4px solid #18467C;
    border-right: 4px solid #18467C;
    transform: rotate(45deg);
    bottom: -8px;
    background: #18467C;
    left: 40%;
}
 
.list .inner,
.list .inner table{
    display:none;
}
.list .inner.active{
    display:block;
}
.list .inner table.active{
    display:table;
}

table#demolition,table#remake {
    border: transparent;
    text-align: left;
}
.table-head {
    background: #4B6582;
    color: #fff;
}
.table-head th, .table-head td {
    font-family: 'Noto Sans JP';
    font-weight: 400;
}
tr.table-content {
    background: #fff;
}
tr.table-content:nth-child(2n) {
    background: #F5F5F5;
}
.table-content th, .table-content td {
    font-family: 'Noto Sans JP';
    font-weight: 400;
}
		
/* CTAボタン */
.service-cta h3{
	margin: 15vh 0 7vh auto !important;
}

/* 下部 画像コンテンツ */

.works-case-slide .slick-slide{
	height: auto;
}
.works-case-slide li img{
	max-height: 750px;
}
	
	@media screen and (max-width: 990px){
		h1.page-header-title{
			top: 10vh !important;
		}
	@media screen and (max-width: 781px){
		.sp-column{
			margin-top: 15vh !important;
		}
		.colum-head{
			margin-top: 0 !important;
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
		<h1 class="page-header-title">WORKS</h1>
	</div>
</div>
<div class="flex-box service-content_list">
	<div class="service-card"><p>工事実績</p></div>
	<?php
	$args = array(
		'post_type' => 'service',
	);
	$query = new WP_Query($args);
	while ($query->have_posts()) : $query->the_post();
	?>
	<div class="service-card">
		<a href="<?php the_permalink(); ?>">
			<p><?php the_title(); ?></p>
		</a>
	</div>
<?php endwhile; ?>
</div>

<div style="background: #F9F9F9; padding: 7vh 0;">
<div class="page-main" style="width: 80%; margin: auto;">

<div class="works-case_box">
	<div class="works-title"><h2>工事実績</h2></div>

<ul class="tab">
    <li class="active">解体工事</li>
    <li>改修・新築工事</li>
</ul>

<div class="list">
	<!-- 解体工事ここから -->
    <div class="inner active">
		<ul class="tab_sub">
			<?php
			$current_year = date("Y"); // 現在の年を取得
			for ($year = $current_year; $year >= 2019; $year--) {
				echo '<li' . ($year == $current_year ? ' class="active"' : '') . '>' . $year . '</li>';
			}
			?>
		</ul>
		<?php
		$is_first_table = true;
		for ($year = $current_year; $year >= 2010; $year--) {
			$category_slug = $year . '-demolition';
			$args = array(
				'posts_per_page' => -1,
				'post_type' => 'works',
				'orderby' => 'title',
				'order' => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $category_slug,
					),
				),
			);
			$query = new WP_Query( $args );
			?>
			<table id="remake"<?php if ($is_first_table) { echo ' class="active"'; $is_first_table = false; } ?>>
				<tr class="table-head"><th>工事名称</th><td>元請・下請</td><td>工事場所</td></tr>
				<?php
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						$works_type = get_post_meta( get_the_ID(), 'type', true );
						$works_address = get_post_meta( get_the_ID(), 'address', true );
						$categories = get_the_terms( get_the_ID(), 'category' );
						$data_category = '';
						if ( $categories ) {
							foreach ( $categories as $category ) {
								if ($category->parent != 0) {
									$data_category .= $category->name;
								}
							}
						}
						?>
						<tr class="table-content">
							<th><?php the_title(); ?></th><td><?php echo $works_type; ?></td><td><?php echo $works_address; ?></td>
						</tr>
					<?php endwhile; ?>
				<?php else : ?>
					<tr class="table-content"><td colspan="3">データがありません</td></tr>
				<?php endif; ?>
			</table>
			<?php
			wp_reset_postdata();
		}
		?>
    </div>

	<!-- 改修・新築工事ここから -->
	<div class="inner">
		<ul class="tab_sub">
			<?php
			$current_year = date("Y"); // 現在の年を取得
			for ($year = $current_year; $year >= 2019; $year--) {
				echo '<li' . ($year == $current_year ? ' class="active"' : '') . '>' . $year . '</li>';
			}
			?>
		</ul>
		<?php
		$is_first_table = true;
		for ($year = $current_year; $year >= 2010; $year--) {
			$category_slug = $year . '-remake';
			$args = array(
				'posts_per_page' => -1,
				'post_type' => 'works',
				'orderby' => 'title',
				'order' => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $category_slug,
					),
				),
			);
			$query = new WP_Query( $args );
			?>
			<table id="remake"<?php if ($is_first_table) { echo ' class="active"'; $is_first_table = false; } ?>>
				<tr class="table-head"><th>工事名称</th><td>元請・下請</td><td>工事場所</td></tr>
				<?php
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						$works_type = get_post_meta( get_the_ID(), 'type', true );
						$works_address = get_post_meta( get_the_ID(), 'address', true );
						$categories = get_the_terms( get_the_ID(), 'category' );
						$data_category = '';
						if ( $categories ) {
							foreach ( $categories as $category ) {
								if ($category->parent != 0) {
									$data_category .= $category->name;
								}
							}
						}
						?>
						<tr class="table-content">
							<th><?php the_title(); ?></th><td><?php echo $works_type; ?></td><td><?php echo $works_address; ?></td>
						</tr>
					<?php endwhile; ?>
				<?php else : ?>
					<tr class="table-content"><td colspan="3">データがありません</td></tr>
				<?php endif; ?>
			</table>
			<?php
			wp_reset_postdata();
		}
		?>
	</div>


</div>
</div><!-- works-case_block -->

<!--
<div class="other-case">
	<h2>施工事例</h2>
	<div class="wp-block-columns is-layout-flex wp-container-29">
	<div class="wp-block-column is-layout-flow sp-column">
		<div class="wp-block-group is-layout-constrained works-case-slide" style="padding-right:0;padding-left:var(--wp--preset--spacing--30)">
			<li><figure class="wp-block-image size-full has-custom-border"><img decoding="async" loading="lazy" src="/new/wp-content/uploads/rc-demolition.jpg" alt="" class="wp-image-2803" style="height:100%; width:85%; margin:auto; object-fit: cover; border-radius:20px;"></figure></li>
		</div>
		<div class="wp-block-group is-layout-constrained" style="padding-left:var(--wp--preset--spacing--40)">
		<h2 class="wp-block-heading">RC造解体工事</h2>
		</div>
	</div>
	<div class="wp-block-column is-layout-flow">
		<div class="wp-block-group is-layout-constrained works-case-slide" style="padding-right:var(--wp--preset--spacing--30);">
			<li><figure class="wp-block-image size-large has-custom-border is-style-rounded">
				<img decoding="async" loading="lazy" src="/new/wp-content/uploads/works_thumbnail1.jpg" alt="" style="height:100%; width:85%; margin:auto; object-fit: cover; border-style:none;border-width:0px;border-radius:20px"></figure>
			</li>
		</div>
		<div class="wp-block-group is-layout-constrained" style="padding-left:var(--wp--preset--spacing--40)">
		<h2 class="wp-block-heading">建屋・木造解体工事</h2>
		</div>
	</div>
	</div>




</div>
-->
<!-- other-case -->

	
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
