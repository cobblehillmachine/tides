<?
/*
Template Name: Community Page
*/
?>

<? get_header(); ?>

					<? if (have_posts()) : while (have_posts()) : the_post(); ?>
										   
				    <? the_content(); ?>
				
			    <? endwhile; else : ?>
				
		    		<? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>
					
			    <? endif; ?>

<? get_footer(); ?>