<?php


function gr_register_terms( $terms, $taxonomy ) {
	foreach ( $terms as $key => $label ) {
		$keys = explode( '/', $key );
		if ( 1 < count( $keys ) ) {
			$key = $keys[1];
			$parent_id = get_term_by( 'slug', $keys[0], $taxonomy )->term_id;
		} else {
			$parent_id = 0;
		}
		if ( ! term_exists( $key, $taxonomy ) ) {
			wp_insert_term( $label, $taxonomy, array( 'slug' => $key, 'parent' => $parent_id ) );
		}
	}
}

add_action( 'init', 'bc_create_customs', 0 );
function bc_create_customs() {

	// お知らせ
	register_post_type( 'whatsnew', array(
			'labels' => array(
		'name' => __( 'お知らせ' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'whatsnew_cat', 'whatsnew', array(
			 'label' => 'お知らせカテゴリー',
		     'hierarchical' => true,
	) );

	// 施工事例
    register_post_type( 'seko', array(
        'labels' => array(
            'name' => __( '施工事例' ),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => array( 'title', 'editor','author' ),
    ) );

    register_taxonomy( 'seko_cat', 'seko', array(
         'label' => '施工事例カテゴリー',
         'hierarchical' => true,
    ) );



	register_taxonomy( 'seko_staff', 'seko', array(
		'label' => 'スタッフカテゴリー',
         	'hierarchical' => true,
	) );


	// イベント
	register_post_type( 'event', array(
			'labels' => array(
		'name' => __( 'イベント' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
			'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'event_cat', 'event', array(
			 'label' => 'イベントカテゴリー',
		     'hierarchical' => true,
	) );


		// よくあるご質問
	register_post_type( 'faq', array(
			'labels' => array(
		'name' => __( 'よくあるご質問' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'faq_cat', 'faq', array(
			 'label' => 'よくあるご質問',
		     'hierarchical' => true,
	) );


	// 現場日記
	register_post_type( 'genbanikki', array(
			'labels' => array(
		'name' => __( '現場日記' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'genba_cat', 'genbanikki', array(
			 'label' => '現場日記カテゴリー',
				     'hierarchical' => true,
	) );

	// 大型事例
	register_post_type( 'special', array(
			'labels' => array(
		'name' => __( '大規模リフォーム' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 19,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'special_cat', 'special', array(
			'label' => 'スタッフカテゴリー',
			'hierarchical' => true,
		 	'update_count_callback' => '_update_post_term_count',
		 	'singular_label' => 'スタッフカテゴリー',
		 	'public' => true,
		 	'show_ui' => true	) );

	// ありがとうの輪
	register_post_type( 'voice', array(
			'labels' => array(
		'name' => __( 'ありがとうの輪' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'voice_staff', 'voice', array(
			 'label' => 'スタッフカテゴリー',
		     'hierarchical' => true,
	) );

	// お客様の声
	register_post_type( 'enquete', array(
			'labels' => array(
		'name' => __( 'お客様の声' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor','author' ),
	) );

	// スタッフ
	register_post_type( 'staff', array(
			'labels' => array(
		'name' => __( 'スタッフ' ),
			),
			'public' => true,
			'menu_position' => 5,
		    'has_archive' => true,
	'supports' => array( 'title', 'editor','author' ),
	) );
	register_taxonomy( 'staff_cat', 'staff', array(
			 'label' => 'スタッフカテゴリー',
		     'hierarchical' => true,
	) );

	// 職人
	register_post_type( 'craftsman', array(
			'labels' => array(
		'name' => __( '職人' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor','author' ),
	) );



	// チラシ
	register_post_type( 'chirashi', array(
			'labels' => array(
		'name' => __( 'チラシ' ),
		'singular_name' => __( 'チラシ')
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor','author' ),
	) );
		// アルバム
	register_post_type( 'album', array(
			'labels' => array(
		'name' => __( 'アルバム' ),
		'singular_name' => __( 'アルバム')
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor','author' ),
	) );

	// スタッフブログ
	register_post_type( 'staffblog', array(
			'labels' => array(
		'name' => __( 'スタッフブログ' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'editor', 'comments' ),
	) );
	register_taxonomy( 'staffblog_cat', 'staffblog', array(
			 'label' => 'スタッフブログカテゴリー',
         		 'hierarchical' => true,
	) );


	// セミナー日程
	register_post_type( 'seminardata', array(
			'labels' => array(
		'name' => __( 'セミナー日程' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
	'supports' => array( 'title', 'author' ),
	) );



}
add_filter( 'wp_list_categories', 'gr_list_categories', 10, 2 );
function gr_list_categories( $output, $args ) {
	return preg_replace( '@</a>\s*\((\d+)\)@', ' ($1)</a>', $output );
}

add_action( 'pre_get_posts', 'gr_pre_get_posts' );
function gr_pre_get_posts( $query ) {
	if ( is_admin() ) {
		if ( in_array( $query->get( 'post_type' ), array( 'seko', 'staff' ) ) ) {
			$query->set( 'posts_per_page', -1 );
		}
		return;
	}
}
function gr_get_post( $post_name ) {
	global $wpdb;
	$null = $_post = null;

	if ( ! $_post = wp_cache_get( $post_name, 'posts' ) ) {
		$_post = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_name = %s LIMIT 1", $post_name ) );
		if ( ! $_post )
			return $null;
		_get_post_ancestors($_post);
		$_post = sanitize_post( $_post, 'raw' );
		wp_cache_add( $post_name, $_post, 'posts' );
	}

	return $_post;
}

function gr_get_permalink( $name, $taxonomy = '' ) {
	$link = false;

	if ( false && term_exists( $name, $taxnomy ) ) {
		$link = get_term_link( $name );
	} else if ( post_type_exists( $name ) ) {
		$link = get_post_type_archive_link( $name );
	} else {
		$_post = gr_get_post( $name );
		if ( $_post )
			$link = get_permalink( $_post );
	}

	return $link;
}

function gr_image_id( $key ) {
    $imagefield = post_custom( $key );
    return  preg_replace('/(\[)([0-9]+)(\])(http.+)?/', '$2', $imagefield );
}

function gr_get_image( $key, $att = '' ) {
	$id = gr_image_id( $key );

	if ( is_numeric( $id ) ) {
		if ( isset( $att['size'] ) ) {
			$size = $att['size'];
			unset( $att['size'] );
		}
		if ( isset( $att['width'] ) ) {
			$size = array( $att['width'], 200 );
			unset( $att['width'] );
		}
		return wp_get_attachment_image( $id, $size, false, $att );
	}

	if ( $id ) {
		/* ファイル存在チェック
		 * $id = /images/seko/289-2-t.jpg のようなパスでここに渡ってくるので
		 * get_stylesheet_directory_uri()のようなhttpで絶対パスを指定せず
		 * dirname(__FILE__)でチェック
		 */
		if( file_exists( dirname(__FILE__) . "$id" ) ) {
			return sprintf(
				'<img src="%1$s%2$s"%3$s%4$s%5$s />',
				get_stylesheet_directory_uri(),
				$id,
				( $att['width' ] ? ' width="' .$att['width' ].'"' : '' ),
				( $att['height'] ? ' height="'.$att['height'].'"' : '' ),
				( $att['alt'   ] ? ' alt="'   .$att['alt'   ].'"' : '' )
			);
		}
	}

	return '';
}

function gr_get_image_src( $key ) {
	$id = gr_image_id( $key );
	$src = '';

	if ( is_numeric( $id ) ) {
		@list( $src, $width, $height ) = wp_get_attachment_image_src( $id, $size, false );
	} else if ( $id ) {
		$src = get_stylesheet_directory_uri() . $id;
	}
	return $src;
}
function gr_contact_banner() {
?>
<div class="contact">
	<a href="/contact"><img src="<?php echo get_template_directory_uri(); ?>/images/common/bnr_contact_rollout.gif" width="699" height="96" alt="お問い合わせ" /></a>
</div>
<?php
}
function the_pankuzu_keni( $separator = '　→　', $multiple_separator = '　|　' )
{
	global $wp_query;

	echo("<li><a href=\""); bloginfo('url'); echo("\">HOME</a>$separator</li>" );

	$queried_object = $wp_query->get_queried_object();

	if( is_page() )
	{
		//ページ
		if( $queried_object->post_parent )
		{
			echo( get_page_parents_keni( $queried_object->post_parent, $separator ) );
		}
		echo '<li>'; the_title(); echo '</li>';
	}
	else if( is_archive() )
	{
		if( is_post_type_archive() )
		{
			echo '<li>'; post_type_archive_title(); echo '</li>';
		}
		else if( is_category() )
		{
			//カテゴリアーカイブ
			if( $queried_object->category_parent )
			{
				echo get_category_parents( $queried_object->category_parent, 1, $separator );
			}
			echo '<li>'; single_cat_title(); echo '</li>';
		}
		else if( is_day() )
		{
			echo '<li>'; printf( __('Archive List for %s','keni'), get_the_time(__('F j, Y','keni'))); echo '</li>';
		}
		else if( is_month() )
		{
			echo '<li>'; printf( __('Archive List for %s','keni'), get_the_time(__('F Y','keni'))); echo '</li>';
		}
		else if( is_year() )
		{
			echo '<li>'; printf( __('Archive List for %s','keni'), get_the_time(__('Y','keni'))); echo '</li>';
		}
		else if( is_author() )
		{
			echo '<li>'; _e('Archive List for authors','keni'); echo '</li>';
		}
		else if(isset($_GET['paged']) && !empty($_GET['paged']))
		{
			echo '<li>'; _e('Archive List for blog','keni'); echo '</li>';
		}
		else if( is_tag() )
		{
			//タグ
			echo '<li>'; printf( __('Tag List for %s','keni'), single_tag_title('',0)); echo '</li>';
		}
	}
	else if( is_single() )
	{
		$obj = get_post_type_object( $queried_object->post_type );
		if ( $obj->has_archive ) {
			printf(
				'<li><a href="%1$s">%2$s</a>%3$s</li>',
				get_post_type_archive_link( $obj->name ),
				apply_filters( 'post_type_archive_title', $obj->labels->name ),
				$separator
			);
		} else {
			//シングル
			echo '<li>'; the_category_keni( $separator, 'multiple', false, $multiple_separator ); echo '</li>';
			echo( $separator );
		}
		echo '<li>'; the_title(); echo '</li>';
	}
	else if( is_search() )
	{
		//検索
		echo '<li>'; printf( __('Search Result for %s','keni'), strip_tags(get_query_var('s'))); echo '</li>';
	}
	else
	{
		$request_value = "";
		foreach( $_REQUEST as $request_key => $request_value ){
			if( $request_key == 'sitemap' ){ $request_value = $request_key; break; }
		}

		if( $request_value == 'sitemap' )
		{
			echo '<li>'; _e('Sitemap','keni'); echo '</li>';
		}
		else
		{
			echo '<li>'; the_title(); echo '</li>';
		}
	}
}
function get_page_parents_keni( $page, $separator )
{
	$pankuzu = "";

	$post = get_post( $page );

	$pankuzu = '<li><a href="'. get_permalink( $post ) .'">' . $post->post_title . '</a>' . $separator . '</li>';

	if( $post->post_parent )
	{
		$pankuzu = get_page_parents_keni( $post->post_parent, $separator ) . $pankuzu;
	}

	return $pankuzu;
}
function gr_get_posts_count() {
	global $wp_query;
	return get_query_var( 'posts_per_page' ) ? $wp_query->found_posts : $wp_query->post_count;
}
//施工事例関数化
function cateSeko($id,$kensu){ ?>
<div class="content_seko_detail">
<? $i = 0;
$x = 0; ?>
<?php query_posts( array( 'seko_cat' => $id, 'posts_per_page' => $kensu )); ?>
<?php if(have_posts()) : while( have_posts() ) : the_post(); ?>
		<div class="box">
			<a href="<?php the_permalink() ?>" class="<?php if($i%2==0){ echo " clear_l "; $x++; } ?>heightLine-group<?php echo $x; ?>">
			<div class="img">
				<?php
global $post;
$Tokuchou = get_post_meta($post->ID,'seko_sekomachi');

if(in_array("施工待ち",$Tokuchou)):?>
				<span class="stamp"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/images/common/icon_machi.png" width="78" height="78" alt="施工待ち" /></span>
				<?php
						elseif(in_array("施工中",$Tokuchou)):?>
				<span class="stamp"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/images/common/icon_chu.png" width="78" height="78" alt="施工中" /></span>
				<?php
						endif;

        if(post_custom('seko_after_image')){
	printf(
		'%s',
		gr_get_image(
			'seko_after_image',
			array( 'width' => 150, 'alt' => esc_attr( get_the_title() ), 'title' => esc_attr( get_the_title() ) )
		)
	);
}
        else if(post_custom('seko_point_image01')){
	printf(
		'%s',
		gr_get_image(
			'seko_point_image01',
			array( 'width' => 150, 'alt' => esc_attr( get_the_title() ), 'title' => esc_attr( get_the_title() ) )
		)
	);
}
else if($img = post_custom('seko_csv01')){
	echo '<img src="/wp-content/themes/reform/page_image' . $img . '" width="150" height="150" alt="" />';
}
else if($img = post_custom('seko_csv2')){
	echo '<img src="/wp-content/themes/reform/page_image' . $img . '" width="150" height="150" alt="" />';
}
else if($img = post_custom('seko_csv3')){
	echo '<img src="/wp-content/themes/reform/page_image' . $img . '" width="150" height="150" alt="" />';
}
else if($img = post_custom('seko_csv4')){
	echo '<img src="/wp-content/themes/reform/page_image' . $img . '" width="150" height="150" alt="" />';
}
else if($img = post_custom('seko_csv5')){
	echo '<img src="/wp-content/themes/reform/page_image' . $img . '" width="150" height="150" alt="" />';
}
	?>
			</div>
			<p class="txt heightLine-group<?php echo $x; ?>_txt"><span class="new">
				<? if(post_custom('seko_newicon')){
if( post_custom('seko_newicon') ){
 	echo '<img src="/wp-content/themes/reform/page_image/seko/new.gif" width="30" height="10" alt="new" />';
}} ?>
				</span><?php echo post_custom( 'seko_city' ); ?> <?php echo post_custom( 'seko_name' ); ?><br />
				<span class="tit">
				<? the_title(); ?>
				</span><br />
				工期：<span class="koki"><?php echo post_custom( 'seko_duration' ); ?></span>　費用：<span class="hiyo"><?php echo post_custom( 'seko_price' ); ?></span></p>
			<div class="more">
				<img src="<?php bloginfo('template_url'); ?>/page_image/seko/seko_more.gif" alt="詳しく見る" width="180" height="30" class="over" />
			</div>
			</a>
		</div>
<?php
$i++;
endwhile; ?>
<?php else : ?>
<p>現在登録されておりません。</p>
<?php endif; ?>
<?php wp_reset_query(); ?>
</div>
<? } ?>
