<?php
use Elementor\Controls_Manager;

class TS_Elementor_Widget_Banner extends TS_Elementor_Widget_Base{
	public function get_name(){
        return 'ts-banner';
    }
	
	public function get_title(){
        return esc_html__( 'TS Banner', 'themesky' );
    }
	
	public function get_categories(){
        return array( 'ts-elements', 'general' );
    }
	
	public function get_icon(){
		return 'eicon-image';
	}
	
	protected function register_controls(){
		$this->start_controls_section(
            'section_general'
            ,array(
                'label' 	=> esc_html__( 'General', 'themesky' )
                ,'tab'   	=> Controls_Manager::TAB_CONTENT
            )
        );
		
		$this->add_control(
            'banner_style'
            ,array(
                'label' 		=> esc_html__( 'Banner Style', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'banner-default'
				,'options'		=> array(
									'banner-default'		=> esc_html__( 'Default', 'themesky' )
									,'text-under-image'		=> esc_html__( 'Text Under Image', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'banner_min_height'
            ,array(
                'label'     	=> esc_html__( 'Banner Min Height(px)', 'themesky' )
                ,'type'     	=> Controls_Manager::NUMBER
				,'default'  	=> '200'
				,'condition'	=> array( 'banner_style' => array( 'banner-default' ) )
				,'selectors'	=> array(
					'{{WRAPPER}} .banner-bg img' => 'min-height: {{VALUE}}px'
				)
            )
        );
		
		$this->add_control(
            'img_bg'
            ,array(
                'label' 		=> esc_html__( 'Background Image', 'themesky' )
                ,'type' 		=> Controls_Manager::MEDIA
                ,'default' 		=> array( 'id' => '', 'url' => '' )		
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'sub_heading'
            ,array(
                'label' 		=> esc_html__( 'Sub Heading', 'themesky' )
                ,'type' 		=> Controls_Manager::TEXT
                ,'default' 		=> ''		
                ,'description' 	=> ''
            )
        );
		
		$this->add_responsive_control(
			'sub_heading_size',
			[
				'label' => __( 'Font Size Sub Heading(px)', 'themesky' )
				,'type' => Controls_Manager::SLIDER
				,'range' => [
					'px' => [
						'min' => 0
						,'max' => 100
					]
				]
				,'devices' => [ 'desktop', 'tablet', 'mobile' ]
				,'desktop_default' => [
					'size' => 22
					,'unit' => 'px'
				]
				,'tablet_default' => [
					'size' => 17
					,'unit' => 'px'
				]
				,'mobile_default' => [
					'size' => 17
					,'unit' => 'px'
				]
				,'selectors' => [
					'{{WRAPPER}} .box-content h6' => 'font-size: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
            'heading_title'
            ,array(
                'label' 		=> esc_html__( 'Heading', 'themesky' )
                ,'type' 		=> Controls_Manager::TEXTAREA
                ,'default' 		=> ''		
                ,'description' 	=> ''
            )
        );
		
		$this->add_responsive_control(
			'heading_size',
			[
				'label' => __( 'Font Size Heading(px)', 'themesky' )
				,'type' => Controls_Manager::SLIDER
				,'range' => [
					'px' => [
						'min' => 0
						,'max' => 100
					]
				]
				,'devices' => [ 'desktop', 'tablet', 'mobile' ]
				,'desktop_default' => [
					'size' => 55
					,'unit' => 'px'
				]
				,'tablet_default' => [
					'size' => 40
					,'unit' => 'px'
				]
				,'mobile_default' => [
					'size' => 30
					,'unit' => 'px'
				]
				,'selectors' => [
					'{{WRAPPER}} .box-content h2' => 'font-size: {{SIZE}}{{UNIT}};'
				]
			]
		);
		
		$this->add_control(
            'description'
            ,array(
                'label' 		=> esc_html__( 'Description', 'themesky' )
                ,'type' 		=> Controls_Manager::TEXT
                ,'default' 		=> ''		
                ,'description' 	=> ''
            )
        );
		
		$this->add_responsive_control(
			'description_size',
			[
				'label' => __( 'Font Size Description(px)', 'themesky' )
				,'type' => Controls_Manager::SLIDER
				,'range' => [
					'px' => [
						'min' => 0
						,'max' => 100
					]
				]
				,'devices' => [ 'desktop', 'tablet', 'mobile' ]
				,'desktop_default' => [
					'size' => 22
					,'unit' => 'px'
				]
				,'tablet_default' => [
					'size' => 17
					,'unit' => 'px'
				]
				,'mobile_default' => [
					'size' => 17
					,'unit' => 'px'
				]
				,'selectors' => [
					'{{WRAPPER}} .box-content .description' => 'font-size: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
            'text_position'
            ,array(
                'label' 		=> esc_html__( 'Banner Text Position', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'left-top'
				,'options'		=> array(
									'left-top'			=> esc_html__( 'Left Top', 'themesky' )
									,'left-bottom'		=> esc_html__( 'Left Bottom', 'themesky' )
									,'left-center'		=> esc_html__( 'Left Center', 'themesky' )
									,'right-top'		=> esc_html__( 'Right Top', 'themesky' )
									,'right-bottom'		=> esc_html__( 'Right Bottom', 'themesky' )
									,'right-center'		=> esc_html__( 'Right Center', 'themesky' )
									,'center-top'		=> esc_html__( 'Center Top', 'themesky' )
									,'center-bottom'	=> esc_html__( 'Center Bottom', 'themesky' )
									,'center-center'	=> esc_html__( 'Center Center', 'themesky' )
								)			
                ,'description' 	=> ''
				,'condition'	=> array( 'banner_style' => array( 'banner-default' ) )
            )
        );
		
		$this->add_control(
            'text_color'
            ,array(
                'label'     	=> esc_html__( 'Text Color', 'themesky' )
                ,'type'     	=> Controls_Manager::COLOR
				,'default'  	=> '#ffffff'
				,'selectors'	=> array(
					'{{WRAPPER}} .box-content h2, {{WRAPPER}} .box-content h6, {{WRAPPER}} .box-content .description, {{WRAPPER}} .style-arrow .ts-banner-button a' => 'color: {{VALUE}}'
					,'{{WRAPPER}} .style-arrow .ts-banner-button .button span.icon:before' => 'background: {{VALUE}}'
					,'{{WRAPPER}} .style-arrow .ts-banner-button .button span.icon:after' => 'color: {{VALUE}}'
				)
				,'condition'	=> array( 'banner_style' => array( 'banner-default' ) )
            )
        );		
		
		$this->add_control(
            'text_align'
            ,array(
                'label' 		=> esc_html__( 'Text Align', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'text-left'
				,'options'		=> array(
									'text-left'		=> esc_html__( 'Left', 'themesky' )
									,'text-center'	=> esc_html__( 'Center', 'themesky' )
									,'text-right'	=> esc_html__( 'Right', 'themesky' )
								)			
                ,'description' 	=> ''
            )
        );

		$this->add_control(
            'link'
            ,array(
                'label'     	=> esc_html__( 'Link', 'themesky' )
                ,'type'     	=> Controls_Manager::URL
				,'default'  	=> array( 'url' => '', 'is_external' => true, 'nofollow' => true )
				,'show_external'=> true
            )
        );
		
		$this->add_control(
            'button_style'
            ,array(
                'label' 		=> esc_html__( 'Button Style', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'nobtn'
				,'options'		=> array(
									'nobtn'					=> esc_html__( 'Hide Button', 'themesky' )
									,'button-default'		=> esc_html__( 'Button Default', 'themesky' )
									,'style-arrow'			=> esc_html__( 'Button Arrow', 'themesky' )
									
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->add_control(
            'button_text'
            ,array(
                'label' 		=> esc_html__( 'Button Text', 'themesky' )
                ,'type' 		=> Controls_Manager::TEXT
                ,'default' 		=> 'Shop Now'		
                ,'description' 	=> ''
				,'condition'	=> array( 'button_style' => array( 'button-default', 'style-arrow' ) )
            )
        );
		
		$this->add_control(
            'button_size'
            ,array(
                'label' 		=> esc_html__( 'Button Size', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'size-default'
				,'options'		=> array(
									'size-default'		=> esc_html__( 'Default', 'themesky' )
									,'size-small'	=> esc_html__( 'Small', 'themesky' )
								)			
                ,'description' 	=> ''
				,'condition'	=> array( 'button_style' => 'button-default' )
            )
        );
		
		$this->add_control(
            'button_background_color'
            ,array(
                'label'     	=> esc_html__( 'Button Background Color', 'themesky' )
                ,'type'     	=> Controls_Manager::COLOR
				,'default'  	=> '#D9121F'
				,'selectors'	=> array(
					'{{WRAPPER}} .button' => 'background-color: {{VALUE}}'
				)
				,'condition'	=> array( 'button_style' => 'button-default' )
            )
        );
		
		$this->add_control(
            'button_text_color'
            ,array(
                'label'     	=> esc_html__( 'Button Text Color', 'themesky' )
                ,'type'     	=> Controls_Manager::COLOR
				,'default'  	=> '#ffffff'
				,'selectors'	=> array(
					'{{WRAPPER}} .button' => 'color: {{VALUE}}'
				)
				,'condition'	=> array( 'button_style' => 'button-default' )
            )
        );
		
		$this->add_control(
            'button_background_color_hover'
            ,array(
                'label'     	=> esc_html__( 'Button Background Color Hover', 'themesky' )
                ,'type'     	=> Controls_Manager::COLOR
				,'default'  	=> '#ffffff'
				,'selectors'	=> array(
					'{{WRAPPER}} .button:hover' => 'background-color: {{VALUE}}'
				)
				,'condition'	=> array( 'button_style' => 'button-default' )
            )
        );
		
		$this->add_control(
            'button_text_color_hover'
            ,array(
                'label'     	=> esc_html__( 'Button Text Color Hover', 'themesky' )
                ,'type'     	=> Controls_Manager::COLOR
				,'default'  	=> '#D9121F'
				,'selectors'	=> array(
					'{{WRAPPER}} .button:hover' => 'color: {{VALUE}}'
				)
				,'condition'	=> array( 'button_style' => 'button-default' )
            )
        );

		$this->add_control(
            'style_effect'
            ,array(
                'label' 		=> esc_html__( 'Style Effect', 'themesky' )
                ,'type' 		=> Controls_Manager::SELECT
                ,'default' 		=> 'eff-zoom-in'
				,'options'		=> array(									
									'eff-zoom-in'				=> esc_html__('Zoom In', 'themesky')
									,'eff-zoom-out' 			=> esc_html__('Zoom Out', 'themesky')
									,'eff-zoom-rotate' 			=> esc_html__('Rotate and zoom in', 'themesky')
									,'eff-flash' 				=> esc_html__('Flash', 'themesky')
									,'eff-line' 				=> esc_html__('Line', 'themesky')
									,'no-effect' 				=> esc_html__('None', 'themesky')
								)			
                ,'description' 	=> ''
            )
        );
		
		$this->end_controls_section();
	}
	
	protected function render(){
		$settings = $this->get_settings_for_display();
		
		$default = array(
			'banner_style'						=> 'style-default'
			,'img_bg'							=> array( 'id' => '', 'url' => '' )
			,'sub_heading'						=> ''
			,'heading_title'					=> ''
			,'description'						=> ''
			,'sub_heading_size'					=> '22'
			,'heading_size'						=> '55'
			,'description_size'					=> '22'
			,'text_color'						=> '#ffffff'
			,'text_align'						=> 'text-left'
			,'text_position'					=> 'left-top'
			,'button_style'						=> 'nobtn'
			,'button_text'						=> 'Shop Now'
			,'button_size'						=> 'size-default'
			,'button_background_color'			=> '#D9121F'
			,'button_text_color'				=> '#ffffff'
			,'button_background_color_hover'	=> '#ffffff'
			,'button_text_color_hover'			=> '#D9121F'
			,'link' 							=> array( 'url' => '', 'is_external' => true, 'nofollow' => true )
			,'style_effect'						=> 'eff-zoom-in'
		);
		
		$settings = wp_parse_args( $settings, $default );
		
		extract( $settings );
		
		$link_attr = $this->generate_link_attributes( $link );
		
		$classes = array();
		$classes[] = $banner_style;
		$classes[] = $text_align;
		$classes[] = $style_effect;
		$classes[] = $button_style;
		$classes[] = $button_size;
		$classes[] = $text_position;
		?>
		<div class="ts-banner <?php echo esc_attr( implode(' ', $classes) ); ?>">
			<div class="banner-wrapper">
			
				<?php if( $link_attr ): ?>
				<a class="banner-link" <?php echo implode(' ', $link_attr); ?>></a>
				<?php endif;?>
					
				<div class="banner-bg">
					<div class="bg-content">
					<?php echo wp_get_attachment_image($img_bg['id'], 'full', 0, array('class'=>'img')); ?>
					</div>
				</div>
							
				<div class="box-content">
					<div>
					
						<?php if( $sub_heading ): ?>
						<h6><?php echo esc_attr($sub_heading) ?></h6>
						<?php endif; ?>
					
						<?php if( $heading_title ): ?>				
						<h2><?php echo wp_kses( $heading_title, array( 'br' => array() ) ); ?></h2>
						<?php endif; ?>
						
						<?php if( $description ): ?>				
						<div class="description"><?php echo esc_attr($description) ?></div>
						<?php endif; ?>
						
						<?php if( $button_text ):?>
						<div class="ts-banner-button">
							<a class="button" <?php echo implode(' ', $link_attr); ?>>
							
								<?php if( $text_align != 'text-right' ):?>
								<span><?php echo esc_attr($button_text) ?></span>
								<?php endif; ?>
								
								<?php if( $button_style == 'style-arrow' ):?>
								<span class="icon"></span>
								<?php endif; ?>
								
								<?php if( $text_align == 'text-right' ):?>
								<span><?php echo esc_attr($button_text) ?></span>
								<?php endif; ?>
								
							</a>
						</div>
						<?php endif; ?>
						
					</div>
				</div>
				
			</div>
		</div>
		<?php
	}
}

$widgets_manager->register( new TS_Elementor_Widget_Banner() );