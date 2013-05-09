<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>

		<meta charset="utf-8">

		<title><? bloginfo('name'); ?> <?php wp_title('-', true); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<meta name="HandheldFriendly" content="True">

		<meta name="MobileOptimized" content="320">

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<meta name="format-detection" content="telephone=no">

		<link rel="pingback" href="<? bloginfo('pingback_url'); ?>">

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,800,300,400,600' rel='stylesheet' type='text/css'>

		<? wp_head(); ?>

	</head>

	<body <? body_class(); ?>>

		<div id="bg">
			<?
			if (is_page('home') || is_page('thank-you')) {
				$src = content_url() . '/themes/tides/library/images/bg_home.jpg';
				$alt = 'Home Background';
			} else if (is_page('residences') || is_page('listings') || is_page('gallery') || is_page('features')) {
				$src = content_url() . '/themes/tides/library/images/bg_residences.jpg';
				$alt = 'Residencies Background';
			} else if (is_page('amenities') || is_page('community') || is_page('meet-your-new-neighbors') || is_page('bucket-list')) {
				$src = content_url() . '/themes/tides/library/images/bg_amenities.jpg';
				$alt = 'Amenities Background';
			} else if (is_page('neighborhood')) {
				$src = content_url() . '/themes/tides/library/images/bg_neighborhood.jpg';
				$alt = 'Neighborhood Background';
			} else if (is_page('contact-us')) {
				$src = content_url() . '/themes/tides/library/images/bg_contact.jpg';
				$alt = 'Contact Us Background';
			} else {
				$src = content_url() . '/themes/tides/library/images/bg_news.jpg';
				$alt = 'News Background';
			}
			?>
			<img src="<?= $src; ?>" alt="<?= $alt; ?>">
		</div>

		<div class="max-width" id="top-stripe"></div>

		<div id="container" class="container">

		<div id="sidebar" class="left">

			<div id="header" class="left">

				<header class="left" role="banner">

					<h1 class="reset">

						<a href="<?= home_url(); ?>" class="max-width max-height"><? bloginfo('name'); ?></a>

					</h1>
					</header>

				<nav id="nav-mobile" class="tides-mobile-nav"></nav>

				<nav role="navigation" class="right">

					<div id="main-nav">

						<? bones_main_nav(); ?>

					</div>

					<div id="mobile-nav">

						<? wp_nav_menu(array('menu' => 'Mobile Nav')); ?>

					</div>

				</nav>

			</div>

			<? if (is_page('home')) : ?>

			<div id="sidebar-content" class="left clear-both side-box">

				<h2 class="reset bold">New waterfront residences at a significant discount.</h2>

				<p>The Tides waterfront condominiums overlook Charleston Harbor and the city’s historic skyline. The residences include luxurious features like semi-private elevators, hardwood floors, Viking &#174; appliances, and large, open floor plans. And right now, several new residences are being made available at a significant discount from the original list price.</p>

				<p>For those who want a luxury residence that gives you the freedom to pursue your life's interests, the Tides is the perfect place.</p>

			</div>

			<div id="contact-form" class="left clear-both side-box">

				<h2 class="reset left">Get the Inside Information</h2>

				<p class="reset left">Call 843-388-4681 to arrange a tour or complete the form to get on our insider email list.</p>

				<div class="wpcf7" id="wpcf7-f42-t1-o1">

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

							<input type="submit" value="Discover More" class="wpcf7-form-control  wpcf7-submit button right bold" />

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

			<? elseif (is_page('residences') || is_page('listings') || is_page('gallery') || is_page('features')) : ?>

			<div id="sidebar-content" class="left clear-both side-box">

				<h2 class="reset bold">Spacious waterfront residences offering luxurious features.</h2>

				<p>Overlooking the harbor, within walking distance of shopping and services but away from the tourist crowds, there simply isn’t a better location in the Charleston area. These residences offer a variety of 1-, 2-, 3-, and 4- bedroom plans featuring an abundance of extras that make calling this place home even more special.</p>

				<p>It’s time life was a little easier. <b>It’s time to come home to the Tides.</b></p>

			</div>

			<div id="nav-residencies" class="left clear-both">

				<ul class="ul-reset reset">
					<li <?= is_page('listings') ? 'class="current"': null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/residencies/listings'); ?>">Listings</a></li>
					<li <?= is_page('gallery') ? 'class="current"': null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/residencies/gallery'); ?>">Gallery</a></li>
					<li <?= is_page('features') ? 'class="current"': null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/residencies/features'); ?>">Features</a></li>
				</ul>

			</div>

			<div id="contact-form" class="left clear-both side-box">

				<h2 class="reset left">Get the Inside Information</h2>

				<p class="reset left">Call 843-388-4681 to arrange a tour or complete the form to get on our insider email list.</p>

				<div class="wpcf7" id="wpcf7-f42-t1-o1">

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

							<input type="submit" value="Discover More" class="wpcf7-form-control  wpcf7-submit button right bold" />

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

      <? elseif (is_page('amenities') || is_page('community') || is_page('meet-your-new-neighbors') || is_page('bucket-list')) : ?>

			<div id="sidebar-content" class="left clear-both side-box">

				<h2 class="reset bold">The perfect place to call home.</h2>

				<p>With top quality amenities, full-time property management and neighbors who you can gladly call friends, the Tides is more than your residence; it’s your community.</p>

			</div>

			<div id="nav-community" class="left clear-both">

				<ul class="ul-reset reset">
					<li <?= is_page('amenities') ? 'class="current"': null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/community/amenities'); ?>">Amenities</a></li>
					<li <?= is_page('meet-your-new-neighbors') ? 'class="current"': null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/community/meet-your-new-neighbors'); ?>">Meet Your New Neighbors</a></li>
					<li <?= is_page('bucket-list') ? 'class="current"': null; ?>><a class="uppercase bold block max-height max-width" href="<?= site_url('/community/bucket-list'); ?>">Bucket List</a></li>
				</ul>

			</div>

			<div id="contact-form" class="left clear-both side-box">

				<h2 class="reset left">Get the Inside Information</h2>

				<p class="reset left">Call 843-388-4681 to arrange a tour or complete the form to get on our insider email list.</p>

				<div class="wpcf7" id="wpcf7-f42-t1-o1">

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

							<input type="submit" value="Discover More" class="wpcf7-form-control  wpcf7-submit button right bold" />

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

			<? elseif (is_page('neighborhood')) : ?>

			<div id="sidebar-content" class="left clear-both side-box">

				<h2 class="reset bold">Minutes from historic Charleston, the beaches, and premier shopping.</h2>

				<p>Breathe in a sunrise over the gentle Lowcountry marsh. Raise a toast against the backdrop of the iconic Cooper River Bridge. Tie up your sailboat right on the Charleston Harbor. Swing the day away on the Patriots Point Links. Premier shopping. Acclaimed dining. Pristine beaches. Live <b>just minutes</b> from the best Charleston has to offer.</p>

			</div>

			<div id="nav-neighborhood" class="left clear-both">

				<ul class="ul-reset reset">

					<li>

						<a class="uppercase bold black tides-inactive_sub_nav max-height max-width" target="_blank" href="<?= content_url() . '/uploads/2013/04/county-map.pdf'; ?>">Area Map</a>

					</li>

					<li class="parent">

						<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Parks &amp; Recreation</a>

					</li>

					<li class="child hide">

						<ol class="reset">
							<li><a href="1">Mt. Pleasant Waterfront Park &amp; Pier</a></li>
							<li><a href="2">Hampton Park</a></li>
							<li><a href="3">Patriots Point Marina</a></li>
							<li><a href="4">Shem Creek</a></li>
							<li><a href="5">Patriots Point Golfcourse</a></li>
							<li><a href="6">Tennis</a></li>
							<li><a href="7">Sullivan's Island Beach</a></li>
						</ol>

					</li>

					<li class="parent">

						<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Arts &amp; Culture</a>

					</li>

					<li class="child hide">

						<ol class="reset">
							<li><a href="8">King Street</a></li>
							<li><a href="9">Boone Hall Plantation</a></li>
							<li><a href="10">Patriots Point Naval and Maritime Museum</a></li>
							<li><a href="11">Sweetgrass Cultural Arts Pavilion</a></li>
							<li><a href="12">Belle Hall Shopping Center</a></li>
							<li><a href="13">Mount Pleasant Towne Centre</a></li>
							<li><a href="14">Gaillard Auditorium</a></li>
						</ol>

					</li>

					<li class="parent">

						<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Dining</a>

					</li>

					<li class="child hide">

						<ol class="reset">
							<li><a href="15">Basil</a></li>
							<li><a href="16">Crave</a></li>
							<li><a href="17">Langdon’s Restaurant &amp; Wine Bar</a></li>
							<li><a href="18">Longpoint Grill</a></li>
							<li><a href="19">Old Village Post House</a></li>
							<li><a href="20">Opal</a></li>
							<li><a href="21">Red Drum</a></li>
						</ol>

					</li>

					<li class="parent">

						<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Grocery</a>

					</li>

					<li class="child hide">

						<ol class="reset">
							<li><a href="22">Harris Teeter</a></li>
							<li><a href="23">Whole Foods</a></li>
							<li><a href="24">Trader Joe’s</a></li>
							<li><a href="25">New York Butcher Shoppe</a></li>
							<li><a href="26">Kudzu Bakery</a></li>
						</ol>

					</li>

					<li class="parent">

						<a class="uppercase bold block tides-inactive_sub_nav max-height max-width" href="#">Healthcare</a>

					</li>

					<li class="child hide">

						<ol class="reset">
							<li><a href="27">MUSC</a></li>
							<li><a href="28">Roper St. Francis</a></li>
						</ol>

					</li>

				</ul>

			</div>

			<? elseif (is_page('contact-us')) : ?>

			<div id="sidebar-content" class="left clear-both side-box">

				<h2 class="reset bold">Contact Us</h2>

				<p>The sales team and property managers at the Tides are happy to answer any questions you may have – just fill out the contact form below, give us a call or send an email. You can also drop by the Harbor House, our onsite amenities building and request to speak with Mac or Patty.</p>

			</div>

			<div id="contact-form" class="left clear-both side-box">

				<h2 class="reset left">Get the Inside Information</h2>

				<p class="reset left">Call 843-388-4681 to arrange a tour or complete the form to get on our insider email list.</p>

				<div class="wpcf7" id="wpcf7-f42-t1-o1">

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

							<input type="submit" value="Discover More" class="wpcf7-form-control  wpcf7-submit button right bold" />

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

			<? else : ?>

        <? bones_page_navi(); ?>

			<? endif; ?>

		</div>

		<? if (is_page('home') || is_page('thank-you')) : ?>
		<? $src = content_url() . '/themes/tides/library/images/mbg_home.jpg'; ?>
		<div id="bg-mobile">

			<img src="<?= $src; ?>" alt="<?= $alt; ?>">

		</div>
		<? endif; ?>

		<div id="page-content" class="right" role="main">

				<div class="mobile-wrap">
