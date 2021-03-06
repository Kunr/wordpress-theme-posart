<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article class="post<?php if (has_post_thumbnail() && is_search()) { echo ' thumbnail-on'; }?>">
		<header class="post-head">
			<h2 class="post-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a>
			</h2>
			<time datetime="<?php the_time(); ?>" class="post-time"><?php the_time('Y-m-d'); ?></time>
		</header>
		<?php if ( is_search() ) : ?>
			<?php if (has_post_thumbnail()) {?>
				<section class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php the_post_thumbnail('stumblr-large-image'); ?>" alt="<?php the_title_attribute(); ?>" />
					</a>
				</section>
			<?php } ?>
			<section class="post-entry">
				<?php echo posart_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300, '...'); ?>
			</section>
		<?php else : ?>
			<section class="post-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
			</section>
		<?php endif; ?>
	</article>
<?php endwhile; ?>
<div class="comments"><?php comments_template(); ?></div>
<?php get_footer(); ?>
