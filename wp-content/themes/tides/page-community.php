<?
/*
Template Name: Community Page
*/
?>

<? get_header(); ?>

					<? if (is_page('amenities')) : ?>

						<? if (have_posts()) : while (have_posts()) : the_post(); ?>

					    <div class="amenities">

				            <h3 class="reset light">Tides owners have total access to onsite Amenities that will surpass your greatest expectations including:</h3>

					    	<? the_content(); ?>

				    	</div>

                        <? endwhile; else : ?>

                            <? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

                        <? endif; ?>

					<? elseif (is_page('bucket-list')) : ?>

						<? if (have_posts()) : while (have_posts()) : the_post(); ?>

					    <div class="bucket-list">

                            <h3 class="light reset">Charleston Bucket List</h3>

					    	<? the_content(); ?>

				    	</div>

				    <? endwhile; else : ?>

			    		<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

				    <? endif; ?>

				  <? elseif (is_page('meet-your-new-neighrbors')) : ?>

				  	<?
							$args = array(
								'post_type' => 'neighbors',
								'post_status' => 'publish',
								'nopaging' => true,
								'post_per_page' => -1,
								'orderby' => 'none'
							);
							$neighbors = new WP_Query($args);
						?>

						<? if (!empty($neighbors->posts)) : ?>

							<div class="neighbors">

								<h3 class="light reset">Meet Your New Neighbors</h3>

								<div class="carousel carousel-neighbors">

									<ul class="ul-reset reset" id="floorplan-slider">

									<? foreach ($neighbors->posts as $post) : ?>

										<? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

										<li class="neighbor left inline">

                                            <p><?= $post->post_title; ?></p>

											<a title="<?= $post->post_title; ?>" rel="shadowbox[neighbor]" href="<?= $image[0]; ?>">

												<img alt="<?= $post->post_title; ?>" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=175&h=230'; ?>">

												<? if (get_post_meta($post->ID, 'Neighbor - Comment', true) != "") : ?>
													<input type="hidden" name="neighbor-comment" value="<?= get_post_meta($post->ID, 'Neighbor - Comment', true); ?>">
												<? endif; ?>

											</a>

										</li>

									<? endforeach; ?>

									</ul>

								</div>

							</div>

			    <? else : ?>

		    		<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

			    <? endif; ?>

			  <? endif; ?>

<? get_footer(); ?>
