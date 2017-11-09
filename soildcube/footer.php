<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package soildcube
 */

?>
</div><!-- #content -->
</div><!-- #page -->
</div><!-- .container -->

<footer style="opacity: 1;">
    <div class="container">
        <div class="row animated fadeInUp" data-appear-top-offset="-200" data-animated="fadeInUp">

            <?php for($p=1; $p<4; $p++) { ?>
                <?php if( get_theme_mod('footer-column'.$p,false)) { ?>
                    <?php $queryxxx = new WP_query('page_id='.get_theme_mod('footer-column'.$p,true)); ?>
                    <?php while( $queryxxx->have_posts() ) : $queryxxx->the_post(); ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 padbot30">
                            <h4><b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></b></h4>
                            <div><?php the_excerpt(); ?></div>
                            <?php if($p==1){ ?>
                            <ul class="social">
                                <?php if( get_theme_mod('footer-social-twitter',false)) {?> <li><a href="https://twitter.com/<?php echo get_theme_mod('footer-social-twitter',true); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                                <?php if( get_theme_mod('footer-social-facebook',false)) {?> <li><a href="https://www.facebook.com/<?php echo get_theme_mod('footer-social-facebook',true); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
                                <?php if( get_theme_mod('footer-social-google-plus',false)) {?> <li><a href="https://plus.google.com/<?php echo get_theme_mod('footer-social-google-plus',true); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                                <?php if( get_theme_mod('footer-social-pinterest',false)) {?> <li><a href="https://www.pinterest.com/<?php echo get_theme_mod('footer-social-pinterest',true); ?>"><i class="fa fa-pinterest-square"></i></a></li><?php } ?>
                                <?php if( get_theme_mod('footer-social-map_show',false)) {?> <li><a href="javascript:void(0);"><i class="map_show fa fa-map-marker"></i></a></li><?php } ?>
                            </ul>
                            <?php } ?>
                        </div>
                        <div class="respond_clear"></div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                <?php } else { ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 padbot30">
                        <h4><b>About us</b></h4>
                        <p>About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us .</p>
                        <p>About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us .</p>
                        <ul class="social">
                            <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-pinterest-square"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="map_show fa fa-map-marker"></i></a></li>
                        </ul>
                    </div>
                    <div class="respond_clear"></div>
                <?php }} ?>

        </div><!-- .row .animated .fadeInUp -->
    </div><!-- .container -->

    <div class="site-info">
        <a href="<?php echo esc_url(__('https://wordpress.org/', 'soildcube')); ?>"><?php
            /* translators: %s: CMS name, i.e. WordPress. */
            printf(esc_html__('Proudly powered by %s', 'soildcube'), 'WordPress');
            ?></a>
        <span class="sep"> | </span>
        <?php
        /* translators: 1: Theme name, 2: Theme author. */
        printf(esc_html__('Theme: %1$s by %2$s.', 'soildcube'), 'soildcube', '<a href="http://soildcube.com">Soild Cube Web</a>');
        ?>
    </div><!-- .site-info -->
</footer>

<?php wp_footer(); ?>
</div>
</body>
</html>
