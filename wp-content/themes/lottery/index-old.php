<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                    <?php
                        $arg = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'category_name' => 'active',// active
                            'meta_query' => array(
                                'relation' => 'AND',
                                'sorder' => array(
                                        'key' => 'sorder',
                                        'type' => 'NUMERIC',
                                        'compare' => 'EXISTS',
                                ),    
                                'date_start' => array(
                                        'key' => 'date_start',
                                        'type' => 'DATETIME',
                                        'compare' => 'EXISTS',
                                ),
                            ),
                            'orderby' => array(
                                'sorder' => 'ASC',
                                'date_start' => 'DESC',
                            )
                        );
                        $query = new WP_Query($arg);
                    ?>
                    <?php if ( $query->have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
                        
                        $adv_ids = '';
                        
			// Start the loop.
			while ( $query->have_posts() ) : $query->the_post();
                            
                            $adv_ids .= get_field('id_adv');
                        
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/lottery-active' );

			// End the loop.
			endwhile;
                        
                        txt_a($adv_ids);
                        
			// Previous/next page navigation.
			/*
                        the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );
                        */

		// If no content, include the "No posts found" template.
		else :
                    
                    //$posts = get_posts('category_name=future,ending');
                    
                    wp_reset_query();
                    $arg = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category_name' => 'future',
                    );
                    $query = new WP_Query($arg);
                    if ( $query->have_posts() ) : $query->the_post();
                    get_template_part( 'template-parts/lottery-future' );
                    endif;
                    
                    wp_reset_query();
                    $arg = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category_name' => 'ending',
                    );
                    $query = new WP_Query($arg);
                    if ( $query->have_posts() ) : $query->the_post();
                    get_template_part( 'template-parts/lottery-ending' );
                    endif;

		endif;
                
                unset($query);
                
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
