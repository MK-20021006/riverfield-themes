<?php
/* カスタム・ログイン画面 */
function my_login_style() {
 wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/zzz/login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_style' );
function my_login_style_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_style_url' );
function my_login_style_url_title() {
    return 'WebSiteName';
}
add_filter( 'login_headertitle', 'my_login_style_url_title' );

/**
 * Lightning Child theme functions
 *
 * @package lightning
 */

/************************************************
 * 独自CSSファイルの読み込み処理
 *
 * 主に CSS を SASS で 書きたい人用です。 素の CSS を直接書くなら style.css に記載してかまいません.
 */

// 独自のCSSファイル（assets/css/）を読み込む場合は true に変更してください.
$my_lightning_additional_css = true;

if ( $my_lightning_additional_css ) {
	// 公開画面側のCSSの読み込み.
	add_action(
		'wp_enqueue_scripts',
		function() {
			wp_enqueue_style(
				'my-lightning-custom',
				get_stylesheet_directory_uri() . '/assets/css/style.css',
				array( 'lightning-design-style' ),
				filemtime( dirname( __FILE__ ) . '/assets/css/style.css' )
			);
		}
	);
	// 編集画面側のCSSの読み込み.
	add_action(
		'enqueue_block_editor_assets',
		function() {
			wp_enqueue_style(
				'my-lightning-editor-custom',
				get_stylesheet_directory_uri() . '/assets/css/editor.css',
				array( 'wp-edit-blocks', 'lightning-gutenberg-editor' ),
				filemtime( dirname( __FILE__ ) . '/assets/css/editor.css' )
			);
		}
	);
}

/************************************************
 * 独自の処理を必要に応じて書き足します*/

function add_link_files() {

// JavaScriptの読み込み
  wp_enqueue_script( 'page_script', get_theme_file_uri().'/assets/js/page_script.js', array(), false, false );
}
add_action( 'wp_enqueue_scripts', 'add_link_files' );

// CDNの読み込み
add_action('wp_head', 'script_fa_cdn');
 function script_fa_cdn(){
 $link = <<<EOT
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;200;300;400;500&family=Oswald:wght@200;300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>z
EOT;
 echo $link;
};


//phpファイルをショートコードで読み込む ※小テーマの場合
function short_php($params = array()) {
  extract(shortcode_atts(array(
    'file' => 'default'
  ), $params));
  ob_start();
  include(STYLESHEETPATH . "/$file.php");
  return ob_get_clean();
}
 
add_shortcode('short', 'short_php');

function add_files(){
    // WordPress本体のjquery.jsを読み込まない
    wp_deregister_script('jquery');

    // 指定したjQueryの読み込み
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', false);

    //郵便番号自動入力
    wp_enqueue_script('ajaxzip3', get_stylesheet_directory_uri() . '/assets/js/ajaxzip3.js');

    //カナ自動入力
    wp_enqueue_script('autoKana', get_stylesheet_directory_uri() . '/assets/js/jquery.autoKana.js');

    //index.js
    wp_enqueue_script('index', get_stylesheet_directory_uri() . '/assets/js/index.js');
}
add_action('wp_enqueue_scripts', 'add_files');



//抜粋文の文章量と三点リーダーの設定
function twpp_change_excerpt_length( $length ) {
  return 40; 
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );
function twpp_change_excerpt_more( $more ) {
  return '...';
}
add_filter( 'excerpt_more', 'twpp_change_excerpt_more' );


//カスタム投稿タイプの追加
add_action( 'init', 'create_post_type' );
function create_post_type() {

//カスタム投稿「お知らせ」
register_post_type(
	'news-page',
		array(
			'labels' => array(
			'name' => __( 'お知らせ' ),
			'singular_name' => __( 'お知らせ' )
			),
			'public' => true,
            'has_archive' => true,
            'show_in_rest' => true, // ブロックエディターに対応
            'supports' => array(
				'title',
				'editor',
				'thumbnail'
		)
	   )
	);

//カスタム投稿「事業紹介」
register_post_type(
	'service',
		array(
			'labels' => array(
			'name' => __( '事業紹介' ),
			'singular_name' => __( '事業紹介' )
			),
			'public' => true,
			'has_archive' => true,
            'show_in_rest' => true, 
            'supports' => array(
            'title',
            'editor',
            'thumbnail' 
		)
	  )
	);
//カスタム投稿「工事実績」
register_post_type(
	'works',
		array(
			'labels' => array(
			'name' => __( '工事実績' ),
			'singular_name' => __( '工事実績' )
			),
			'public' => true,
			'has_archive' => true,
            'show_in_rest' => true, 
            'supports' => array(
            'title',
            'editor',
            'thumbnail' 
		)
	  )
	);
//カスタム投稿「保有重機」
register_post_type(
	'machine',
		array(
			'labels' => array(
			'name' => __( '保有重機' ),
			'singular_name' => __( '保有重機' )
			),
			'public' => true,
			'has_archive' => false,
            'show_in_rest' => true, 
            'supports' => array(
            'title',
		)
	  )
	);
}


//各カスタム投稿タイプの追加要素
//「お知らせ」にカテゴリー追加
function create_taxonomy() {
    register_taxonomy(
        'news_category',
        'news-page',
        array(
            'label' => __( 'カテゴリー' ),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'news-page/category' )
        )
    );
}
add_action( 'init', 'create_taxonomy' );

