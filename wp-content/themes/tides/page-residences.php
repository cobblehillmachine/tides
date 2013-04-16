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
								
								<div class="carousel carousel-gallery">
							
									<ul class="ul-reset reset">

									<? foreach ($gallery->posts as $post) : ?>

										<? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
										
										<li class="inline gallery-image">
				
											<a title="<?= $post->post_title; ?>" rel="shadowbox[gallery]" href="<?= $image[0]; ?>">

												<img alt="<?= $post->post_title; ?>" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=175&h=175'; ?>">
			
												<? if (get_post_meta($post->ID, 'Gallery - Short Description', true) != "") : ?>
													<input type="hidden" name="gallery-detail" value="<?= get_post_meta($post->ID, 'Gallery - Short Description', true); ?>">
												<? endif; ?>

											</a>

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

								<div class="carousel carousel-floorplans">

									<ul class="ul-reset reset">
									
									<? foreach ($floorplans->posts as $post) : ?>
										
										<? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
										<? $pdf = get_post_meta($post->ID, 'Floorplan - PDF'); ?>

										<li class="floorplan left inline">
											
											<h4 class="reset bold"><?= $post->post_title; ?></h4>

											<p class="reset"><?= get_post_meta($post->ID, 'Floorplan - Short Description', true); ?></p>

											<p class="reset bold price"><?= get_post_meta($post->ID, 'Floorplan - Price', true); ?></p>

											<a title="<?= $post->post_title; ?>" rel="shadowbox[floorplan]" href="<?= $image[0]; ?>">View Floorplan</a>

											<br>

											<a href="<?= get_post_meta($post->ID, 'Floorplan - MLS Details', true); ?>">View Details</a>

											<? if (get_post_meta($post->ID, 'Floorplan - PDF') != "") : ?>
												<input type="hidden" name="floorplan-pdf" value="<?= $pdf[0]; ?>">
											<? endif; ?>

											<? if (get_post_meta($post->ID, 'Floorplan - Short Description', true) != "") : ?>
												<input type="hidden" name="floorplan-detail" value="<?= get_post_meta($post->ID, 'Floorplan - Short Description', true); ?>">
											<? endif; ?>

										</li>

										<? $image = null; ?>
										<? $pdf = null; ?>
									
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
