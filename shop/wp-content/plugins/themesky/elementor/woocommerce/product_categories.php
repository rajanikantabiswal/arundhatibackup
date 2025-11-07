<?php
use Elementor\Controls_Manager;

class TS_Elementor_Widget_Product_Categories extends TS_Elementor_Widget_Base{
	public function get_name(){
        return 'ts-product-categories';
    }
	
	public function get_title(){
        return esc_html__( 'TS Product Categories', 'themesky' );
    }
	
	public function get_categories(){
        return array( 'ts-elements', 'woocommerce-elements' );
    }
	
	public function get_icon(){
		return 'eicon-product-categories';
	}
	
	protected function register_controls(){
		$this->start_controls_section(
            'section_general'
            ,array(
                'label' 	=> esc_html__( 'General', 'themesky' )
                ,'tab'   	=> Controls_Manager::TAB_CONTENT
            )
        );
		
		$this->add_title_and_style_controls();
		
		$this->add_control(
            'style'
            ,array(
                'label' 		=> esc_html__( 'Style', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'default'
				,'options'		=> array(
									'default'	=> esc_html__( 'Default', 'themesky' )
									,'icon'		=> esc_html__( 'Icon', 'themesky' )
									,'grid'		=> esc_html__( 'Grid', 'themesky' )
								)			
                ,'description' 	=> esc_html__( 'Slider is only available with the Default style', 'themesky' )
            )
        );
		
		$this->add_control(
            'columns'
            ,array(
                'label'     	=> esc_html__( 'Columns', 'themesky' )
                ,'type'     	=> Controls_Manager::NUMBER
				,'default'  	=> 4
				,'min'      	=> 1
            )
        );
		
		$this->add_control(
            'limit'
            ,array(
                'label'     	=> esc_html__( 'Limit', 'themesky' )
                ,'type'     	=> Controls_Manager::NUMBER
				,'default'  	=> 5
				,'min'      	=> 1
            )
        );

		$this->add_control(
            'first_level'
            ,array(
                'label' 		=> esc_html__( 'Only display the first level', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'parent'
            ,array(
                'label' 		=> esc_html__( 'Parent', 'themesky' )
                ,'type' 		=> 'ts_autocomplete'
                ,'default' 		=> array()
				,'options'		=> array()
				,'autocomplete'	=> array(
					'type'		=> 'taxonomy'
					,'name'		=> 'product_cat'
				)
				,'multiple' 	=> false
				,'sortable' 	=> false
				,'label_block' 	=> true
				,'description' 	=> esc_html__( 'Get direct children of this category', 'themesky' )
				,'condition'	=> array( 'first_level' => '0' )
            )
        );
		
		$this->add_control(
            'child_of'
            ,array(
                'label' 		=> esc_html__( 'Child of', 'themesky' )
                ,'type' 		=> 'ts_autocomplete'
                ,'default' 		=> array()
				,'options'		=> array()
				,'autocomplete'	=> array(
					'type'		=> 'taxonomy'
					,'name'		=> 'product_cat'
				)
				,'multiple' 	=> false
				,'sortable' 	=> false
				,'label_block' 	=> true
				,'description' 	=> esc_html__( 'Get all descendents of this category', 'themesky' )
				,'condition'	=> array( 'first_level' => '0' )
            )
        );
		
		$this->add_control(
            'ids'
            ,array(
                'label' 		=> esc_html__( 'Specific categories', 'themesky' )
                ,'type' 		=> 'ts_autocomplete'
                ,'default' 		=> array()
				,'options'		=> array()
				,'autocomplete'	=> array(
					'type'		=> 'taxonomy'
					,'name'		=> 'product_cat'
				)
				,'multiple' 	=> true
				,'label_block' 	=> true
            )
        );
		
		$this->add_control(
            'hide_empty'
            ,array(
                'label' 		=> esc_html__( 'Hide empty product categories', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '1'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'show_title'
            ,array(
                'label' 		=> esc_html__( 'Show product category title', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '1'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'show_product_count'
            ,array(
                'label' 		=> esc_html__( 'Show product count', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_responsive_control(
			'min_height',
			[
				'label' => __( 'Min Height(px)', 'themesky' )
				,'type' => Controls_Manager::SLIDER
				,'range' => [
					'px' => [
						'min' => 0
						,'max' => 1000
					]
				]
				,'condition'	=> array( 'style' => array( 'grid' ) )
				,'devices' => [ 'desktop', 'tablet', 'mobile' ]
				,'desktop_default' => [
					'size' => 280
					,'unit' => 'px'
				]
				,'tablet_default' => [
					'size' => 220
					,'unit' => 'px'
				]
				,'mobile_default' => [
					'size' => 250
					,'unit' => 'px'
				]
				,'selectors' => [
					'{{WRAPPER}} .products .product-category .product-wrapper' => 'min-height: {{SIZE}}{{UNIT}}'
				]
			]
		);
		
		$this->add_responsive_control(
			'image_width',
			[
				'label' => __( 'Category Image Width(%)', 'themesky' )
				,'type' => Controls_Manager::SLIDER
				,'range' => [
					'px' => [
						'min' => 0
						,'max' => 100
					]
				]
				,'condition'	=> array( 'style' => array( 'grid' ) )
				,'devices' => [ 'desktop', 'tablet', 'mobile' ]
				,'desktop_default' => [
					'size' => 60
					,'unit' => '%'
				]
				,'tablet_default' => [
					'size' => 60
					,'unit' => '%'
				]
				,'mobile_default' => [
					'size' => 75
					,'unit' => '%'
				]
				,'selectors' => [
					'{{WRAPPER}} .products .product-category .product-wrapper > a img' => 'width: {{SIZE}}{{UNIT}} !important'
				]
			]
		);
		
		$this->add_responsive_control(
			'image_v_align_offset',
			[
				'label' => __( 'Image Align Offset Top(px)', 'themesky' )
				,'type' => Controls_Manager::SLIDER
				,'range' => [
					'px' => [
						'min' => -200
						,'max' => 200
					]
				]
				,'condition'	=> array( 'style' => array( 'grid' ) )
				,'devices' => [ 'desktop', 'tablet', 'mobile' ]
				,'desktop_default' => [
					'size' => 0
					,'unit' => 'px'
				]
				,'tablet_default' => [
					'size' => 0
					,'unit' => 'px'
				]
				,'mobile_default' => [
					'size' => 0
					,'unit' => 'px'
				]
				,'selectors' => [
					'{{WRAPPER}} .products .product-category .product-wrapper > a img' => 'top: {{SIZE}}{{UNIT}};'
				]
			]
		);
		
		$this->add_responsive_control(
			'category_name_size',
			[
				'label' => __( 'Font Size Product Category Name(px)', 'themesky' )
				,'type' => Controls_Manager::SLIDER
				,'range' => [
					'px' => [
						'min' => 0
						,'max' => 100
					]
				]
				,'condition'	=> array( 'style' => array( 'grid' ) )
				,'devices' => [ 'desktop', 'tablet', 'mobile' ]
				,'desktop_default' => [
					'size' => 25
					,'unit' => 'px'
				]
				,'tablet_default' => [
					'size' => 25
					,'unit' => 'px'
				]
				,'mobile_default' => [
					'size' => 25
					,'unit' => 'px'
				]
				,'selectors' => [
					'{{WRAPPER}} .product-category .category-name h3' => 'font-size: {{SIZE}}{{UNIT}};'
				]
			]
		);
		
		$this->add_control(
            'background_color'
            ,array(
                'label'     	=> esc_html__( 'Category Background Color', 'themesky' )
                ,'type'     	=> Controls_Manager::COLOR
				,'default'  	=> '#f2f2f2'
				,'selectors'	=> array(
					'{{WRAPPER}} .products .product-category > .product-wrapper > a' => 'background: {{VALUE}}'
				)
				,'condition'	=> array( 'style!' => 'icon' )
            )
        );
		
		$this->end_controls_section();
		
		$this->start_controls_section(
            'section_slider'
            ,array(
                'label' 	=> esc_html__( 'Slider', 'themesky' )
                ,'tab'   	=> Controls_Manager::TAB_CONTENT
            )
        );
		
		$this->add_control(
            'is_slider'
            ,array(
                'label' 		=> esc_html__( 'Show in a carousel slider', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'show_nav'
            ,array(
                'label' 		=> esc_html__( 'Show navigation button', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '1'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'show_dots'
            ,array(
                'label' 		=> esc_html__( 'Show dots navigation', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> esc_html__( 'If enabled, the navigation buttons will be removed', 'themesky' )
            )
        );
		
		$this->add_control(
            'auto_play'
            ,array(
                'label' 		=> esc_html__( 'Auto play', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> '0'
				,'options'		=> array(
									'0'		=> esc_html__( 'No', 'themesky' )
									,'1'	=> esc_html__( 'Yes', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->end_controls_section();
	}
	
	protected function render(){
		$settings = $this->get_settings_for_display();
		
		$default = array(
			'title'						=> ''
			,'style'					=> 'default'
			,'is_slider'				=> 0
			,'per_page' 				=> 5
			,'columns' 					=> 4
			,'min_height' 				=> 280
			,'image_width' 				=> 60
			,'image_v_align_offset' 	=> 15
			,'category_name_size' 		=> 25
			,'first_level' 				=> 0
			,'parent' 					=> ''
			,'child_of' 				=> 0
			,'ids'	 					=> ''
			,'hide_empty'				=> 1
			,'show_title'				=> 1
			,'show_product_count'		=> 0
			,'view_shop_button_text'	=> ''
			,'show_nav' 				=> 1
			,'show_dots'				=> 0
			,'auto_play' 				=> 1
		);
		
		$settings = wp_parse_args( $settings, $default );
		
		extract( $settings );
		
		if ( !class_exists('WooCommerce') ){
			return;
		}
		
		if( is_admin() && !wp_doing_ajax() ){ /* WooCommerce does not include hook below in Elementor editor */
			add_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
		}
		
		if( $style == 'icon' ){
			remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
			add_action( 'woocommerce_before_subcategory_title', array($this, 'category_icon'), 10 );
		}
		
		if( $first_level ){
			$parent = $child_of = 0;
		}
		
		$parent = is_array($parent) ? implode('', $parent) : $parent;
		$child_of = is_array($child_of) ? implode('', $child_of) : $child_of;

		$args = array(
			'taxonomy'	  => 'product_cat'
			,'orderby'    => 'name'
			,'order'      => 'ASC'
			,'hide_empty' => $hide_empty
			,'pad_counts' => true
			,'parent'     => $parent
			,'child_of'   => $child_of
			,'number'     => $limit
		);
		
		if( $ids ){
			$args['include'] = $ids;
			$args['orderby'] = 'include';
		}
		
		$product_categories = get_terms( $args );
		
		$old_woocommerce_loop_columns = wc_get_loop_prop('columns');
		wc_set_loop_prop('columns', $columns);
		
		wc_set_loop_prop( 'is_shortcode', true );

		if( $show_dots ){
			$show_nav = 0;
		}
		
		if( $style != 'default' ){
			$is_slider = 0;
		}
		
		if( count($product_categories) > 0 ):
			$classes = array();
			$classes[] = 'ts-product-category-wrapper ts-product ts-shortcode woocommerce';
			$classes[] = 'columns-' . $columns;
			$classes[] = 'style-' . $style;
			$classes[] = $is_slider?'ts-slider':'grid';
			if( $is_slider && $show_nav ){
				$classes[] = 'show-nav';
			}
			if( $view_shop_button_text ){
				$classes[] = 'show-button';
			}
			if( $show_dots ){
				$classes[] = 'show-dots';
			}
		
			$data_attr = array();
			if( $is_slider ){
				$data_attr[] = 'data-nav="'.$show_nav.'"';
				$data_attr[] = 'data-dots="'.$show_dots.'"';
				$data_attr[] = 'data-autoplay="'.$auto_play.'"';
				$data_attr[] = 'data-columns="'.$columns.'"';
			}
		?>
			<div class="<?php echo esc_attr(implode(' ', $classes)) ?>" <?php echo implode(' ', $data_attr); ?>>
			
				<?php if( $title ): ?>
				<header class="shortcode-heading-wrapper">
					<h2 class="shortcode-title">
						<?php echo esc_html($title); ?>
					</h2>
				</header>
				<?php endif; ?>
				
				<div class="content-wrapper <?php echo $is_slider?'loading':''; ?>">
					<?php 
					woocommerce_product_loop_start();
					foreach ( $product_categories as $category ) {
						wc_get_template( 'content-product-cat.php', array(
							'category' 					=> $category
							,'show_title' 				=> $show_title
							,'show_product_count' 		=> $show_product_count
							,'view_shop_button_text' 	=> $view_shop_button_text
						) );
					}
					woocommerce_product_loop_end();
					?>
				</div>
			</div>
		<?php
		endif;
		
		if( $style == 'icon' ){
			add_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
			remove_action( 'woocommerce_before_subcategory_title', array($this, 'category_icon'), 10 );
		}
		
		wc_set_loop_prop('columns', $old_woocommerce_loop_columns);
		
		wc_set_loop_prop( 'is_shortcode', false );
	}
	
	function category_icon( $category ){
		$icon_id = get_term_meta($category->term_id, 'icon_id', true);
		if( $icon_id ){
			echo wp_get_attachment_image( $icon_id );
		}
		else{
			echo wc_placeholder_img();
		}
	}
}

$widgets_manager->register( new TS_Elementor_Widget_Product_Categories() );