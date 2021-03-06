
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
		<footer class="post-footer clear">
			<span class="post-tags clear">
				<?php $category = get_the_category(); if($category[0]){ echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; }?>
				<?php the_tags((''), ''); ?>
			</span>
		</footer>
	</article>
	<?php if (! is_search()) : ?>
		<section class="post-next-prev clear">
			<span class="prev"><?php if (get_previous_post()) { previous_post_link('%link');} else {echo "已经是第一篇了";} ?></span>
			<span class="next"><?php if (get_next_post()) { next_post_link('%link');} else {echo "已经是最后一篇了";} ?></span>
		</section>
	<?php endif;?>
<?php endwhile; ?>
<div class="comments"><?php comments_template(); ?></div>
<?php get_footer(); ?>
