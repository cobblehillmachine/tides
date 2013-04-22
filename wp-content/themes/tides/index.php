<?
/* News Page */
?>

<? get_header(); ?>
									
						<div class="posts">

					    <? 
					    if (have_posts()) : while (have_posts()) : the_post();
					    	$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
					    ?>
					
					    <article id="post-<? the_ID(); ?>" <? post_class('clearfix'); ?> role="article">
								
								<div class="post-thumbnail">

										<? if (is_bool($image)) : ?>

										<img src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/nothumb.gif&q=100&w=300&h=187'; ?>">

										<img class="tablet-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/nothumb.gif&q=100&w=384&h=187'; ?>">

										<img class="mobile-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/nothumb.gif&q=100&w=320&h=187'; ?>">

										<? else : ?>

										<img src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=300&h=187'; ?>">

										<img class="tablet-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=384&h=187'; ?>">

										<img class="mobile-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=320&h=187'; ?>">

										<? endif; ?>

										<div class="light datetime">
												
											<?= get_the_date('m-d-y'); ?>

										</div>

										<h2>
										
											<? the_title(); ?>
										
										</h2>
									
								</div>
					
						    <section class="post-body entry-content clearfix">
						    	
						    	<h2 class="title"><? the_title(); ?></h2>
							    
							    <div class="excerpt"><?= the_excerpt(); ?></div>
							    
							    <a class="read-more semibold tides-inactive_sub_nav" href="<? the_permalink(); ?>">Read Full Article</a>

						    </section>
					
					    </article>
					
							<? 
							$image = null; 
							endwhile; 
							else : 
							?>
					    
	        	    <h1><? _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					
					    <? endif; ?>

					  </div>

<? get_footer(); ?>