//「事業紹介」カスタムフィールドを追加
function add_service_meta_box() {
    add_meta_box(
        'service_meta_box',
        'TOP-IMAGE',
        'render_service_meta_box',
        'service',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'add_service_meta_box' );

function render_service_meta_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'service_meta_box_nonce' );
    $service_img2 = get_post_meta( $post->ID, 'service_img2', true );
    ?>
	<div>
		<?php if ( $service_img2 ) : ?>
		<img src="<?php echo esc_url( $service_img2 ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" style="width: 150px; height: 245px;" />
		<?php endif; ?>
		<input type="hidden" name="service_img2" id="service_img2" class="widefat service-img2" value="<?php echo esc_attr( $service_img2 ); ?>" />
		<input type="button" class="button button-secondary upload-service-img2" value="<?php _e( '画像を選択', 'textdomain' ); ?>" />
	</div>
    <script>
        jQuery(document).ready(function($) {
            var mediaUploader;
            $('.upload-service-img2').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });
                mediaUploader.on('select', function() {
                    attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('.service-img2').val(attachment.url);
                    $('.service-img2-preview img').attr('src', attachment.url);
                });
                mediaUploader.open();
            });
        });
    </script>
    <?php
}

// カスタムフィールドの値を保存
function save_service_meta_box( $post_id ) {
    if ( ! isset( $_POST['service_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['service_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'service' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    $service_img2 = isset( $_POST['service_img2'] ) ? $_POST['service_img2'] : '';
    update_post_meta( $post_id, 'service_img2', $service_img2 );
}
add_action( 'save_post', 'save_service_meta_box' );

// カスタム投稿タイプ「事業紹介」にサブタイトルのカスタムフィールドを追加する
function add_subtitle_meta_box() {
    add_meta_box(
        'subtitle_meta_box',
        'サブタイトル',
        'render_subtitle_meta_box',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_subtitle_meta_box');

function render_subtitle_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'subtitle_meta_box_nonce');
    $subtitle = get_post_meta($post->ID, 'subtitle', true);
    echo '<input type="text" style="width:100%;" name="subtitle" value="' . esc_attr($subtitle) . '" />';
}
function save_subtitle_meta_box_data($post_id) {
    if (!isset($_POST['subtitle_meta_box_nonce'])) {
        return;}
    if (!wp_verify_nonce($_POST['subtitle_meta_box_nonce'], basename(__FILE__))) {
        return;}
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;}
    if (!current_user_can('edit_post', $post_id)) {
        return;}
    if (!isset($_POST['subtitle'])) {
        return;}
    $subtitle = sanitize_text_field($_POST['subtitle']);
    update_post_meta($post_id, 'subtitle', $subtitle);
}
add_action('save_post', 'save_subtitle_meta_box_data');

//「事業説明」のカスタムフィールドを追加
function add_custom_fields() {
    add_meta_box(
        'service_desc', // メタボックスのID
        '事業説明', // メタボックスのタイトル
        'service_desc_input', // メタボックスに表示するコンテンツの関数名
        'service', // カスタム投稿タイプ名
        'normal', // 表示位置
        'high' // 表示優先度
    );
}
add_action('add_meta_boxes', 'add_custom_fields');
// メタボックスに表示するコンテンツの関数
function service_desc_input() {
    global $post;
    $service_desc = get_post_meta($post->ID, '事業説明', true); // カスタムフィールドの値を取得
    wp_nonce_field(wp_create_nonce(__FILE__), 'service_desc_nonce'); // nonceの設定
    ?>
    <p>
        <label for="service-desc">事業説明：</label>
        <textarea name="service-desc" id="service-desc" rows="5" style="width:100%;"><?php echo $service_desc; ?></textarea>
    </p>
    <?php
}
// カスタムフィールドの値を保存
function save_custom_fields($post_id) {
    $service_desc = isset($_POST['service-desc']) ? $_POST['service-desc'] : ''; // フォームから送信された値を取得
    $service_desc_nonce = isset($_POST['service_desc_nonce']) ? $_POST['service_desc_nonce'] : ''; // nonceの値を取得
    // nonceの検証
    if(!wp_verify_nonce($service_desc_nonce, wp_create_nonce(__FILE__))) {
        return $post_id;
    }
    // オートセーブ時は保存しない
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // 権限がない場合は保存しない
    if(!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    // カスタムフィールドの値を保存
    update_post_meta($post_id, '事業説明', $service_desc);
}
add_action('save_post', 'save_custom_fields');



//施工実績のカスタムフィールドを追加
function add_custom_meta_box() {
  add_meta_box(
    'custom_fields',
    'Custom Fields',
    'custom_meta_box_callback',
    'works',
    'normal',
    'default'
  );
}
add_action( 'add_meta_boxes', 'add_custom_meta_box' );

function custom_meta_box_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'custom_meta_box_nonce' );
  ?>
  <div>
    <label for="type">元請・下請</label>
    <input type="text" name="type" id="type" value="<?php echo esc_attr( get_post_meta( $post->ID, 'type', true ) ); ?>">
  </div>
  <div>
    <label for="address">住所</label>
    <input type="text" name="address" id="address" value="<?php echo esc_attr( get_post_meta( $post->ID, 'address', true ) ); ?>">
  </div>
  <?php
}
function save_custom_meta_box_data( $post_id ) {
  if ( ! isset( $_POST['custom_meta_box_nonce'] ) ) {
    return;
  }
  if ( ! wp_verify_nonce( $_POST['custom_meta_box_nonce'], basename( __FILE__ ) ) ) {
    return;
  }
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  if ( isset( $_POST['post_type'] ) && 'works' == $_POST['post_type'] ) {
    if ( isset( $_POST['type'] ) ) {
      update_post_meta( $post_id, 'type', sanitize_text_field( $_POST['type'] ) );
    }
    if ( isset( $_POST['address'] ) ) {
      update_post_meta( $post_id, 'address', sanitize_text_field( $_POST['address'] ) );
    }
  }
}
add_action( 'save_post', 'save_custom_meta_box_data' );

//施工実績にカテゴリーを追加
// カテゴリータクソノミーを works カスタム投稿タイプに追加する
function add_category_taxonomy_to_works() {
    register_taxonomy_for_object_type('category', 'works');
}
add_action('init', 'add_category_taxonomy_to_works');


//トップページへリダイレクト
add_action( 'template_redirect', 'is404_redirect' );
function is404_redirect() {
  if ( is_404() ) {
    wp_safe_redirect( home_url( '/' ), 301 );
    exit();
  }
}


//保有重機のカスタムフィールド追加
add_action( 'admin_init', 'add_machine_custom_fields' );
function add_machine_custom_fields() {
    add_meta_box(
        'machine_class',
        'クラス',
        'machine_class_callback',
        'machine',
        'normal',
        'default'
    );

    add_meta_box(
        'machine_quantity',
        '台数',
        'machine_quantity_callback',
        'machine',
        'normal',
        'default'
    );
	
	add_meta_box(
        'machine_spec_notes',
        '仕様・備考',
        'machine_spec_notes_callback',
        'machine',
        'normal',
        'default'
    );
}

function machine_class_callback( $post ) {
    $machine_class = get_post_meta( $post->ID, 'machine_class', true );
    ?>
    <input type="text" id="machine_class" name="machine_class" style="width:100%;" value="<?php echo esc_attr( $machine_class ); ?>" />
    <?php
}

function machine_quantity_callback( $post ) {
    $machine_quantity = get_post_meta( $post->ID, 'machine_quantity', true );
    ?>
    <input type="text" id="machine_quantity" name="machine_quantity" style="width:100%;" value="<?php echo esc_attr( $machine_quantity ); ?>" />
    <?php
}

function machine_spec_notes_callback( $post ) {
    $spec_notes = get_post_meta( $post->ID, 'machine_spec_notes', true );
    ?>
    <input type="text" id="machine_spec_notes" name="machine_spec_notes" style="width:100%;" value="<?php echo esc_attr( $spec_notes ); ?>" />
    <?php
}

// カスタムフィールドの値を保存
add_action( 'save_post', 'save_machine_custom_fields' );
function save_machine_custom_fields( $post_id ) {
    if ( isset( $_POST['machine_class'] ) ) {
        $machine_class = sanitize_text_field( $_POST['machine_class'] );
        update_post_meta( $post_id, 'machine_class', $machine_class );
    }

    if ( isset( $_POST['machine_quantity'] ) ) {
        $machine_quantity = sanitize_text_field( $_POST['machine_quantity'] );
        update_post_meta( $post_id, 'machine_quantity', $machine_quantity );
    }

	if ( isset( $_POST['machine_spec_notes'] ) ) {
        $spec_notes = sanitize_text_field( $_POST['machine_spec_notes'] );
        update_post_meta( $post_id, 'machine_spec_notes', $spec_notes );
    }
}
//保有重機にカスタムタクソノミー追加
add_action( 'init', 'create_machine_class_taxonomy' );
function create_machine_class_taxonomy() {
    $labels = array(
        'name' => __( '重機クラス' ),
        'singular_name' => __( '重機クラス' ),
        'search_items' => __( 'クラスを検索' ),
        'all_items' => __( 'すべてのクラス' ),
        'parent_item' => __( '親クラス' ),
        'parent_item_colon' => __( '親クラス:' ),
        'edit_item' => __( 'クラスを編集' ),
        'update_item' => __( '更新' ),
        'add_new_item' => __( '新しいクラスを追加' ),
        'new_item_name' => __( '新しいクラス名' ),
        'menu_name' => __( '重機クラス' ),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'machine-class' ), // URLスラッグ
    );

    register_taxonomy( 'machine_class', array( 'machine' ), $args );
}



