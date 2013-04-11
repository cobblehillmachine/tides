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

									<? foreach ($gallery->posts as $post) : ?>
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

					<? elseif (is_page('listings')) : ?>

						<?
							$args = array(
								'post_type' => 'floorplans',
								'post_status' => 'publish',
								'nopaging' => true,
								'post_per_page' => -1,
								'orderby' => 'none'
							);
							$floorplans = new WP_Query($args);
						?>

						<? if (!empty($floorplans->posts)) : ?>

							<div class="floorplans">

								<h3 class="light reset">Listings</h3>

								<div class="carousel carousel-residencies">

									<ul class="ul-reset reset">
									
									<? foreach ($floorplans->posts as $post) : ?>
										
										<? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

										<li class="floorplan left inline">
											
											<h4 class="reset bold"><?= $post->post_title; ?></h4>

											<p class="reset"><?= get_post_meta($post->ID, 'Floorplan - Short Description', true); ?></p>

											<p class="reset bold price"><?= get_post_meta($post->ID, 'Floorplan - Price', true); ?></p>

											<a href="<?= $image[0]; ?>">View Floorplan</a>

											<br>

											<a href="<?= get_post_meta($post->ID, 'Floorplan - MLS Details', true); ?>">View Details</a>

											<input type="hidden" name="pdf" value="<?= get_post_meta($post->ID, 'Floorplan - PDF'); ?>">

										</li>

										<? $image = null; ?>
									
									<? endforeach; ?>

									</ul>

								</div>

							</div>

						<? else : ?>
					
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
