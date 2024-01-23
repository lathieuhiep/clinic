<?php

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class Clinic_Elementor_Post_Grid extends Widget_Base
{
    public function get_categories(): array {
        return array('my-theme');
    }

    public function get_name(): string {
        return 'clinic-post-grid';
    }

    public function get_title(): string {
        return esc_html__('Posts Grid', 'clinic');
    }

    public function get_icon(): string {
        return 'eicon-gallery-grid';
    }

    protected function register_controls(): void {

        // Content query
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Query', 'clinic'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'select_cat',
            [
                'label' => esc_html__('Select Category Link', 'clinic'),
                'type' => Controls_Manager::SELECT2,
                'options' => clinic_check_get_cat('category'),
                'label_block' => true
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => esc_html__('Number of Posts', 'clinic'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => esc_html__('Order By', 'clinic'),
                'type' => Controls_Manager::SELECT,
                'default' => 'id',
                'options' => [
                    'id' => esc_html__('Post ID', 'clinic'),
                    'author' => esc_html__('Post Author', 'clinic'),
                    'title' => esc_html__('Title', 'clinic'),
                    'date' => esc_html__('Date', 'clinic'),
                    'rand' => esc_html__('Random', 'clinic'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'clinic'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascending', 'clinic'),
                    'DESC' => esc_html__('Descending', 'clinic'),
                ],
            ]
        );

        $this->end_controls_section();

        // Style title
        $this->start_controls_section(
            'style_title',
            [
                'label' => esc_html__('Title', 'clinic'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'clinic'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .element-post-grid .item-post__box .title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__('Color Hover', 'clinic'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .element-post-grid .item-post__box .title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .element-post-grid .item-post__box .title',
            ]
        );

        $this->end_controls_section();

        // Style meta
        $this->start_controls_section(
            'style_meta',
            [
                'label' => esc_html__('Meta', 'clinic'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'meta_color',
            [
                'label' => esc_html__('Color', 'clinic'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .element-post-grid .item-post__box .meta' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'selector' => '{{WRAPPER}} .element-post-grid .item-post__box .meta',
            ]
        );

        $this->end_controls_section();

        // Style link
        $this->start_controls_section(
            'style_link',
            [
                'label' => esc_html__('Link', 'clinic'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => esc_html__('Color', 'clinic'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .element-post-grid .action-box .btn-link-cate' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'selector' => '{{WRAPPER}} .element-post-grid .action-box .btn-link-cate',
            ]
        );

        $this->add_control(
            'background_link_color',
            [
                'label' => esc_html__('Background Color', 'clinic'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .element-post-grid .action-box .btn-link-cate' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();
        $cat_post = $settings['select_cat'];
        $limit_post = $settings['limit'];
        $order_by_post = $settings['order_by'];
        $order_post = $settings['order'];

        // Query
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $limit_post,
            'orderby' => $order_by_post,
            'order' => $order_post,
            'ignore_sticky_posts' => 1,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :

            ?>

            <div class="element-post-grid">
                <div class="element-post-grid__warp">
                    <?php while ($query->have_posts()): $query->the_post(); ?>
                        <div class="item-post">
                            <div class="item-post__thumbnail">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) :
                                        the_post_thumbnail('large');
                                    else:
                                        ?>
                                        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/no-image.png')) ?>"
                                             alt="<?php the_title(); ?>"/>
                                    <?php endif; ?>
                                </a>
                            </div>

                            <div class="item-post__box">
                                <h3 class="title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <div class="meta">
                                    <span class="meta__author"><?php echo esc_html(get_the_author()) ?></span>
                                    <span class="meta__date"><?php echo esc_html( get_the_date() ); ?></span>
                                </div>

                                <div class="desc">
                                    <p>
                                        <?php
                                        if (has_excerpt()) :
                                            echo esc_html(wp_trim_words(get_the_excerpt(), 30, '...'));
                                        else:
                                            echo esc_html(wp_trim_words(get_the_content(), 30, '...'));
                                        endif;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>

                <?php if ( $cat_post ) : ?>
                    <div class="action-box text-center">
                        <a class="btn-link-cate" href="<?php echo esc_url(get_category_link($cat_post)); ?>">
			                <?php esc_html_e('xem thêm bài viết', 'clinic'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        <?php

        endif;
    }
}