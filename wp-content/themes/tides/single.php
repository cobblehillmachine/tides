<? get_header(); ?>

						<div id="nav-mobile-single">
							<? previous_post_link('%link'); ?>
							<? next_post_link('%link'); ?>
							<a href="<? bloginfo('url'); ?>/news" class="back"></a>
						</div>

						<? 
						if (have_posts()) : while (have_posts()) : the_post(); 
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
						?>
							
							<article id="post-<? the_ID(); ?>" <? post_class('clearfix left news-post'); ?> role="article">
						
								<? if (is_bool($image)) : ?>

								<div class="gallery-thumb left"><img src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/nothumb.gif&q=100&w=507&h=379'; ?>" alt=""></div>
								
								<div class="mobile-gallery-thumb left"><img src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/nothumb.gif&q=100&w=320&h=187'; ?>" alt=""></div>

								<? else : ?>

								<div class="gallery-thumb left"><img src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=507&h=379'; ?>" alt=""></div>
								
								<div class="mobile-gallery-thumb left"><img src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=320&h=187'; ?>" alt=""></div>

								<? endif; ?>

								<div class="content left">
									
									<div class="light datetime">
												
										<? the_date('m-d-y'); ?>

									</div>

									<h3 class="light left reset"><? the_title(); ?></h3>
									
									<p class="left mobile-content">
										<? the_content(); ?>
									</p>
				
								</div>
					
							</article>
					
						<? endwhile; ?>			
					
						<? else : ?>
					
							<article id="post-not-found" class="hentry clearfix left">
			    			
			    			<h1><? _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
							
							</article>
					
						<? endif; ?>

<? get_footer(); ?>
