<?php

add_action( 'wp_enqueue_scripts', 'porto_child_css', 1001 );

// Load CSS
function porto_child_css() {
	// porto child theme styles
	wp_deregister_style( 'styles-child' );
	wp_register_style( 'styles-child', esc_url( get_stylesheet_directory_uri() ) . '/style.css' );
	wp_enqueue_style( 'styles-child' );

	if ( is_rtl() ) {
		wp_deregister_style( 'styles-child-rtl' );
		wp_register_style( 'styles-child-rtl', esc_url( get_stylesheet_directory_uri() ) . '/style_rtl.css' );
		wp_enqueue_style( 'styles-child-rtl' );
	}
}



function services($atts, $content = null){
	ob_start();
	
	global $porto_settings, $porto_layout, $post, $porto_member_socials;

	$featured_posts = get_field($atts['field']);

	if( $featured_posts ): ?>
		<ul class="porto-info-list block-ul-zw mb-0">
			<?php  foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
				setup_postdata($post); 
				?>
				<li style="padding-top: 0.4em; padding-bottom: 0.4em" class="porto-info-list-item"><i style="font-size: 1.1rem; color: #00396F;" class="porto-info-icon far fa-check-circle"></i>
					<div class="porto-info-list-item-desc" font-size:="" 16px;="" style="font-size: 16px;"><a class="text-secondary" title="Перейти к услуге <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
				<?php endforeach; ?>
			</ul>
			<?php 
    // Reset the global post object so that the rest of the page works correctly.
			wp_reset_postdata(); ?>
		<?php endif; ?>
		<?php
		$output = ob_get_contents();
		ob_end_clean(); 
		return  $output;
	}?>
	<?php
	add_shortcode( 'service', 'services' );




	function services01($atts, $content = null){
		ob_start();

		global $porto_settings, $porto_layout, $post, $porto_member_socials;

		$featured_posts = get_field($atts['field']);
		
		if( $featured_posts ): ?>
			<ul class="porto-info-list block-ul-zw mb-0">

				<?php  foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
					setup_postdata($post); 
					?>
					<li style="padding-top: 0.4em; padding-bottom: 0.4em" class="porto-info-list-item"><i style="font-size: 1.1rem; color: #00396F;" class="porto-info-icon far fa-check-circle"></i>
						<div class="porto-info-list-item-desc" font-size:="" 16px;="" style="font-size: 16px;"><a class="text-secondary" title="Перейти к услуге <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
					<?php endforeach; ?>
				</ul>
				<?php 
    // Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
			<?php endif; ?>
			<?php
			$output = ob_get_contents();
			ob_end_clean(); 
			return  $output;
		}?>
		<?php
		add_shortcode( 'service01', 'services01' );?>











		<?php function services02($atts, $content = null){
			ob_start();

			global $porto_settings, $porto_layout, $post, $porto_member_socials;

			$featured_posts = get_field($atts['field']);

			if( $featured_posts ): ?>
				<div class="container">
					<div class="row">
						<div class="col-2 d-none d-lg-block">
							<img alt="Bootstrap Image Preview" src="https://via.placeholder.com/150" />
						</div>
						<div class="col-12 col-md-12 col-lg-10">
							<div class="row">
								<div class="col-4 col-md-2 d-block d-lg-none">
									<img alt="Bootstrap Image Preview" src="https://via.placeholder.com/100" />
								</div>
								<div class="col-8 col-md-10 d-block title-block">
									<a href="#"><h3 class="mb-0 mb-lg-3"><?php echo $atts['field1'] ?></h3></a>
								</div>
								<div class="porto-separator col-12  mt-3 mt-lg-0"><hr class=" separator-line align_center solid" style="background-color:rgba(0,0,0,0.06);"></div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<ul class="ulli list-serviсes-hm list list-icons mb-0">
										<?php  foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
											setup_postdata($post); 
											?>
											<li class="mb-2 list-item">
												<a class="text-secondary" title="Перейти к услуге <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
    // Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
			<?php endif; ?>
			<?php
			$output = ob_get_contents();
			ob_end_clean(); 
			return  $output;
		}?>
		<?php
		add_shortcode( 'service02', 'services02' );?>



		<?php function zagolovok($atts, $content = null){
			ob_start();
			global $porto_settings, $porto_layout, $post, $porto_member_socials;

			$featured_posts = get_field($atts['field']);

			if( $featured_posts ): ?>
				<?php foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
					setup_postdata($post); ?>
					<a href="<?php the_permalink(); ?>"><h3 style="font-size: 18px" class="mb-0 mb-lg-3 text-uppercase"><?php the_title(); ?></h3></a>

				<?php endforeach; ?>

				<?php 
    // Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
			<?php endif; 
			$output = ob_get_contents();
			ob_end_clean(); 
			return  $output;
		}?>
		<?php add_shortcode( 'zagolovok', 'zagolovok' );?>




		<?php function service_image($atts, $content = null){
			ob_start();
			global $porto_settings, $porto_layout, $post, $porto_member_socials;
			$featured_post = get_field($atts['field']);
			$size = 'thumbnail';
			$thumb = $featured_post['sizes'][ $size ];
			if( !empty( $featured_post ) ): ?>
				<img src="<?php echo esc_url($thumb); ?>" alt="<?php echo $atts['alt'] ?>" title="<?php echo $atts['title'] ?>"/>
			<?php endif; 
			$output = ob_get_contents();
			ob_end_clean(); 
			return  $output;
		}?>
		<?php
		add_shortcode( 'service_image', 'service_image' );?>



		<?php function subcategory($atts, $content = null){
			ob_start();
			global $porto_settings, $porto_layout, $post, $porto_member_socials;
			$featured_posts = get_field($atts['field']);		
			if( $featured_posts ): ?>
				<ul class="ulli list-serviсes-hm list list-icons mb-0">
					<?php  foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
						setup_postdata($post); 
						?>
						<li class="mb-2 list-item">
							<a class="text-secondary" title="Перейти к услуге <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php 
    // Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
			<?php endif; ?>
			<?php
			$output = ob_get_contents();
			ob_end_clean(); 
			return  $output;
		}?>
		<?php
		add_shortcode( 'subcategory', 'subcategory' );?>




		<?php function subcategoryterm($atts, $content = null){
			ob_start();
			global $porto_settings, $porto_layout, $post, $porto_member_socials;

			$terms = get_field($atts['field']);

			if( $terms ): ?> 
				<ul class="ulli list-serviсes-hm list list-icons mb-0">
					<?php  foreach( $terms as $term ): 
        // Setup this post for WP functions (variable must be named $post).
						setup_postdata($post); 
						?>
						<li class="mb-2 list-item">
							<a class="text-secondary" title="Перейти к услуге <?php echo esc_html( $term->name ); ?>>" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php 
    // Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
			<?php endif; ?>
			<?php
			$output = ob_get_contents();
			ob_end_clean(); 
			return  $output;
		}?>
		<?php
		add_shortcode( 'subcategoryterm', 'subcategoryterm' );?>




		<?php function subservices($atts, $content = null){
			ob_start();

			global $porto_settings, $porto_layout, $post, $porto_member_socials;

			$featured_posts = get_field($atts['field']);

			if( $featured_posts ): ?>
				<div class="container">

					<div class="row">
						<?php  foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
							setup_postdata($post); 
							?>
							<div class="col-6 row">
								<div class="col-4 d-none d-lg-block">
									<img alt="Bootstrap Image Preview" src="https://via.placeholder.com/150" />
								</div>
								<div class="col-12 col-md-12 col-lg-8">
									<div class="row">
										<div class="col-4 col-md-2 d-block d-lg-none">
											<img alt="Bootstrap Image Preview" src="https://via.placeholder.com/100" />
										</div>
										<div class="col-8 col-md-10 d-block title-block">
											<a href="<?php the_permalink(); ?>"><h3 class="mb-0 mb-lg-3"><?php the_title(); ?></h3></a>
										</div>
										<div class="porto-separator col-12  mt-3 mt-lg-0"><hr class=" separator-line align_center solid" style="background-color:rgba(0,0,0,0.06);"></div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<ul class="ulli list-serviсes-hm list list-icons mb-0">

												<li class="mb-2 list-item">
													<a class="text-secondary" title="Перейти к услуге <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</li>

											</ul>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

				</div>
				<?php 
    // Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>
			<?php endif; ?>
			<?php
			$output = ob_get_contents();
			ob_end_clean(); 
			return  $output;
		}?>
		<?php
		add_shortcode( 'subservices', 'subservices' );?>



		<?php
		function get_excerpt($limit, $source = null){

			$excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
			$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
			$excerpt = strip_shortcodes($excerpt);
			$excerpt = strip_tags($excerpt);
			$excerpt = substr($excerpt, 0, $limit);
			$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
			$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
			return $excerpt;
		}
		?>

		<?php function subservices1($atts, $content = null){
			ob_start();
			

			global $porto_settings, $porto_layout, $post, $porto_member_socials;

			$featured_posts = get_field($atts['field']);

			if( $featured_posts ): ?>
				<div class="container">
					<div class="vc_row wpb_row row">
						<?php  foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
							setup_postdata($post); 
							?>

							<div class="vc_column_container col-md-6 appear-animation fadeInUp appear-animation-visible" data-appear-animation="fadeInUp"><div class="wpb_wrapper vc_column-inner">
								<a title="Перейти к услуге <?php the_title(); ?>"href='<?php the_permalink(); ?>'>
									<div class="wpb_text_column wpb_content_element p-3 mb-3 shadow-hm-zw bg-light hover-services">
										<div class="wpb_wrapper">
											<div class="container">
												<div class="row">
													<div class="col-4 d-none d-lg-block"><?php the_post_thumbnail('thumbnail'); ?>
												</div>

												<div class="col-12 col-md-12 col-lg-8">
													<div class="row">
														<div class="col-4 col-md-4 d-block d-lg-none"><?php the_post_thumbnail('thumbnail'); ?>
													</div>
													<div class="col-8 col-md-8 col-lg-12 d-block title-block"><h3 style="font-size: 18px" class="mb-0 mb-lg-3 text-uppercase"><?php the_title(); ?></h3>
													</div>
													<div class="porto-separator col-12 mt-3 mt-lg-0">
														<hr class=" separator-line align_center solid" style="background-color: rgba(0,0,0,0.06);">
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 excerpt-services"><?php echo get_excerpt(130) ?>
												</div>
											</div>
											<i title="Перейти к услуге <?php the_title(); ?>" class="red-tooltip view-more position-absolute Simple-Line-Icons-arrow-right-circle font-weight-semibold"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div></div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php 
    // Reset the global post object so that the rest of the page works correctly.
	wp_reset_postdata(); ?>
<?php endif; ?>
<?php
$output = ob_get_contents();
ob_end_clean(); 
return  $output;
}?>
<?php
add_shortcode( 'subservices1', 'subservices1' );?>



