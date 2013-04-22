<?
/*
Template Name: Contact Us Page
*/
?>

<? get_header(); ?>

        <div id="contact-info" class="left">
            <? if (have_posts()) : while (have_posts()) : the_post(); ?>
                                   
                <h3 class="reset light">Contact Us</h3>

                <? the_content(); ?>


            <? endwhile; else : ?>
            
                <? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>
            
            <? endif; ?>
        </div>
    
        <div id="map">

            <img class="right inline" src="http://maps.googleapis.com/maps/api/staticmap?center=Charleston,South+Carolina,CS&amp;zoom=12&amp;size=210x210&amp;maptype=roadmap&amp;sensor=false" alt="Map of Charleston" width="210" height="210" />

        </div>

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

            <? if ( ! empty($team->posts)) : ?>

                <div <?= count($team->posts) > 4 ? 'class="carousel carousel-team"' : null; ?>>

                    <ul class="ul-reset reset" <?= count($team->posts) < 4 ? 'id="no-carousel"' : null; ?>>

                        <? foreach ($team->posts as $post) : ?>

                            <? $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

                            <li class="member left inline">

                                <img src="<?= content_url() . '/themes/tides/library/timthumb.php?src=' . $image[0] . '&q=100&w=140&h=130'; ?>">
                                
                                <h4 class="semibold reset"><?= $post->post_title; ?></h4>
                                
                                <p class="regular"><?= get_post_meta($post->ID, 'Team - Position Title', true); ?></p>

                                <p class="regular"><?= get_post_meta($post->ID, 'Team - Contact Phone', true); ?></p>

                                <a href="mailto:<?= get_post_meta($post->ID, 'Team - Email Address', true); ?>" class="light"><?= get_post_meta($post->ID, 'Team - Email Address', true); ?></a>

                            </li>

                            <? $image = null; ?>

                        <? endforeach; ?>

                    </ul>

                </div>

                

            <? else : ?>

                <? _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?>

            <? endif; ?>

        </div>
			
<? get_footer(); ?>
