<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if( is_home() || is_front_page() ): // トップページ用のメタデータ ?>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  <?php $allcats = get_categories();
  $kwds = array();
  foreach ( $allcats as $allcat ) {
    $kwds[] = $allcat->name;
  } ?>
  <meta name="keywords" content="<?php echo implode( ',', $kwds ); ?>">

  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
  <meta property="og:url" content="<?php echo esc_url(home_url( '/' )); ?>">
  <meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
  <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/site-top.jpg">
<?php endif; // トップページ用のメタデータ【ここまで】 ?>

<?php if( ( is_single() || is_page() ) && ( !is_front_page() ) ): //記事の個別ページ用のメタデータ ?>
  <meta name="description" content="<?php echo wp_trim_words( $post->post_excerpt, 200, '…' ); ?>">

  <?php if ( has_tag() ): ?>
    <?php $tags = get_the_tags();
    $kwds = array();
    foreach ( $tags as $tag ) {
      $kwds[] = $tag->name;
    } ?>
    <?php $allcats = get_the_category();
    foreach ( $allcats as $allcat ) {
      $kwds[] = $allcat->name;
    } ?>
    <meta name="keywords" content="<?php echo implode( ',', $kwds ); ?>">
  <?php endif; ?>

  <meta property="og:type" content="article">
  <meta property="og:title" content="<?php the_title(); ?>">
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <meta property="og:description" content="<?php echo esc_attr( wp_trim_words( $post->post_excerpt, 200, '…' ) ); ?>">
  <meta property="og:image" content="<?php echo get_thumbnail_url( 'large' ); ?>">
<?php endif; //記事の個別ページ用のメタデータ【ここまで】?>

<?php if( is_category() || is_tag() ): // カテゴリー・タグページ用のメタデータ ?>
  <?php if( is_category() ) {
      $termid = $cat;
      $taxname = 'category';
  } elseif( is_tag() ) {
      $termid = $tag_id;
      $taxname = 'post_tag';
  } ?>

  <?php $childcats = get_categories( array( 'child_of'=>$termid ) );
  $kwds = array();
  $kwds[] = single_term_title( '', false );
  foreach ( $childcats as $childcat ) {
    $kwds[] = $childcat->name;
  } ?>
  <meta name="keywords" content="<?php echo implode( ',', $kwds ); ?>">

  <meta name="description" content="<?php echo esc_html__( 'This list is about posts on ', 'twentyseventeen' ); ?><?php single_term_title(); ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo esc_html__( 'Posts related to ', 'twentyseventeen' ); ?><?php single_term_title(); ?> | <?php bloginfo( 'name' ); ?>">
  <meta property="og:url" content="<?php echo get_term_link( $termid, $taxname ); ?>">
  <meta property="og:description" content="<?php echo esc_html__( 'This list is about posts on ', 'twentyseventeen' ); ?><?php single_term_title(); ?>">
  <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/site-top.jpg">
<?php endif; // カテゴリ・タグページ用のメタデータ【ここまで】 ?>

<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<meta property="og:locale" content="ja_JP">
<meta property="og:locale:alternate" content="en_US">
<meta property="og:locale:alternate" content="en_GB">
<meta property="og:locale:alternate" content="zh_TW">
<meta property="fb:app_id" content="2002804263297057">
<meta name="twitter:site" content="@CodeAidxx">
<meta name="twitter:creator" content="@CodeAidxx">
<meta name="twitter:card" content="summary_large_image">

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75719561-8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-75719561-8');
</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
