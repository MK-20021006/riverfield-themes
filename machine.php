<div id="machine" class="vehicle ">
    <h3>保有重機等一覧</h3>
</div>

<?php
// 重機クラスのカテゴリー取得部分
$machine_classes = get_terms( array(
    'taxonomy' => 'machine_class',
    'hide_empty' => false,
    'orderby' => 'description', // 名前でソート
    'order' => 'ASC',    // 昇順
) );

foreach ($machine_classes as $machine_class) {
    ?>
    <div class="wp-block-table gray-stripe fadein-top view machine-table">
        <p><?php echo $machine_class->name; ?></p>
        <table>
            <thead>
                <tr>
                    <th class="has-text-align-left" data-align="left">機械名称</th>
                    <th class="has-text-align-left" data-align="left">クラス</th>
                    <th class="has-text-align-left" data-align="left">台数</th>
                    <th class="has-text-align-left" data-align="left">仕様・備考</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // カテゴリーに属するポストを取得
                $args = array(
                    'post_type' => 'machine',
					'posts_per_page' => '-1',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'machine_class',
                            'field' => 'slug',
                            'terms' => $machine_class->slug, // 重機クラスのカテゴリースラッグ
                        ),
                    ),
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <tr>
                            <td class="has-text-align-left" data-align="left"><?php the_title(); ?></td>
                            <td class="has-text-align-left" data-align="left"><?php echo get_post_meta(get_the_ID(), 'machine_class', true); ?></td>
                            <td class="has-text-align-left" data-align="left"><?php echo get_post_meta(get_the_ID(), 'machine_quantity', true); ?></td>
                            <td class="has-text-align-left" data-align="left"><?php echo get_post_meta(get_the_ID(), 'machine_spec_notes', true); ?></td>
                        </tr>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <tr>
                        <td colspan="4">該当するデータはありません</td>
                    </tr>
                <?php
                endif;
                ?>
            </tbody>
        </table>
    </div>
<?php
}
?>





