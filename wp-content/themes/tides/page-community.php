<?
/*
Template Name: Community Page
*/
?>

<? get_header(); ?>

					<? if (is_page('amenities')) : ?>

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

								<ul class="ul-reset reset" id="floorplan-slider">

								<? foreach ($neighbors->posts as $post) : ?>
									
									<li class="neighbor left inline">
										
										<h4 class="reset bold"><?= $post->post_title; ?></h4>

									</li>

								<? endforeach; ?>

								</ul>

							</div>
				
			    <? else : ?>
				
		    		<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>
					
			    <? endif; ?>

			  <? endif; ?>

<? get_footer(); ?>