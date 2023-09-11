<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Cryptlight_Hooks') ){
	
	class Cryptlight_Hooks {

		public function __construct() {
			
			// Return HTML for Header
			add_filter( 'cryptlight_render_header', array( $this, 'cryptlight_render_header' ) );

			// Return HTML for Footer
			add_filter( 'cryptlight_render_footer', array( $this, 'cryptlight_render_footer' ) );


			/* Get All Header */
			add_filter( 'cryptlight_list_header', array( $this, 'cryptlight_list_header' ) );

			/* Get All Footer */
			add_filter( 'cryptlight_list_footer', array( $this,  'cryptlight_list_footer' ) );

			/* Define Layout */
			add_filter( 'cryptlight_define_layout', array( $this,  'cryptlight_define_layout' ) );

			/* Define Wide */
			add_filter( 'cryptlight_define_wide_boxed', array( $this,  'cryptlight_define_wide_boxed' ) );

			/* Get layout */
			add_filter( 'cryptlight_get_layout', array( $this, 'cryptlight_get_layout' ) );

			/* Get sidebar */
			add_filter( 'cryptlight_theme_sidebar', array( $this, 'cryptlight_theme_sidebar' )  );
			

			/* Wide or Boxed */
			add_filter( 'cryptlight_wide_site', array( $this, 'cryptlight_wide_site' ) );

			/* Get Blog Template */
			add_filter( 'cryptlight_blog_template', array( $this, 'cryptlight_blog_template' ) );
			

	    }

		
		public function cryptlight_render_header(){

			$current_id = cryptlight_get_current_id();

			// Get header default from customizer
			$global_header = get_theme_mod('global_header','default');

			// Header in Metabox of Post, Page
		    $meta_header = get_post_meta($current_id, 'ova_met_header_version', 'true');
		  	
		    // Header use in post,page
		    if( $current_id != '' && $meta_header != 'global'  && $meta_header != '' ){

		    	$header = $meta_header;

		  	}else if( cryptlight_is_blog_archive() ){ // Header use in blog

		  		$header = get_theme_mod('blog_header', 'default');

		  	}else if( is_singular('post') ){ // Header use in single post

		  		$header = get_theme_mod('single_header', 'default');

		  	}else{ // Header use in global

		  		$header = $global_header;
		  	}
			

			$header_split = explode(',', apply_filters( 'cryptlight_header_customize', $header, $header ));

			if ( cryptlight_is_elementor_active() && isset( $header_split[1] ) ) {

				$post_id_header = cryptlight_get_id_by_slug( $header_split[1] );

				// Check WPML 
				if( function_exists( 'icl_object_id' ) ){
					$post_id_header = icl_object_id($post_id_header, 'ova_framework_hf_el', false);	
				}
				
				return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id_header );

			}else if ( cryptlight_is_elementor_active() && !isset( $header_split[1] ) ) {

				return get_template_part( 'template-parts/header', $header_split[0] );

			}else if ( !cryptlight_is_elementor_active()  ) {

				return get_template_part( 'template-parts/header', 'default' );

			}

		}


		
		public function cryptlight_render_footer(){

			$current_id = cryptlight_get_current_id();

			// Get Footer default from customizer
			$global_footer = get_theme_mod('global_footer', 'default' );

			// Footer in Metabox of Post, Page
		    $meta_footer =  get_post_meta( $current_id, 'ova_met_footer_version', 'true' );
			
		  	

		  	if( $current_id != '' && $meta_footer != 'global'  && $meta_footer != '' ){

		  		$footer = $meta_footer;

		  	}else if( cryptlight_is_blog_archive() ){

		  		$footer = get_theme_mod('blog_footer', 'default');

		  	}else if( is_singular('post') ){

		  		$footer = get_theme_mod('single_footer', 'default');

		  	}else{

		  		$footer = $global_footer;
		  		
		  	}

		  	
		  	$footer_split = explode(',', apply_filters( 'cryptlight_footer_customize', $footer, $footer ));

			if ( cryptlight_is_elementor_active() && isset( $footer_split[1] ) ) {

				$post_id_footer = cryptlight_get_id_by_slug( $footer_split[1] );

				// Check WPML 
				if( function_exists( 'icl_object_id' ) ){
					$post_id_footer = icl_object_id($post_id_footer, 'ova_framework_hf_el', false);	
				}

				return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id_footer );
				
			}else if ( cryptlight_is_elementor_active() && !isset( $footer_split[1] ) ) {

				get_template_part( 'template-parts/footer', $footer_split[0] );

			}else if( !cryptlight_is_elementor_active() ){

				get_template_part( 'template-parts/footer', 'default' );			
			}
		}



		function cryptlight_list_header(){

		    $hf_header_array['default'] = esc_html__( 'Default', 'cryptlight' );

		    if( !cryptlight_is_elementor_active() ) return $hf_header_array;

		    $args_hf = array(
		        'post_type' => 'ova_framework_hf_el',
		        'post_status'   => 'publish',
		        'posts_per_page' => '-1',
		        'meta_query' => array(
		            array(
		                'key'     => 'hf_options',
		                'value'   => 'header',
		                'compare' => '=',
		            ),
		        )
		    );

		    $hf = new WP_Query( $args_hf );

		    if($hf->have_posts()):  while($hf->have_posts()) : $hf->the_post();
		        global $post;
		        $hf_header_array[ 'ova,'.$post->post_name ] = get_the_title();

		    endwhile;endif; wp_reset_postdata();

		    return $hf_header_array;
		}

		
		function cryptlight_list_footer(){

		    $hf_footer_array['default'] = esc_html__( 'Default', 'cryptlight' );

		    if( !cryptlight_is_elementor_active() ) return $hf_footer_array;

		    $args_hf = array(
		        'post_type' => 'ova_framework_hf_el',
		        'post_status'   => 'publish',
		        'posts_per_page' => '-1',
		        'meta_query' => array(
		            array(
		                'key'     => 'hf_options',
		                'value'   => 'footer',
		                'compare' => '=',
		            ),
		        )
		    );

		    $hf = new WP_Query( $args_hf );

		    if($hf->have_posts()):  while($hf->have_posts()) : $hf->the_post();
		        global $post;
		        $hf_footer_array[ 'ova,'.$post->post_name ] = get_the_title();

		    endwhile;endif; wp_reset_postdata();

		    return $hf_footer_array;
		}


		function cryptlight_define_layout(){
			return array(
				'layout_1c' => esc_html__('No Sidebar', 'cryptlight'),
				'layout_2r' => esc_html__('Right Sidebar', 'cryptlight'),
				'layout_2l' => esc_html__('Left Sidebar', 'cryptlight'),
			);
		}
		

		function cryptlight_get_layout(){
			
			$current_id = cryptlight_get_current_id();

			$layout = get_post_meta( $current_id, 'ova_met_main_layout', true );
			$width_sidebar = get_theme_mod( 'global_sidebar_width', '320' );

			if( is_singular( 'post' ) ){

			    $layout = get_theme_mod( 'single_layout', 'layout_2r' );
			    

			}else if( cryptlight_is_woo_active() && is_product() ){

				$layout = get_theme_mod( 'woo_product_layout', 'woo_layout_1c' );
				$width_sidebar = get_theme_mod( 'woo_sidebar_width', '320' );

			} else if( cryptlight_is_woo_active() && ( is_product_category() || is_product_tag() || is_shop() ) ){
				
				$layout = get_theme_mod( 'woo_archive_layout', 'woo_layout_1c' );
				$width_sidebar = get_theme_mod( 'woo_sidebar_width', '320' );

			}else if( cryptlight_is_blog_archive() ){

			    $layout = get_theme_mod( 'blog_layout', 'layout_2r' );

			}

			if( $current_id ){

			    $layout = get_post_meta( $current_id, 'ova_met_main_layout', true );

			    if( $layout == 'global' && is_singular( 'post' ) ){

			    	$layout = get_theme_mod( 'single_layout', 'layout_2r' );
			    	


			    } else if( $layout == 'global' && !is_singular( 'post' ) ){

			    	$layout = get_theme_mod( 'global_layout', 'layout_2r' );
			    	

			    }

			}

			// Check if page is posts (settings >> reading >> posts page)
			if( get_option( 'page_for_posts' ) == $current_id ){
				
				$layout = get_post_meta( $current_id, 'ova_met_main_layout', true );
				if( $layout == 'global' ) $layout = get_theme_mod( 'blog_layout', 'layout_2r' );

			}


			if( isset( $_GET['layout_sidebar'] ) ){
				$layout = $_GET['layout_sidebar'];
			}

			if( !$layout ){
				$layout = get_theme_mod( 'global_layout', 'layout_2r' );
			    $width_sidebar = get_theme_mod( 'global_sidebar_width', '320' );
			}

			if( cryptlight_is_woo_active() && ( is_product_category() || is_product_tag() || is_shop() ) ){
				if( !is_active_sidebar('woo-sidebar') ){
					$layout = 'woo_layout_1c';
					$width_sidebar = 0;
				}
			}else if( cryptlight_is_woo_active() && is_product() ){
				if( !is_active_sidebar('woo-sidebar') ){
					$layout = 'woo_layout_1c';
					$width_sidebar = 0;
				}
			}else if( !is_active_sidebar('main-sidebar') ){
					$layout = 'layout_1c';
					$width_sidebar = 0;
			}
			

			return array( $layout, $width_sidebar );
		}

		


		function cryptlight_wide_site(){
			$current_id = cryptlight_get_current_id();
			$width_site = get_post_meta( $current_id, 'ova_met_wide_site', true );

			if( $current_id && $width_site != 'global' ){
			    $width = $width_site;
			}else{
				$width = get_theme_mod( 'global_wide_site', 'wide' );
			}

			return $width;
		}

		function cryptlight_theme_sidebar(){
			$layout_sidebar = apply_filters( 'cryptlight_get_layout', '' );
			return $layout_sidebar[0];
		}

		function cryptlight_define_wide_boxed(){
			return array(
				'wide' => esc_html__('Wide', 'cryptlight'),
				'boxed' => esc_html__('Boxed', 'cryptlight'),
			);
		}

		function cryptlight_blog_template(){
			$blog_template = get_theme_mod( 'blog_template', 'default' );
			if( isset( $_GET['blog_template'] ) ){
				$blog_template = $_GET['blog_template'];
			}
			return $blog_template;
		}
		


	}
}

new Cryptlight_Hooks();