<?php function subservices1small($atts, $content = null){
	ob_start();


	global $porto_settings, $porto_layout, $post, $porto_member_socials;

	$featured_posts = get_field($atts['field']);

	if( $featured_posts ): ?>
		<div class="container">
			<div class="vc_row wpb_row row">
				<?php  foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
					setup_postdata($post); 
					?>

					<div class="vc_column_container col-md-4 appear-animation fadeInUp appear-animation-visible" data-appear-animation="fadeInUp"><div class="wpb_wrapper vc_column-inner">
						<a title="Перейти к услуге <?php the_title(); ?>"href='<?php the_permalink(); ?>'>
							<div class="wpb_text_column wpb_content_element p-3 mb-3 shadow-hm-zw bg-light hover-services">
								<div class="wpb_wrapper">
									<div class="container">
										<div class="row">
											<div class="col-4 d-none d-lg-block"><?php the_post_thumbnail('widget-thumb-medium'); ?>
										</div>

										<div class="col-12 col-md-12 col-lg-7 align-self-center">
											<div class="row flex-nowrap">
											<div class="col-4 col-md-4 d-block d-lg-none"><?php the_post_thumbnail('widget-thumb-medium'); ?>
											</div>
											<div class="col-7 col-md-7 col-lg-12 d-block title-block"><h3 style="font-size: 18px" class="mb-0  text-uppercase"><?php the_title(); ?></h3>
											</div>
<div class="col-1 p-0 col-md-1 col-lg-1 align-self-center">
											
											<i title="Перейти к услуге <?php the_title(); ?>" class=" red-tooltip view-more  Simple-Line-Icons-arrow-right-circle font-weight-semibold"></i>
											
										</div>
										</div>

										


									</div>
									
								</div>
							</div>
						</div>
					</div>
				</a>
			</div></div>
		<?php endforeach; ?>
	</div>
</div>
<?php 
    // Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); ?>
<?php endif; ?>
<?php
$output = ob_get_contents();
ob_end_clean(); 
return  $output;
}?>
<?php
add_shortcode( 'subservices1small', 'subservices1small' );?>





