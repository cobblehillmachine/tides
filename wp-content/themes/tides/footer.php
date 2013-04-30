					</div> <? //end mobile-box ?>

				</div> <? //end page-content ?>

				<div id="layout-footer"></div>

			</div> <? //end #container ?>

			<? if (is_page('home')) : ?>

			<div id="mobile-sidebar-content" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset bold">New waterfront residences at a significant discount.</h2>

					<p>The Tides waterfront condominiums overlook Charleston Harbor and the city’s historic skyline. The residences include luxurious features like semi-private elevators, hardwood floors, Viking &#174; appliances, and more than generous floor plans. And right now, several new residences are being made available at a significant discount from the original list price.</p>

					<p>Sign up for email updates to be the first to know about pricing, timing and improvements to this select group of homes.</p>

				</div>

			</div>

			<div id="mobile-contact-form" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset clear-both">Stay in Touch.</h2>

					<p class="clear-both">The sales team and property managers at the Tides are happy to answer any questions you may have – just fill out the contact form below, give us a call or send an email. You can also drop by the Harbor House, our onsite amenities building and request to speak with Mac or Patty.</p>


					<div class="wpcf7" id="wpcf7-f51-t1-o1">

						<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post" class="wpcf7-form">

							<div class="input-wrap max-width">

								<label for="first_name" class="placeholder">First Name *</label>

								<span class="wpcf7-form-control-wrap first_name">

									<input type="text" name="first_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="last_name" class="placeholder">Last Name *</label>

								<span class="wpcf7-form-control-wrap last_name">

									<input type="text" name="last_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="email" class="placeholder">Email *</label>

								<span class="wpcf7-form-control-wrap email">

									<input type="text" name="email" value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" size="40" />

								</span>

								</div>

							<div class="input-wrap max-width">

								<label for="phone" class="placeholder">Phone</label>

								<span class="wpcf7-form-control-wrap phone">

									<input type="text" name="phone" value="" class="wpcf7-form-control wpcf7-text" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width input-message">

								<label for="description" class="placeholder">Message</label>

								<span class="wpcf7-form-control-wrap description">

									<textarea name="description" class="wpcf7-form-control  wpcf7-textarea wpcf7-validates-as-required" cols="40" rows="10"></textarea>

								</span>

							</div>

							<div class="input-wrap max-width input-button">

								<input type="submit" value="Discover More" class="wpcf7-form-control  wpcf7-submit left bold" />

							</div>

							<div style='display:none;'>
								<input type="hidden" name="lead_source" value="Tides Website" class="wpcf7-hidden" />
								<input type="hidden" name="oid" value="00Dd0000000gUQD" class="wpcf7-hidden" />
								<input type="hidden" name="retURL" value="<?= salesforce_callback(); ?>" class="wpcf7-hidden" />
							</div>

							<div class="wpcf7-response-output wpcf7-display-none"></div>

						</form>

					</div>

				</div>

			</div>

      <? elseif (is_page('amenities') || is_page('community') || is_page('meet-your-new-neighrbors') || is_page('bucket-list')) : ?>

			<? if (is_page('amenities')) : ?>

			<div id="mobile-sidebar-content" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset bold">Tides owners have total access to onsite Amenities that will surpass your greatest expectations including:</h2>

					<p>&bull; An integrated beach entry pool with sun and shade deck</p>

					<p>&bull; Cabana bar and summer kitchen</p>

					<p>&bull; Spa and health club with sauna, steam, and massage rooms for personal training</p>

					<p>&bull; Finely appointed lobbies and verandas with two-story atrium where you can greet guests</p>

					<p>&bull; Full-time property management and engineering services available</p>

				</div>

			</div>

			<? else : ?>

			<div id="mobile-sidebar-content" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset bold">COMMUNITY</h2>

					<p>The perfect place to call home. With top quality amenities, full-time property management and neighbors who you can gladly call friends, the Tides is more than your residence; it’s your community.</p>

				</div>

			</div>

			<? endif; ?>

			<div id="mobile-nav-community" class="left clear-both">

				<ul class="ul-reset reset">
					<li <?= is_page('amenities') ? 'class="current"': null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/community/amenities'); ?>">Amenities</a></li>

					<li <?= is_page('meet-your-new-neighrbors') ? 'class="current"': null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/community/meet-your-new-neighbors'); ?>">Meet Your New Neighrbors</a></li>

					<? if (is_page('meet-your-new-neighrbors')) : ?>

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

					<li class="mobile-neighbors">

						<div class="carousel mobile-carousel-neighbors">

							<ul class="ul-reset reset">

							<? foreach ($neighbors->posts as $post) : ?>

								<? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

								<li class="neighbor left inline">

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

						<div class="carousel phone-carousel-neighbors">

							<ul class="ul-reset reset">

							<? foreach ($neighbors->posts as $post) : ?>

								<? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

								<li class="neighbor left inline">

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

					</li>

					<? endif; ?>

					<li <?= is_page('bucket-list') ? 'class="current"': null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/community/bucket-list'); ?>">Bucket List</a></li>

					<? if (is_page('bucket-list')) : ?>

					<li class="mobile-bucket-list">

						<? if (have_posts()) : while (have_posts()) : the_post(); ?>

					    <div class="bucket-list">

					    	<? the_content(); ?>

				    	</div>

				    <? endwhile; else : ?>

			    		<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

				    <? endif; ?>

			    </li>

			  	<? endif; ?>

				</ul>

			</div>

			<div id="mobile-contact-form" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset clear-both">Stay in Touch.</h2>

					<p class="clear-both">The sales team and property managers at the Tides are happy to answer any questions you may have – just fill out the contact form below, give us a call or send an email. You can also drop by the Harbor House, our onsite amenities building and request to speak with Mac or Patty.</p>

					<div class="wpcf7" id="wpcf7-f51-t1-o1">

						<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post" class="wpcf7-form">

							<div class="input-wrap max-width">

								<label for="first_name" class="placeholder">First Name *</label>

								<span class="wpcf7-form-control-wrap first_name">

									<input type="text" name="first_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="last_name" class="placeholder">Last Name *</label>

								<span class="wpcf7-form-control-wrap last_name">

									<input type="text" name="last_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="email" class="placeholder">Email *</label>

								<span class="wpcf7-form-control-wrap email">

									<input type="text" name="email" value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" size="40" />

								</span>

								</div>

							<div class="input-wrap max-width">

								<label for="phone" class="placeholder">Phone</label>

								<span class="wpcf7-form-control-wrap phone">

									<input type="text" name="phone" value="" class="wpcf7-form-control wpcf7-text" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width input-message">

								<label for="description" class="placeholder">Message</label>

								<span class="wpcf7-form-control-wrap description">

									<textarea name="description" class="wpcf7-form-control  wpcf7-textarea wpcf7-validates-as-required" cols="40" rows="10"></textarea>

								</span>

							</div>

							<div class="input-wrap max-width input-button">

								<input type="submit" value="Discover More" class="wpcf7-form-control  wpcf7-submit left bold" />

							</div>

							<div style='display:none;'>
								<input type="hidden" name="lead_source" value="Tides Website" class="wpcf7-hidden" />
								<input type="hidden" name="oid" value="00Dd0000000gUQD" class="wpcf7-hidden" />
								<input type="hidden" name="retURL" value="<?= salesforce_callback(); ?>" class="wpcf7-hidden" />
							</div>

							<div class="wpcf7-response-output wpcf7-display-none"></div>

						</form>

					</div>


				</div>

			</div>

			<? elseif (is_page('residences') || is_page('listings') || is_page('gallery') || is_page('features')) : ?>

			<div id="mobile-sidebar-content" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset bold">Spacious waterfront residences offering luxurious features.</h2>

					<p>Overlooking the harbor, within walking distance of shopping and services but away from the tourist crowds, there simply isn’t a better location in the Charleston area. These residences offer a variety of 2-, 3-, and 4- bedroom plans featuring an abundance of extras that make calling this place home even more special.</p>

					<p>It’s time life was a little easier. <b>It’s time to come home to the Tides.</b></p>

				</div>

			</div>

			<div id="mobile-nav-residencies" class="left clear-both">

				<ul class="ul-reset reset">

					<li <?= is_page('listings') ? 'class="current"' : null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/residencies/listings'); ?>">Listings</a></li>

					<? if (is_page('listings')) : ?>

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

							<li class="mobile-floorplans">

								<div class="carousel mobile-carousel-floorplans">

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

								<div class="carousel phone-carousel-floorplans">

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

							</li>

				    <? else : ?>

		    			<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

				    <? endif; ?>

				  <? endif; ?>

					<li <?= is_page('gallery') ? 'class="current"' : null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/residencies/gallery'); ?>">Gallery</a></li>

					<? if (is_page('gallery')) : ?>

						<?
						$args = array(
							'post_type'   	=> 'gallery',
							'post_status' 	=> 'publish',
							'nopaging' 			=> true,
							'post_per_page' => -1,
							'orderby' 			=> 'none'
						);
						$gallery = new WP_Query($args);
						?>

						<? if ( ! empty($gallery->posts)) : ?>

							<li class="mobile-gallery">

								<div class="carousel mobile-carousel-gallery">

									<ul class="ul-reset reset">

									<? foreach($gallery->posts as $post) : ?>

										<? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

										<li class="gallery-image inline">

											<a title="<?= $post->post_title; ?>" href="<?= $image[0]; ?>" rel="shadowbox[mobilegallery]">

												<img alt="<?= $post->post_title; ?>" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=175&h=175'; ?>">

												<? if (get_post_meta($post->ID, 'Gallery - Short Description', true) != "") : ?>
													<input type="hidden" name="gallery-detail" value="<?= get_post_meta($post->ID, 'Gallery - Short Description', true); ?>">
												<? endif; ?>

											</a>

										</li>
										<? $image = null; ?>

									<? endforeach; ?>

									</ul>

								</div>

								<div class="carousel phone-carousel-gallery">

									<ul class="ul-reset reset">

									<? foreach($gallery->posts as $post) : ?>

										<? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

										<li class="gallery-image inline">

											<a title="<?= $post->post_title; ?>" href="<?= $image[0]; ?>" rel="shadowbox[mobilegallery]">

												<img alt="<?= $post->post_title; ?>" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=150&h=150'; ?>">

												<? if (get_post_meta($post->ID, 'Gallery - Short Description', true) != "") : ?>
													<input type="hidden" name="gallery-detail" value="<?= get_post_meta($post->ID, 'Gallery - Short Description', true); ?>">
												<? endif; ?>

											</a>

										</li>
										<? $image = null; ?>

									<? endforeach; ?>

									</ul>

								</div>

							</li>

						<? else : ?>

							<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

				    <? endif; endif; ?>

					<li <?= is_page('features') ? 'class="current"' : null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/residencies/features'); ?>">Features</a></li>

					<? if (is_page('features')) : ?>

						<? if (have_posts()) : while (have_posts()) : the_post(); ?>

							    <li class="page-content"><? the_content(); ?></li>

						    <? endwhile; else : ?>

					    		<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

						    <? endif; ?>

					<? endif; ?>

				</ul>

			</div>

			<div id="mobile-contact-form" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset left">Stay in Touch.</h2>

					<p class="clear-both">The sales team and property managers at the Tides are happy to answer any questions you may have – just fill out the contact form below, give us a call or send an email. You can also drop by the Harbor House, our onsite amenities building and request to speak with Mac or Patty.</p>

					<div class="wpcf7" id="wpcf7-f51-t1-o1">

						<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post" class="wpcf7-form">

							<div class="input-wrap max-width">

								<label for="first_name" class="placeholder">First Name *</label>

								<span class="wpcf7-form-control-wrap first_name">

									<input type="text" name="first_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="last_name" class="placeholder">Last Name *</label>

								<span class="wpcf7-form-control-wrap last_name">

									<input type="text" name="last_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="email" class="placeholder">Email *</label>

								<span class="wpcf7-form-control-wrap email">

									<input type="text" name="email" value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" size="40" />

								</span>

								</div>

							<div class="input-wrap max-width">

								<label for="phone" class="placeholder">Phone</label>

								<span class="wpcf7-form-control-wrap phone">

									<input type="text" name="phone" value="" class="wpcf7-form-control wpcf7-text" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width input-message">

								<label for="description" class="placeholder">Message</label>

								<span class="wpcf7-form-control-wrap description">

									<textarea name="description" class="wpcf7-form-control  wpcf7-textarea wpcf7-validates-as-required" cols="40" rows="10"></textarea>

								</span>

							</div>

							<div class="input-wrap max-width input-button">

								<input type="submit" value="Discover More" class="wpcf7-form-control  wpcf7-submit left bold" />

							</div>

							<div style='display:none;'>
								<input type="hidden" name="lead_source" value="Tides Website" class="wpcf7-hidden" />
								<input type="hidden" name="oid" value="00Dd0000000gUQD" class="wpcf7-hidden" />
								<input type="hidden" name="retURL" value="<?= salesforce_callback(); ?>" class="wpcf7-hidden" />
							</div>

							<div class="wpcf7-response-output wpcf7-display-none"></div>

						</form>

					</div>


				</div>

			</div>

			<? elseif (is_page('neighborhood')) : ?>

			<div id="mobile-sidebar-content" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset bold">The #1 city in the world. Just outside your window.</h2>

					<p>Breathe in a sunrise over the gentle Lowcountry marsh. Raise a toast against the backdrop of the iconic Cooper River Bridge. Tie up your sailboat right on the Charleston Harbor. Premier shopping. Acclaimed dining. Pristine beaches. Live just minutes from the best Charleston has to offer.</p>

				</div>

			</div>

			<div id="mobile-nav-neighborhood" class="left clear-both">

				<div class="mobile-wrap">

					<ul class="ul-reset reset">

						<li class="parent">

							<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" target="_blank" href="<?= content_url() . '/uploads/2013/01/county-map.pdf'; ?>">Area Map</a>

						</li>

						<li class="hide sub-child">

							<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/County_Map.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
							<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/County_Map.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

							<div class="location-content">

								<h3 class="bold">Charleston County</h3>

							</div>

						</li>

						<li class="parent">

							<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Parks &amp; Recreation</a>

						</li>

						<li class="child hide">

							<ol class="reset">
								<li class="sub-parent"><a href="#">Mt. Pleasant Waterfront Park &amp; Pier</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Waterfront-Park.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Waterfront-Park.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Mt. Pleasant Waterfront Park &amp; Pier</h3>

										<p class="reset">Enjoy a morning stroll along the Cooper River.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&q=71+harry+hallman+boulevard&safe=off&ie=UTF-8&ei=bEnzULm5PJDo9gT7rIG4BA&sqi=2&ved=0CAgQ_AUoAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Hampton Park</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Hampton-Park.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Hampton-Park.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Hampton Park</h3>

										<p class="reset">Take in the sites and sounds of historic downtown Charleston.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&authuser=0&q=30+mary+murray+drive+charleston+sc&ie=UTF-8&hq=&hnear=0x88fe7a51c59920f9:0xa1f70947441ba2f8,Mary+Murray+Dr,+Charleston,+SC&gl=us&ei=10nzUK6KE4Wc9gTb4oD4Dw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Patriots Point Marina</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Patriots-Point-Museum.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Patriots-Point-Museum.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Patriots Point Marina</h3>

										<p class="reset">Moor your sailboat just a short walk from the Tides.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=24+Patriots+Point+Road&ie=UTF-8&hq=&hnear=0x88fe709722e43d0f:0x1d24bc617cf61415,24+Patriots+Point+Rd,+Mt+Pleasant,+SC+29464&gl=us&ei=BkrzUK-5IIK88wSCoYHoCQ&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Shem Creek</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Shem-Creek.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Shem-Creek.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Shem Creek</h3>

										<p class="reset">Savor some of the freshest seafood the Lowcountry has to offer.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&q=shem+creek&safe=off&ie=UTF-8&ei=J0rzUNngA4bA9QSnhoD4CA&sqi=2&ved=0CAgQ_AUoAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Patriots Point Golfcourse</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Patriots-Point-Golf-Course.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Patriots-Point-Golf-Course.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Patriots Point Golf Course</h3>

										<p class="reset">Spend a day on the links.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=1+Patriots+Point+Road&ie=UTF-8&hq=&hnear=0x88fe70ed2dd8ef63:0xf9a59e09fc55182e,1+Patriots+Point+Rd,+Mt+Pleasant,+SC+29464&gl=us&ei=P0rzUKK3Lof68QSc-ICYAw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Tennis</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Tennis.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Tennis.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Tennis</h3>

										<p class="reset">Perfect your serve at the Mt. Pleasant Tennis Complex.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=889+Whipple+Road&ie=UTF-8&hq=&hnear=0x88fe71eed40525ab:0x1fff31eb7e18cfdf,889+Whipple+Rd,+Mt+Pleasant,+SC+29464&gl=us&ei=XUrzUN7KMoe88ASdzoHIAw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Sullivan's Island Beach</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Sullivans.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Sullivans.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Sullivan’s Island Beach</h3>

										<p class="reset">Lounge the day away on the beach at nearby Sullivan’s Island.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=2050-B+Middle+Street&ie=UTF-8&hq=&hnear=0x88fe7151fa1b11a3:0x85595d8f91a05b67,2050+Middle+St,+Sullivan's+Island,+SC+29482&gl=us&ei=sUrzUPrfC4LU9QTEuICYCA&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

							</ol>

						</li>

						<li class="parent">

							<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Arts &amp; Culture</a>

						</li>

						<li class="child hide">

							<ol class="reset">

								<li class="sub-parent"><a href="#">King Street</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/King-Street.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/King-Street.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">King Street</h3>

										<p class="reset">Spend the day shopping on the famous King Street in downtown Charleston.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&ie=UTF-8&q=king+street+charleston+sc&fb=1&gl=us&hq=king+street&hnear=0x88fe7a42dca82477:0x35faf7e0aee1ec6b,Charleston,+SC&ei=QPPpUJaZDIiI9QTDr4HQBg&ved=0CK4BEMgT" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Boone Hall Plantation</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Boone-Hall-Plantation.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Boone-Hall-Plantation.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Boone Hall Plantation</h3>

										<p class="reset">Walk along one of South Carolina’s most treasured landmarks.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=1235+Long+Point+Road&ie=UTF-8&hq=&hnear=0x88fe6dfef9c25c67:0x85297e4e3614e122,1235+State+Road+S-10-97,+Mt+Pleasant,+SC+29464&gl=us&ei=ZkvzUOWBJ5La8ASV14CACw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Patriots Point Naval and Maritime Museum</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Patriots-Point-Museum.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Patriots-Point-Museum.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Patriots Point Naval and Maritime Museum</h3>

										<p class="reset">Honor the heroes remembered at the Patriots Point Naval and Maritime Museum.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=1+Patriots+Point+Road&ie=UTF-8&hq=&hnear=0x88fe70ed2dd8ef63:0xf9a59e09fc55182e,1+Patriots+Point+Rd,+Mt+Pleasant,+SC+29464&gl=us&ei=gUvzUOOeFojY8gSVnIGABw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Sweetgrass Cultural Arts Pavilion</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Sweetgrass-Cultural-Arts.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Sweetgrass-Cultural-Arts.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Sweetgrass Cultural Arts Pavilion</h3>

										<p class="reset">Learn more about Charleston’s world-famous sweetgrass creations.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=71+Harry+Hallman+Boulevard&ie=UTF-8&ei=nkvzULeYHIim9gTh94HwCA&ved=0CAgQ_AUoAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Belle Hall Shopping Center</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Belle-Hall.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Belle-Hall.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Belle Hall Shopping Center</h3>

										<p class="reset">Find the perfect gift at one of Belle Hall’s 60 shops.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&ie=UTF-8&q=Belle+Hall+Shopping+Center&fb=1&gl=us&hq=Belle+Hall+Shopping+Center&hnear=0x88fe7a42dca82477:0x35faf7e0aee1ec6b,Charleston,+SC&cid=0,0,2236134223561501367&ei=u0vzUMXlEYXU9AS3-YGQAg&ved=0CI4BEPwSMAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Mount Pleasant Towne Centre</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Towne-Center.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Towne-Center.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Mount Pleasant Towne Centre</h3>

										<p class="reset">Find what you need for a night on the town.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=1600+Palmetto+Grande+Dr&ie=UTF-8&hq=&hnear=0x88fe71f622b6a8a3:0x4b572ec0dd2cdb51,1600+Palmetto+Grande+Dr,+Mt+Pleasant,+SC+29464&gl=us&ei=z0vzUL3PGI3s8gThj4CoAw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Gaillard Auditorium</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Gaillard-Auditorium.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Gaillard-Auditorium.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Gaillard Auditorium</h3>

										<p class="reset">Enjoy world-class performances right here in the Lowcountry.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=77+Calhoun+Street&ie=UTF-8&hq=&hnear=0x88fe7a6d81662a45:0x26cbd174b422d007,77+Calhoun+St,+Charleston,+SC+29403&gl=us&ei=6EvzULnsJoHK9QSdnYGYBA&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

							</ol>

						</li>

						<li class="parent">

							<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Dining</a>

						</li>

						<li class="child hide">

							<ol class="reset">

								<li class="sub-parent"><a href="#">Basil</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Basil.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Basil.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Basil &ndash; Phone: 843.606.9641</h3>

										<p class="reset">A savory Thai dining experience.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=1465+Long+Grove+Drive&ie=UTF-8&hq=&hnear=0x88fe72178a367d8d:0x2dd2e3f913f2cc4,1465+Long+Grove+Dr,+Mt+Pleasant,+SC+29464&gl=us&ei=AkzzUKHHKIbQ9ASDxYHQCQ&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Crave</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Crave.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Crave.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Crave &ndash; Phone: 843.884.1177</h3>

										<p class="reset">Award-winning cuisine right in Mt. Pleasant.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=1968-O+Riviera+Dr&ie=UTF-8&hq=&hnear=0x88fe7217940e9011:0x3a96d90082f0fc77,1968+Riviera+Dr,+Mt+Pleasant,+SC+29464&gl=us&ei=I0zzUKm-GJLa8ASV14CACw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Langdon’s Restaurant</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Langdons.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Langdons.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Langdon’s Restaurant &amp; Wine Bar &ndash; Phone: 843.388.9200</h3>

										<p class="reset">A modern twist on traditional Southern fare.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=778-105+S+Shelmore+Blvd&ie=UTF-8&ei=M0zzUK_sCoW09QS8uoHgBg&ved=0CAgQ_AUoAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Longpoint Grill</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Long-Point-Grill.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Long-Point-Grill.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Longpoint Grill &ndash; Phone: 843.849.0206</h3>

										<p class="reset">A local favorite.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=479+Long+Point+Rd&ie=UTF-8&hq=&hnear=0x88fe71d25dbda5cf:0x307ab547b2f1713d,479+State+Road+S-10-97,+Mt+Pleasant,+SC+29464&gl=us&ei=rUzzUO-AOpCy9gTu7YHIDQ&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Old Village Post House</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Old-Village.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Old-Village.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Old Village Post House &ndash; Phone: 843.388.8935</h3>

										<p class="reset">A staple in Mt. Pleasant.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=101+Pitt+St&ie=UTF-8&hq=&hnear=0x88fe70e22e109bcb:0x9dc2e4abe6dd25a6,101+Pitt+St,+Mt+Pleasant,+SC+29464&gl=us&ei=w0zzUILtCY249gSXeg&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Opal</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Opal.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Opal.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Opal &ndash; Phone: 843.654.9070</h3>

										<p class="reset">A contemporary fine-dining experience.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=1960+Riviera+Dr&ie=UTF-8&hq=&hnear=0x88fe7217e8f53a73:0x601d4ad2287626bf,1960+Riviera+Dr,+Mt+Pleasant,+SC+29466&gl=us&ei=1EzzULnKMorY9ASd4YCIBg&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Red Drum</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Red-Drum.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Red-Drum.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Red Drum &ndash; Phone: 843.849.0313</h3>

										<p class="reset">A fusion of Southern and Southwestern flavors.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=819+Coleman+Blvd&ie=UTF-8&hq=&hnear=0x88fe71050ff9a425:0xe5e8a5e1d844f51,819+Coleman+Blvd,+Mt+Pleasant,+SC+29464&gl=us&ei=5EzzUIK8Doj-9QSNkoDIBg&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

							</ol>

						</li>

						<li class="parent">

							<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Grocery</a>

						</li>

						<li class="child hide">

							<ol class="reset">

								<li class="sub-parent"><a href="#">Harris Teeter</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Harris-Teeter.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Harris-Teeter.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Harris Teeter</h3>

										<p class="reset">Head across the street and do some grocery shopping.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=920+Houston+Northcutt+Blvd&ie=UTF-8&hq=&hnear=0x88fe70f67d005199:0xb42bb8667d0979dd,920+Houston+Northcutt+Blvd,+Mt+Pleasant,+SC+29464&gl=us&ei=-EzzUNHLMIbc9ATwtYC4CQ&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Whole Foods</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Whole-Foods.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Whole-Foods.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Whole Foods</h3>

										<p class="reset">Grab a quick bite to eat just steps from your door.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=923+Houston+Northcutt+Blvd&ie=UTF-8&hq=&hnear=0x88fe70f641a0ab9f:0xfaeaf87d79ebeba0,923+Houston+Northcutt+Blvd,+Mt+Pleasant,+SC+29464&gl=us&ei=GU3zUP-MCYWc9gTb4oD4Dw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Trader Joe’s</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Trader-Joes.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Trader-Joes.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Trader Joe’s</h3>

										<p class="reset">Find just what you need at this famous specialty store just down the street.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=401+Johnnie+Dodds+Boulevard&ie=UTF-8&hq=&hnear=0x88fe70586c5556e3:0x9431cd820e2dd64b,401+Johnnie+Dodds+Blvd,+Mt+Pleasant,+SC+29464&gl=us&ei=WU3zUMT1GJC88wTUu4HoBQ&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">New York Butcher Shoppe</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/NY-Butcher-Shop.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/NY-Butcher-Shop.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">New York Butcher Shoppe</h3>

										<p class="reset">Pick up fresh steak for that special dinner.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=1260+Ben+Sawyer+Blvd&ie=UTF-8&hq=&hnear=0x88fe710e9eabace1:0x1bcdfd776b48f3b2,1260+Ben+Sawyer+Blvd,+Mt+Pleasant,+SC+29464&gl=us&ei=dE3zUI7YB46C8QTGuoCQDw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Kudzu Bakery</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Kudzu.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Kudzu.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Kudzu Bakery</h3>

										<p class="reset">Enjoy the freshest baked goods at a Mt. Pleasant mainstay.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=794+Coleman+Blvd&ie=UTF-8&hq=&hnear=0x88fe7104f199eed3:0xb516612a32bc6072,794+Coleman+Blvd,+Mt+Pleasant,+SC+29464&gl=us&ei=i03zUM2mA5SE9gSklIDYDA&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

							</ol>

						</li>

						<li class="parent">

							<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Healthcare</a>

						</li>

						<li class="child hide">

							<ol class="reset">

								<li class="sub-parent"><a href="#">MUSC</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/MUSC.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/MUSC.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">MUSC</h3>

										<p class="reset">Find acclaimed health care right in downtown Charleston.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=171+Ashley+Avenue&ie=UTF-8&hq=&hnear=0x88fe7a3f4f2dafc7:0x2d0e4baf9a42246b,171+Ashley+Ave,+Charleston,+SC+29403&gl=us&ei=nU3zUKDLF4f28gSClIGwBw&ved=0CDAQ8gEwAA" class="block bold button right">View Map</a>

									</div>

								</div>

								<li class="sub-parent"><a href="#">Roper St. Francis</a></li>

								<div class="hide sub-child">

									<img class="tablet-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Roper.jpg' . '&q=100&w=570&h=377'; ?>" alt="Parks and Rec">
									<img class="mobile-neighborhood-img" src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . content_url() . '/themes/tides/library/images/neighborhood/Roper.jpg' . '&q=100&w=320&h=187'; ?>" alt="Parks and Rec">

									<div class="location-content">

										<h3 class="bold">Roper St. Francis</h3>

										<p class="reset">Feeling under the weather? Roper St. Francis is just down the street to help.</p>

										<a target="_blank" href="https://maps.google.com/maps?hl=en&safe=off&q=3500+Highway+17+North&ie=UTF-8&ei=sE3zUOGDEoag8gTapIEg&ved=0CAgQ_AUoAA" class="block bold button right">View Map</a>

									</div>

								</div>

							</ol>

						</li>

					</ul>

				</div>

			</div>

			<div id="mobile-contact-form" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset clear-both">Stay in Touch.</h2>

					<p class="clear-both">The sales team and property managers at the Tides are happy to answer any questions you may have – just fill out the contact form below, give us a call or send an email. You can also drop by the Harbor House, our onsite amenities building and request to speak with Mac or Patty.</p>

					<div class="wpcf7" id="wpcf7-f51-t1-o1">

						<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post" class="wpcf7-form">

							<div class="input-wrap max-width">

								<label for="first_name" class="placeholder">First Name *</label>

								<span class="wpcf7-form-control-wrap first_name">

									<input type="text" name="first_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="last_name" class="placeholder">Last Name *</label>

								<span class="wpcf7-form-control-wrap last_name">

									<input type="text" name="last_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="email" class="placeholder">Email *</label>

								<span class="wpcf7-form-control-wrap email">

									<input type="text" name="email" value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" size="40" />

								</span>

								</div>

							<div class="input-wrap max-width">

								<label for="phone" class="placeholder">Phone</label>

								<span class="wpcf7-form-control-wrap phone">

									<input type="text" name="phone" value="" class="wpcf7-form-control wpcf7-text" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width input-message">

								<label for="description" class="placeholder">Message</label>

								<span class="wpcf7-form-control-wrap description">

									<textarea name="description" class="wpcf7-form-control  wpcf7-textarea wpcf7-validates-as-required" cols="40" rows="10"></textarea>

								</span>

							</div>

							<div class="input-wrap max-width input-button">

								<input type="submit" value="Discover More" class="wpcf7-form-control  wpcf7-submit left bold" />

							</div>

							<div style='display:none;'>
								<input type="hidden" name="lead_source" value="Tides Website" class="wpcf7-hidden" />
								<input type="hidden" name="oid" value="00Dd0000000gUQD" class="wpcf7-hidden" />
								<input type="hidden" name="retURL" value="<?= salesforce_callback(); ?>" class="wpcf7-hidden" />
							</div>

							<div class="wpcf7-response-output wpcf7-display-none"></div>

						</form>

					</div>

				</div>

			</div>

			<? elseif (is_page('contact-us')) : ?>

			<div id="mobile-sidebar-content" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset bold">Contact Us</h2>

					<p>The sales team and property managers at the Tides are happy to answer any questions you may have – just fill out the contact form below, give us a call or send an email. You can also drop by the Harbor House, our onsite amenities building and request to speak with Mac or Patty.</p>

				</div>

			</div>

			<div id="mobile-contact-us">

				<div class="mobile-wrap">

                   <div id="team">

                        <h3 class="reset light">The Team</h3>

                        <?
                          $args = array(
                            'post_type' => 'team',
                            'post_status' => 'publish',
                            'nopaging' => true,
                            'post_per_page' => -1,
                            'orderby' => 'none'
                          );
                          $team = new WP_Query($args);
                        ?>

                        <div <?= count($team->posts) > 4 ? 'class="carousel mobile-carousel-team"' : null; ?>>

                            <? if (!empty($team->posts)) : ?>

                            <ul class="ul-reset reset" <?= count($team->posts) < 4 ? 'id="no-carousel"' : null; ?>>

                                <? foreach ($team->posts as $post) : ?>

                                  <? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

                                  <li class="member left inline">

                                    <img src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=140&h=130'; ?>">

                                    <h4 class="semibold reset"><?= $post->post_title; ?></h4>

                                    <p class="regular"><?= get_post_meta($post->ID, 'Team - Position Title', true); ?></p>

                                    <p class="regular"><?= get_post_meta($post->ID, 'Team - Contact Phone', true); ?></p>

                                    <p class="regular"><?= get_post_meta($post->ID, 'Team - Email Address', true); ?></p>

                                  </li>

                                  <? $image = null; ?>

                                <? endforeach; ?>

                            </ul>

                        </div>

                    </div>

                    <div id="mobile-contact-info" class="left">

                        <? if (have_posts()) : while (have_posts()) : the_post(); ?>

                          <h3 class="reset light">Contact Us</h3>

                          <? the_content(); ?>

                        <? endwhile; else : ?>

                            <? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

                        <? endif; ?>

                    </div>

                    <? else : ?>

                      <? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

                    <? endif; ?>

                    <div id="mobile-map" class="left">

                        <a href="http://goo.gl/maps/yJRUl">
                          <img class="right" src="http://maps.googleapis.com/maps/api/staticmap?center=Charleston,South+Carolina,CS&amp;zoom=12&amp;size=210x210&amp;maptype=roadmap&amp;sensor=false" alt="Map of Charleston" width="210" height="210" />
                        </a>

                    </div>

                </div>

            </div>

			<div id="mobile-contact-form" class="left clear-both mobile-box">

				<div class="mobile-wrap">

					<h2 class="reset clear-both">Stay in Touch.</h2>

					<p class="clear-both">The sales team and property managers at the Tides are happy to answer any questions you may have – just fill out the contact form below, give us a call or send an email. You can also drop by the Harbor House, our onsite amenities building and request to speak with Mac or Patty.</p>

					<div class="wpcf7" id="wpcf7-f51-t1-o1">

						<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="post" class="wpcf7-form">

							<div class="input-wrap max-width">

								<label for="first_name" class="placeholder">First Name *</label>

								<span class="wpcf7-form-control-wrap first_name">

									<input type="text" name="first_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="last_name" class="placeholder">Last Name *</label>

								<span class="wpcf7-form-control-wrap last_name">

									<input type="text" name="last_name" value="" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width">

								<label for="email" class="placeholder">Email *</label>

								<span class="wpcf7-form-control-wrap email">

									<input type="text" name="email" value="" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" size="40" />

								</span>

								</div>

							<div class="input-wrap max-width">

								<label for="phone" class="placeholder">Phone</label>

								<span class="wpcf7-form-control-wrap phone">

									<input type="text" name="phone" value="" class="wpcf7-form-control wpcf7-text" size="40" />

								</span>

							</div>

							<div class="input-wrap max-width input-message">

								<label for="description" class="placeholder">Message</label>

								<span class="wpcf7-form-control-wrap description">

									<textarea name="description" class="wpcf7-form-control  wpcf7-textarea wpcf7-validates-as-required" cols="40" rows="10"></textarea>

								</span>

							</div>

							<div class="input-wrap max-width input-button">

								<input type="submit" value="Discover More" class="wpcf7-form-control  wpcf7-submit left bold" />

							</div>

							<div style='display:none;'>
								<input type="hidden" name="lead_source" value="Tides Website" class="wpcf7-hidden" />
								<input type="hidden" name="oid" value="00Dd0000000gUQD" class="wpcf7-hidden" />
								<input type="hidden" name="retURL" value="<?= salesforce_callback(); ?>" class="wpcf7-hidden" />
							</div>

							<div class="wpcf7-response-output wpcf7-display-none"></div>

						</form>

					</div>

				</div>

			</div>

			<? endif; ?>

			<div id="bottom-stripe" class="clear-both left max-width"></div>

			<footer id="footer" class="max-width" role="contentinfo">

				<div id="footer-wrap" class="container">

					<a href="#" id="footer-toggle" class="semibold tides-closed_nav">Tides Partnership</a>

						<div id="footer-content" class="left hide container">

							<header class="clear-both left max-width">

								<h3 class="left reset inline">East West Partners</h3>

							</header>

							<div class="divide clear-both left max-width"></div>

							<div class="footer-box first-box left clearfix">

								<header>

									<h4 class="reset light">One of the nation’s premier developers is managing the sale of these residences.</h4>

								</header>

							</div>

							<div class="footer-box left clearfix">

								<p class="reset">East West Partners is a nationally recognized firm devoted to building, selling and managing high-quality real estate in some of the world’s most beautiful places. It’s award-winning projects include the Union Station and Riverfront Park neighborhoods in downtown Denver, Colorado;  Empire Pass in Deer Valley Resort, Utah;  Northstar Ski Resort in Lake Tahoe, California; the Westin Riverfront Resort in Avon Colorado – which was recently named #1 Western Resort by <i>Condé Nast Traveler</i>; and Charleston’s own One Vendue Range.</p>

								<br />

								<p class="reset left">To learn more about East West Partners, visit us at <a href="http://eastwestpartners.com" target="_blank" id="footer-link">ewpartners.com</a></p>

                                <p class="reset left inline" id="brochure"><a href="<?= bloginfo('url'); ?>/wp-content/uploads/2013/04/TIDES-Brochure.pdf" target="_blank" id="footer-link">Download Brochure</a></p>

							</div>

					</div>

				</div>

				<div id="sub-footer" class="container tides-eo_logo clear-both">

					<p>&copy;<?= date('Y'); ?> <? bloginfo('name'); ?> Condomiums. All rights reserved. | <a id="privacypolicy" href="/wp-content/themes/tides/privacypolicy.html" class="bold">Privacy Policy</a></p>

				</div>

			</footer>

			<aside id="modal">

				<section>
					<p>This Privacy Policy governs the manner in which Cooper River Realty, LLC collects, uses, maintains and discloses information collected from users (each, a "User") of the www.tidescharleston.com website ("Site"). This privacy policy applies to the Site and all products and services offered by Cooper River Realty, LLC.</p>

					<p>Personal identification information</p>
					<p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, subscribe to the newsletter, fill out a form, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.</p>

					<p>Non-personal identification information</p>
					<p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</p>

					<p>Web browser cookies</p>
					<p>Our Site may use "cookies" to enhance User experience. User's web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>

					<p>How we use collected information</p>
					<p>Cooper River Realty, LLC collects and uses Users personal information for the following purposes: </p>
					<p><i>To personalize user experience</i></p>
					<p>We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.</p>
					<p><i>To improve our Site</i></p>
					<p>We continually strive to improve our website offerings based on the information and feedback we receive from you.</p>
					<p><i>To improve customer service</i></p>
					<p>Your information helps us to more effectively respond to your customer service requests and support needs.</p>
					<p><i>To send periodic emails</i></p>
					<p>The email address Users provide for order processing, will only be used to send them information and updates pertaining to their order. It may also be used to respond to their inquiries, and/or other requests or questions. If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc. If at any time the User would like to unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email.</p>

					<p>How we protect your information</p>
					<p>We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.</p>

					<p>Sharing your personal information</p>
					<p>We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.</p>

					<p>Changes to this privacy policy</p>
					<p>Cooper River Realty, LLC  has the discretion to update this privacy policy at any time. When we do, we will revise the updated date at the bottom of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>

					<p>Your acceptance of these terms</p>
					<p>By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p>

					<p>Contacting us</p>
					<p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at:
					<b>Cooper River Realty, LLC
					www.TidesCharleston.com</b>
					115 Cooper River Drive
					Mount Pleasant, SC 29464
					1-843-388-4681
					</p>
				</section>

				<footer>

					<a href="#" class="tides-close-button">Close</a>

				</footer>

			</aside>

		<script>
			var url = "<?= bloginfo('siteurl'); ?>"
		</script>

		<? wp_footer(); ?>

	</body>

</html>
