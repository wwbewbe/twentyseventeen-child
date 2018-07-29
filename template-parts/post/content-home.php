<?php
/**
 * loop on home
 *
 *
 */
remove_action('wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3);
?>



	<article id="post-<?php the_ID(); ?>" <?php post_class('home-box'); ?>>
		<div class="home-thumbnail">
			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('thumbnail');
				}
				else {
					echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/images/no-thumb.png" />';
				}
			?>
		</div><!-- .home-thumbnail -->
		<div class="home-content">

			<header class="entry-header">
				<?php
					if ( 'post' === get_post_type() ) :
						echo '<div class="entry-meta">';
							if ( is_single() ) :
								twentyseventeen_posted_on();
							else :
								echo twentyseventeen_time_link();
								twentyseventeen_edit_link();
							endif;
						echo '</div><!-- .entry-meta -->';
					endif;

					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
				?>
			</header><!-- .entry-header -->

			<div class="home-excerpt">
<?php
				$content_excerpt = get_the_excerpt();
				$article_title = strlen(get_the_title());

				if ( $article_title >72 ) :

				elseif ( $article_title > 34 ) :
					echo '・・・<a href="'.get_permalink() . '">' . __('Read content','twentyseventeenchild' ) . '</a>';
				else :
					$content_excerpt = mb_substr($content_excerpt,0,60, "utf-8");
					echo $content_excerpt . '・・・<a href="' . get_permalink() . '">' . __('Read more','twentyseventeenchild'). '</a>';

				endif;
?>

			</div><!-- home-excerpt -->
		</div><!-- .home-content -->
	</article><!-- .home-box -->