<?php function subservices2($atts, $content = null){
	ob_start();
	global $porto_settings, $porto_layout, $post, $porto_member_socials;
	$featured_posts = get_field($atts['field']);
	if( $featured_posts ): ?>
		<div class="">
			<div class="vc_row wpb_row row">
				<?php  foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
					setup_postdata($post); 
					?>
					<div class="vc_column_container col-md-12 appear-animation fadeInUp appear-animation-visible" data-appear-animation="fadeInUp"><div class="wpb_wrapper vc_column-inner">

						<div class="wpb_text_column wpb_content_element p-3 mb-3 shadow-hm-zw bg-light">
							<div class="wpb_wrapper">
								<div class="container">
									<div class="row">
										<div class="col-2 d-none d-lg-block"><?php the_post_thumbnail('thumbnail'); ?>
									</div>
									<div class="col-12 col-md-12 col-lg-10">
										<div class="row">
											<div class="col-4 col-md-4 d-block d-lg-none"><?php the_post_thumbnail('thumbnail'); ?>
										</div>
										<div class="col-8 col-md-8 col-lg-12 d-block title-block"><a href='<?php the_permalink(); ?>'><h3 style="font-size: 18px" class="mb-0 mb-lg-3 text-uppercase"><?php the_title(); ?></h3></a>
										</div>
										<div class="porto-separator col-12 mt-3 mt-lg-0">
											<hr class=" separator-line align_center solid" style="background-color: rgba(0,0,0,0.06);">
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<?php $featured_posts1 = get_field('spisok_podkategorij_dlya_vyvoda');

											if( $featured_posts1 ): ?>

												<ul class="ulli list-serviсes-hm list list-icons mb-0">
													<?php  foreach( $featured_posts1 as $post ): 
        // Setup this post for WP functions (variable must be named $post).
														setup_postdata($post); 
														?>
														<li class="mb-2 list-item">
															<a class="text-secondary" title="Перейти к услуге <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</li>
													<?php endforeach; ?>
												</ul>
												<?php 
    // Reset the global post object so that the rest of the page works correctly.
												wp_reset_postdata(); ?>
											<?php endif; ?>	

										</div>

									</div>
								</div>
							</div>
						</div>
					</div></div>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>
<?php 
    // Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); ?>
<?php endif; ?>
<?php
$output = ob_get_contents();
ob_end_clean(); 
return  $output;
}?>
<?php
add_shortcode( 'subservices2', 'subservices2' );?>




