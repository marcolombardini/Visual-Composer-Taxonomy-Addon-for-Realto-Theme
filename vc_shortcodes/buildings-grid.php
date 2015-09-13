<?php
/*-----------------------------------------------------------------------------------*/
/*	Buildings Grid
/*-----------------------------------------------------------------------------------*/

function realto_buildings_grid_shortcode( $atts, $content = null )
{
	extract( shortcode_atts( array(
		'buildings_title' => '',
		'bldg_type'	=> '',
		'no_buildings' => ''
    ), $atts ) );
	
	ob_start();	
	?>
	
    <?php
global $query_string;
	if( $bldg_type != "Any" ) {
		$args = array(
			'posts_per_page'  => $no_buildings,
			'orderby'         => 'date',
			'order'           => 'DESC',
			'post_type'       => 'property',
			'post_status'     => 'publish',
			'tax_query' => array(
			    array(
			    'taxonomy' => 'buildings-type',
			    'field' => 'term_id',
			    'terms' => $bldg_type
			     )
			  )
		);
	} else {
		$args = array(
			'posts_per_page'  => $no_buildings,
			'orderby'         => 'date',
			'order'           => 'DESC',
			'post_type'       => 'property',
			'post_status'     => 'publish'
		);
	}
query_posts( $args );
?>

<div id="latest-buildings">
			
			<?php if( !empty($buildings_title) ) { ?>
	        <div class="row">
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	            	
	                <h2 class="secion-title"><?php echo esc_attr( $buildings_title ); ?></h2>
	            	
	            </div>
	        </div>
	        <?php } ?>
	            
	        <div class="row">


	                <?php
	                $i = 0;
	                if ( have_posts() ) :
	                            
	                while ( have_posts() ) : the_post(); $i++; ?>
	                
	                <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
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

	                <?php if( $i == 3 ) { 

	                	echo '<div class="clearfix"></div>';
	                	$i = 0;
	                }?>
	            	
	                <?php endwhile; ?>
	             
	                <?php wp_reset_query();
					endif;
					?>
	    
	            <!-- .row -->
	        </div>

	</div><!-- #latest-properties  -->

	<?php 
	$result = ob_get_contents();  
	ob_end_clean();
	return $result;
	   
	}

add_shortcode('realto-buildings-grid', 'realto_buildings_grid_shortcode');
?>