//コンタクトフォームの入力制限
// contactform7 文字制御
add_filter('wpcf7_validate_text', 'wpcf7_validate_kana', 11, 2); add_filter('wpcf7_validate_text*', 'wpcf7_validate_kana', 11, 2); function wpcf7_validate_kana($result,$tag){ $tag = new WPCF7_Shortcode($tag); $name = $tag->name;
  $value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";

  // "your-name-kana の入力制限"
  if ( $name === "your-name-kana" ) {
    if(!preg_match("/^[ァ-ヾ]+$/u", $value)) { // カタカナ以外だった場合
      $result->invalidate($tag, "全角カタカナで入力してください。"); // エラーメッセージを表示
    }
  }
  if ( $name === "your-name") {
    if(!preg_match("/[ぁ-んァ-ヶー一-龠０-９、。]/u", $value)) { // カタカナ以外だった場合
      $result->invalidate($tag, "日本語で入力してください。"); // エラーメッセージを表示
    }
  }
  if ( $name === "pres-name") {
    if(!preg_match("/[ぁ-んァ-ヶー一-龠０-９、。]/u", $value)) { // カタカナ以外だった場合
      $result->invalidate($tag, "日本語で入力してください。"); // エラーメッセージを表示
    }
  }
  if ( $name === "manager-name") {
    if(!preg_match("/[ぁ-んァ-ヶー一-龠０-９、。]/u", $value)) { // カタカナ以外だった場合
      $result->invalidate($tag, "日本語で入力してください。"); // エラーメッセージを表示
    }
  }

	return $result;
}


function wpcf7_validate_mb_char( $result, $tag ) {
    $field_name = 'contact-desc'; // チェックしたいフォームフィールド名
    $value = isset($_POST[$field_name]) ? str_replace(array("\r", "\n", ' ', '　'), '', $_POST[$field_name]) : ''; // 改行とスペースを取り除く
    $min_rate = 30; // （％）最小日本語文字数の割合（これ以下の場合はエラー）
    
    // 入力が空でない場合にのみ、日本語文字数の割合を計算する
    if (!empty($value)) {
        $str_l = mb_strlen($value, "UTF-8"); // 文字数取得（ダブルクオーテーション必須）
        $str_ja = preg_match_all("/[ぁ-んァ-ヶー一-龠０-９、。]/u", $value, $matches); // 日本語の文字数を取得
        $str_mb_rate = ($str_ja / $str_l) * 100; // 日本語文字数の割合を計算する式

        if ($str_mb_rate < $min_rate) {
            $result['valid'] = false;
            $result['reason'] = array($field_name => '日本語以外の言語が多く含まれています');
        }
    }

    return $result;
}
add_filter( 'wpcf7_validate', 'wpcf7_validate_mb_char', 10, 2 );












