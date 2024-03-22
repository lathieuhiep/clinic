<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Clinic_Elementor_Introducing_Doctor extends Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name(): string
	{
		return 'clinic-introducing-doctor';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title(): string
	{
		return esc_html__('Giới thiệu về bác sĩ', 'clinic');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon(): string {
		return 'eicon-person';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords(): array
	{
		return ['info', 'about'];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories(): array
	{
		return ['my-theme'];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @access protected
	 */
	protected function register_controls(): void
	{
		// content info
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Nội dung', 'clinic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Chọn ảnh', 'clinic' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'name',
			[
				'label'       => esc_html__( 'Tên bác sĩ', 'clinic' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'BÁC SĨ CAO XUÂN TRỌNG', 'clinic' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'position',
			[
				'label'       => esc_html__( 'Chức vụ', 'clinic' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Nguyên PGĐ Bệnh viện Giao thông vận tải Đà Nẵng', 'clinic' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'specialist',
			[
				'label'       => esc_html__( 'Chuyên khoa', 'clinic' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Chuyên khoa Trĩ - hậu môn trực tràng, ngoại khoa, nam khoa', 'clinic' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'phone',
			[
				'label'       => esc_html__( 'Điện thoại', 'clinic' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( '0888.888.115 - 024.888.1115', 'clinic' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'address',
			[
				'label'       => esc_html__( 'Địa chỉ', 'clinic' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( '180 Trần Phú, Phước Ninh, Hải Châu, Đà Nẵng', 'clinic' ),
				'label_block' => true
			]
		);

		$this->end_controls_section();

		// content describe
		$this->start_controls_section(
			'describe_section',
			[
				'label' => esc_html__( 'Tiểu sử', 'clinic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Title', 'clinic' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'clinic' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => esc_html__( 'Nội dung', 'clinic' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Nội dung' , 'clinic' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Nội dung', 'clinic' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'clinic' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'clinic' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'clinic' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'clinic' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render(): void
	{
		$settings = $this->get_settings_for_display();

		$medical_appointment_form = clinic_get_opt_medical_appointment();
		$link_chat = clinic_get_opt_link_chat_doctor();
	?>
		<div class="element-introducing-doctor">
			<div class="top-box">
				<p class="top-box__introduce text-uppercase d-inline-block">
					<?php esc_html_e('Giới thiệu về bác sĩ', 'clinic'); ?>
				</p>
			</div>

            <div class="info">
                <div class="item">
		            <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' ); ?>
                </div>

                <div class="item">
                    <h2 class="name">
			            <?php echo esc_html( $settings['name'] ); ?>
                    </h2>

                    <strong class="position f-family-heading">
			            <?php echo esc_html( $settings['position'] ); ?>
                    </strong>

                    <div class="meta-list">
                        <div class="meta-list__item">
                            <div class="icon">
                                <img src="<?php echo esc_url( get_theme_file_uri( '/extension/elementor-addon/images/icons/medical-suitcase.png' ) ) ?>" alt="">
                            </div>

                            <div class="content">
					            <?php echo esc_html( $settings['specialist'] ); ?>
                            </div>
                        </div>

                        <div class="meta-list__item">
                            <div class="icon">
                                <img src="<?php echo esc_url( get_theme_file_uri( '/extension/elementor-addon/images/icons/phone.png' ) ) ?>" alt="">
                            </div>

                            <div class="content">
					            <?php echo esc_html( $settings['phone'] ); ?>
                            </div>
                        </div>

                        <div class="meta-list__item">
                            <div class="icon">
                                <img src="<?php echo esc_url( get_theme_file_uri( '/extension/elementor-addon/images/icons/location.png' ) ) ?>" alt="">
                            </div>

                            <div class="content">
					            <?php echo esc_html( $settings['address'] ); ?>
                            </div>
                        </div>
                    </div>

                    <div class="action">
	                    <?php if ( $medical_appointment_form ) : ?>
                            <a class="action__link" href="#" data-bs-toggle="modal" data-bs-target="#modal-appointment-form">
                                <img src="<?php echo esc_url( get_theme_file_uri( '/extension/elementor-addon/images/btn-hen-kham.png' ) ) ?>" alt="">
                            </a>
	                    <?php endif; ?>

	                    <?php if ( $link_chat ) : ?>
                            <a class="action__link" href="<?php echo esc_url( $link_chat ); ?>" target="_blank">
                                <img src="<?php echo esc_url( get_theme_file_uri( '/extension/elementor-addon/images/btn-bs-tu-van.png' ) ) ?>" alt="">
                            </a>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if ( $settings['list'] ) : ?>
                <div class="story">
	                <?php foreach ($settings['list'] as $item): ?>
                        <div class="item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                            <h3 class="item__title">
				                <?php echo esc_html( $item['list_title'] ); ?>
                            </h3>

                            <div class="item__content text-justify">
				                <?php echo wpautop( $item['list_content'] ); ?>
                            </div>
                        </div>
	                <?php endforeach; ?>
                </div>
            <?php endif; ?>
		</div>
	<?php
	}
}