<?php
class Elementor_Slider_Widget extends \Elementor\Widget_Base {

	public function get_name(): string {
		return 'elementor_slider_widget';
	}

	public function get_title(): string {
		return esc_html__( 'Slider Widget', 'elementor-addon' );
	}

	public function get_icon(): string {
		return 'eicon-code';
	}

	public function get_categories(): array {
		return [ 'basic' ];
	}

	public function get_keywords(): array {
		return [ 'hello', 'world' ];
	}

	protected function render(): void {
		?>
		<p> Hello World </p>
		<?php
	}

	protected function content_template(): void {
		?>
		<p> Hello World </p>
		<?php
	}
}
