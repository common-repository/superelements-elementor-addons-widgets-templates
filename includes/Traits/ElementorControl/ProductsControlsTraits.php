<?php

namespace SuperElement\ElementorControl\Traits;

use Elementor\Controls_Manager;
use  SuperElement\Traits\ProductsTrait;
use \SuperElement\Modules\Controls_Manager as Super_Element_Controls_Manager;
if (!defined('ABSPATH')) {
    exit;
}

trait ProductsControlsTraits
{
    use ProductsTrait;
    protected $fields=[];
    private function add_query_controls()
    {
        $this->start_controls_section(
            'section_query',
            [
                'label' => esc_html__('Query', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'products_type',
            [
                'label' => esc_html__('Source', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'products',
                'options' => [
                    'products' => esc_html__('Latest Product', 'superelements-elementor-addons-widgets-templates'),
                    'featured_products' => esc_html__('Featured', 'superelements-elementor-addons-widgets-templates'),
                    'by_ids' => esc_html__( 'Manual Selection', 'superelements-elementor-addons-widgets-templates' ),                    
                ],
            ]
        );
        $this->add_control(
            'product_cat',
            [
                'label' => esc_html__('By Category', 'superelements-elementor-addons-widgets-templates'),
                'type' => Super_Element_Controls_Manager::AJAXSELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' =>'ajaxselect2/product_cat',
                'label_block' => true,
                'condition' => [
                    'products_type!' => ['by_ids']
                ],
        
            ]
        );
        $this->add_control(
            'product_tag',
            [
                'label' => esc_html__('By Tag', 'superelements-elementor-addons-widgets-templates'),
                'type' => Super_Element_Controls_Manager::AJAXSELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' =>'ajaxselect2/product_tags',
                'label_block' => true,
                'condition' => [
                    'products_type!' => ['by_ids']
                ],
            ]
        );
        $this->add_control(
            'prodcut_by_ids',
            [
                'label' =>esc_html__('Select Prodcut', 'superelements-elementor-addons-widgets-templates'),
                'type'      => Super_Element_Controls_Manager::AJAXSELECT2,
                'options'   =>'ajaxselect2/product_list',
                'label_block' => true,
                'multiple'  => true,
                'condition' => [
                    'products_type' => ['by_ids']
                ],
            ]
           );
        //TODO:Refactor needed
        $fields['orderby']= [
			'label' => esc_html__( 'Order By', 'superelements-elementor-addons-widgets-templates' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'post_date',
			'options' => [
				'post_date' => esc_html__( 'Date', 'superelements-elementor-addons-widgets-templates' ),
				'post_title' => esc_html__( 'Title', 'superelements-elementor-addons-widgets-templates' ),
				'menu_order' => esc_html__( 'Menu Order', 'superelements-elementor-addons-widgets-templates' ),
				'modified' => esc_html__( 'Last Modified', 'superelements-elementor-addons-widgets-templates' ),
				'comment_count' => esc_html__( 'Comment Count', 'superelements-elementor-addons-widgets-templates' ),
				'rand' => esc_html__( 'Random', 'superelements-elementor-addons-widgets-templates' ),
			],
		];
        $this->add_control(
            'orderby',
            $fields['orderby']
        );
       
        //TODO:Refactor needed
        $fields['order']= [
			'label' => esc_html__( 'Order', 'superelements-elementor-addons-widgets-templates' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'desc',
			'options' => [
				'asc' => esc_html__( 'ASC', 'superelements-elementor-addons-widgets-templates' ),
				'desc' => esc_html__( 'DESC', 'superelements-elementor-addons-widgets-templates' ),
			],
            'separator' => 'none'
		];
        $this->add_control(
            'order',
            $fields['order'] 
        );
        $this->end_controls_section();

    }
    //product grid settings controls
    protected function grid_settings_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Product Settings', 'superelements-elementor-addons-widgets-templates'),
            ]
        );
        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::NUMBER,
                'prefix_class' => 'se',
                'min' => 1,
                'max' => 6,
                'default' => 4,
                'tablet_default' => 3,
                'mobile_default' => 2,
                'required' => true,
            ]
        );
        $this->add_control(
            'rows',
            [
                'label' => esc_html__('Rows', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::NUMBER,
                'default' => '4',
                'render_type' => 'template',
                'range' => [
                    'px' => [
                        'max' => 20,
                    ],
                ],
            ]
        );
        $this->add_control(
            'paginate',
            [
                'label' => esc_html__('Pagination', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'allow_order',
            [
                'label' => esc_html__('Allow Order', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'condition' => [
                    'paginate' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'show_result_count',
            [
                'label' => esc_html__('Show Result Count', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'condition' => [
                    'paginate' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }
}
