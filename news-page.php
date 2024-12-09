<style>
a{
	text-decoration: none !important;
}
.news-page {
    padding: 7vh 0 0;
}
.news_link {
	width: 70%;
    margin: auto;
    list-style: none;
    display: flex;
    justify-content: space-around;
}
.news-content {
    display: flex;
}
.news-desc {
    display: flex;
}
.news-content p {
    margin: 10px;
}
.news-date, .tags {
    width: 100px;
	text-align: center;
}
.tags {
    border: 1px solid #164f91;
    color: #164f91;
    display: flex;
    justify-content: center;
    align-items: center;
}
.news-content_block {
    width: 85%;
    margin: auto;
    padding: 7vh;
    background: #fff;
	border: 2px solid #164f91;
}
.news-pagination ul {
    list-style: none;
    display: flex;
    width: 70%;
    margin: auto;
    justify-content: space-around;
}
.news_link {
    padding: 0;
    margin: auto;
    width: 85%;
    list-style: none;
    display: flex;
    justify-content: space-around;
	font-family: Noto Sans Jp;
}
.news_link li.active, .news_link li:hover {
    background: #164f91;
    color: #fff;
    font-weight: 500;
}
.news_link li {
    flex: 1;
    margin: 0;
    text-align: center;
    padding: 20px;
}
	
@media screen and (max-width: 600px){
	.news-desc{
		flex-direction: column;
	}
	.news-content{
		margin-bottom: 15px;
		border: 1px solid #e5e5e5;
	}
	.news-content_block{
		padding: 3vh;
	}

}

</style>

<script>
jQuery(function($){
$(function() {
	var newsLink = $(".news_link li");
	var limit = 20;
	$(".news-content").css('display','none');
	for(var i = 0 ; i < limit ; i++) {
		var limitNews = $(".news-content")[i];
		$(limitNews).fadeIn();
	}
	$(newsLink).click(function(){
		$(newsLink).removeClass("active");
		$(this).addClass("active");
		var btnFilter = $(this).attr('data-filter');
		if (btnFilter == 'catAll') {
			$(".news-content").css('display','none');
			for(i = 0 ; i < limit ; i++) {
				limitNews = $(".news-content")[i];
				$(limitNews).fadeIn();
			}
		} else {
			$(".news-content").css('display','none');
			for(i = 0 ; i < limit ; i++) {
				limitNews = $(".news-content").filter('[data-category = "' + btnFilter + '"]')[i];
				$(limitNews).fadeIn();
			}
		}
	});
});
});
</script>



<div class="news-page">

<?php
$posts_per_page = 20;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
    'post_type'      => 'news-page',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
);
$news_query = new WP_Query($args);
global $post; // $post変数を取得

?>
<ul class="news_link">
    <li class="active" data-filter="catAll">すべて</li>
    <?php
    $args = array(
        'taxonomy' => 'news_category',
        'hide_empty' => false,
        'orderby' => 'name',
		'orderby' => 'slug',
        'order' => 'ASC',
    );
    $categories = get_categories($args);
    foreach ($categories as $category) :
    ?>
    <li data-filter="cat-<?php echo $category->slug; ?>">
     <?php echo $category->name; ?>
    </li>
    <?php endforeach; ?>
</ul>

<div class="news-content_block">
    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
        <div class="news-content" data-category="cat-<?php $terms = get_the_terms($post->ID, 'news_category');
         if ($terms) {
          echo $terms[0]->slug;
         } ?>">
		<div class="news-desc">
         <p class="news-date"><?php the_time(get_option('date_format')); ?></p>
          <?php $terms = get_the_terms($post->ID, 'news_category');
           if ($terms) :
           foreach ($terms as $term) :
          ?>
         <p class="tags"><?php echo $term->name; ?></p>
		</div>
          <?php endforeach; ?>
          <?php endif; ?>
         <p class="news-r"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
        </div>
    <?php endwhile; ?>
</div>

</div>





