<?php function subservices3($atts, $content = null){
	ob_start();
	global $porto_settings, $porto_layout, $post, $porto_member_socials;
	$featured_posts = get_field($atts['field']);
	if( $featured_posts ): ?>
		<div class="container">
			<?php  foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
				setup_postdata($post); 
				?>
				<div class="row  p-3 mb-3 shadow-hm-zw">
					<div class="col-2 pl-0 d-none d-lg-block">
						<?php the_post_thumbnail('thumbnail'); ?>
					</div>
					<div class="col-12 col-md-12 col-lg-10">
						<div class="row">
							<div class="col-4 col-md-2 d-block d-lg-none">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>
							<div class="col-8 col-md-10 d-block title-block">
								<a href="<?php the_permalink(); ?>"><h3 class="mb-0 mb-lg-3"><?php the_title(); ?></h3></a>
							</div>
							<div class="porto-separator col-12  mt-3 mt-lg-0"><hr class=" separator-line align_center solid" style="background-color:rgba(0,0,0,0.06);"></div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<?php $featured_posts1 = get_field('spisok_podkategorij_dlya_vyvoda');

								if( $featured_posts1 ): ?>
									<ul class="ulli list-serviсes-hm list list-icons mb-0">
										<?php  foreach( $featured_posts1 as $post ): 
        // Setup this post for WP functions (variable must be named $post).
											setup_postdata($post); 
											?>
											<li class="mb-2 list-item">
												<a class="text-secondary" title="Перейти к услуге <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</li>
										<?php endforeach; ?>
									</ul>
									<?php 
    // Reset the global post object so that the rest of the page works correctly.
									wp_reset_postdata(); ?>
								<?php endif; ?>	
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php 
    // Reset the global post object so that the rest of the page works correctly.
		wp_reset_postdata(); ?>
	<?php endif; ?>
	<?php
	$output = ob_get_contents();
	ob_end_clean(); 
	return  $output;
}?>
<?php
add_shortcode( 'subservices3', 'subservices3' );?>










