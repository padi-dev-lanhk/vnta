<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Cryptlight_Shortcode') ){
    
    class Cryptlight_Shortcode {

        public function __construct() {

            add_shortcode( 'cryptlight-elementor-template', array( $this, 'cryptlight_elementor_template' ) );
            
        }

        public function cryptlight_elementor_template( $atts ){

            $atts = extract( shortcode_atts(
            array(
                'id'  => '',
            ), $atts) );

            $args = array(
                'id' => $id
                
            );

            if( did_action( 'elementor/loaded' ) ){
                return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );    
            }
            return;

            
        }

        

    }
}



return new Cryptlight_Shortcode();

