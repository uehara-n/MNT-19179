<?php
get_header();

?>
<!-- ======================コンテンツここから======================= -->

<div id="main">
<!-- ========================================================右コンテンツ ここから -->
<div id="contents">
	<ul id="pankuzu" class="clearfix">
		<?php the_pankuzu_keni( ' &gt; ' ); ?>
	</ul>
	<div id="enquete_archive">
		
		
		<h3 class="main_tit">お客様の声</h3>
<div>
		<?php
	$args = array(
		'post_type' => 'enquete', /* 投稿タイプ */
		'paged' => $paged,
		'posts_per_page' => 12 /* 件数表示 */
	); ?>
		<?php query_posts( $args ); ?>
		<?php if (have_posts()) : ?>
		<?php $i = 0; ?>
		<?php while( have_posts() ) : the_post(); ?>
		<div class="box<?php
		if($i%2==0){
			echo " clear_left";
		}
	?>">
			
<div class="one">
<h4><?php the_title(); ?></h4>
<?php
           				printf(
							'<a href="%1$s" rel="lightbox[enquete]" >%2$s</a>',
							gr_get_image_src( 'enquete_photo' ),
							gr_get_image(
								'enquete_photo',
								array(
									'size' => full,
								)
							)
						);
?>
</div>

</div>
<?php $i++; ?>
<?php endwhile; ?>
<?php endif; ?>

<!--customer_navi-->
<div class="customer_navi clearfix" style="margin-top:20px;">					
<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>	
</div>
<!--customer_navi-->

</div>
<br clear="all">
</div>
<!-- ========================================================右コンテンツ ここまで -->
<div class="sp">
<p class="other_why"><a href="/riyu"><img src="http://www.e-monte.co.jp/wp-content/themes/sp/images/img4.png" alt="WHY CHOOSE?"></a></p>
<div class="tel">
		<p><img src="http://www.e-monte.co.jp/wp-content/themes/sp/images/tel-title.png"></p>
		<p><a href="tel:050-7302-3462"><img src="http://www.e-monte.co.jp/wp-content/themes/sp/images/tel-img.png" alt="tel:050-7302-3462"></a></p>
	</div>
	<br>
</div>
</div>
<!-- /main -->
<?php get_footer(); ?>
