<?php
/**
 * Enqueue Flexslider Files
 * User: subhendugiri
 */

function soildcube_slider_scripts()
{
    wp_enqueue_script('jquery');

    wp_enqueue_style('flex-style', get_template_directory_uri() . '/css/flexslider.css');

    wp_enqueue_script('flex-script', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'soildcube_slider_scripts');

// Initialize Slider
function soildcube_slider_initialize() { ?>
    <script type="text/javascript" charset="utf-8">
        jQuery(window).load(function() {
            jQuery('.flexslider').flexslider({
                animation: "fade",
                direction: "horizontal",
                slideshowSpeed: 7000,
                animationSpeed: 600
            });
        });
    </script>
<?php }
add_action( 'wp_head', 'soildcube_slider_initialize' );

function soildcube_slider_template()
{

    // Query Arguments
    $args = array(
        'post_type' => 'slides',
        'posts_per_page' => 5
    );

    // The Query
    $the_query = new WP_Query($args);

    // Check if the Query returns any posts
    if ($the_query->have_posts()) {

        // Start the Slider ?>
        <div class="flexslider top_slider" style="height: 481px;">
            <ul class="slides">

                <?php
                // The Loop
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <li>
                        <?php // Check if there's a Slide URL given and if so let's a link to it
                        if (get_post_meta(get_the_id(), 'soildcube_slideurl', true) != '') { ?>
                        <a href="<?php echo esc_url(get_post_meta(get_the_id(), 'soildcube_slideurl', true)); ?>">
                            <?php }

                            // The Slide's Image
                            echo the_post_thumbnail();

                            // Close off the Slide's Link if there is one
                            if (get_post_meta(get_the_id(), 'soildcube_slideurl', true) != '') { ?>
                        </a>
                        <div class="flex_caption1">
                            <p class="title1 captionDelay2 FromTop"><?php echo esc_url(get_post_meta(get_the_id(), 'soildcube_slidetitle', true)); ?></p>
                            <p class="title4 captionDelay7 FromBottom"><?php echo esc_url(get_post_meta(get_the_id(), 'soildcube_slidedesc', true)); ?></p>
                        </div>
                    <?php } ?>

                    </li>
                <?php endwhile; ?>

            </ul><!-- .slides -->
        </div><!-- .flexslider -->

    <?php }

    // Reset Post Data
    wp_reset_postdata();
}

// Slider Shortcode

function soildcube_slider_shortcode() {
    ob_start();
    soildcube_slider_template();
    $slider = ob_get_clean();
    return $slider;
}
add_shortcode( 'slider', 'soildcube_slider_shortcode' );