<?
/*
Template Name: Residences Page
*/
?>

<? get_header(); ?>
					
					<? if (is_page('gallery')) : ?>

						<?
							$args = array(
								'post_type' => 'gallery',
								'post_status' => 'publish',
								'nopaging' => true,
								'post_per_page' => -1,
								'orderby' => 'none'
							);
							$gallery = new WP_Query($args);
						?>

						<? if ( ! empty($gallery->posts)) : ?>

							<div class="gallery">
							
								<h3 class="light reset">Gallery</h3>
								
								<div id="slider" class="clear-both">
							
									<ul class="ul-reset reset">

									<? foreach($gallery->posts as $post) : ?>
										<? 
										$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

										if (strlen($post->post_content) > 120) {
											$content = substr($post->post_content, 0, 120);
											$content .= '...';
										} else {
											$content = $post->post_content;
										}
										?>
										<li>

											<img src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=570&h=377'; ?>">
											
											<h4 class="bold reset"><?= $post->post_title; ?></h4>
											
											<p><?= $content; ?></p>

										</li>
										<? 
										$image = null; 
										$content = null;
										?>
									<? endforeach; ?>

									</ul>

								</div>
							
							</div>

						<? else : ?>

							<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>
						
				    <? endif; ?>

					<? elseif (is_page('floor-plans')) : ?>

						<? if (have_posts()) : while (have_posts()) : the_post(); ?>
											   
						    <? the_content(); ?>
						
					    <? endwhile; else : ?>
						
				    		<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>
						
					    <? endif; ?>

						<? elseif (is_page('features')) : ?>

						<h3 class="light reset">Features</h3>

							<? if (have_posts()) : while (have_posts()) : the_post(); ?>
											   
						    <? the_content(); ?>
						
					    <? endwhile; else : ?>
						
				    		<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>
						
					    <? endif; ?>

					<? endif; ?>

<? get_footer(); ?>