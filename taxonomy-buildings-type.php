<?php
/**
 * The template for taxonomy Building Type
 * @package RealTo
 * @since RealTo 1.5
 */
global $nt_option;
get_header(); ?>

<div class="container page-content">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                
            <?php
            $i = 0;
			if ( have_posts() ) :?>
			<div class="box-container">
            	<h2 class="archive-title"><?php printf( __( 'Building Type: %s', 'realto' ), single_tag_title( '', false ) ); ?></h2>
            </div>
            <?php
            // Start the Loop.
			while ( have_posts() ) : the_post(); $i++; ?>
				
            <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                <div class="box-container">
                    <div class="holder">
                        <?php nt_property_pic();?>
                        <span class="prop-tag">
                            <?php realto_property_prop_tags(); ?>
                        </span>
                        <div class="prop-info">
                            <h3 class="prop-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <ul class="more-info clearfix">
                                <?php reato_property_features(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php if( $i == 2 ) { 
                echo '<div class="clearfix"></div>';
                $i = 0;
            }?>

            <?php endwhile; ?>
			<?php realto_paging_nav(); ?>
            <?php else : 
				// If no content, include the "No posts found" template.
				get_template_part( 'property', 'none' );
			endif;
			?>
        
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <?php get_sidebar("property");?>
        </div>  
    </div>
    <!-- .row -->
</div>
<!-- .container -->

<?php get_footer(); ?>
