<?php
use Elementor\Widget_Base;

class Elementor_Slider_Widget extends Widget_Base {

	public function get_name(): string {
		return 'elementor_slider_widget';
	}

	public function get_title(): string {
		return esc_html__( 'Slider Widget', 'elementor-addon' );
	}

	public function get_icon(): string {
		return 'eicon-slider-push'; // More appropriate icon for a slider
	}

	public function get_categories(): array {
		return [ 'basic' ];
	}

	public function get_keywords(): array {
		return [ 'slider', 'carousel', 'image slider' ];
	}

	protected function render(): void {
		echo '<div class="mrs-slider-widget">';
		echo '<p>Hello World (Render)</p>';
		echo '</div>';
	}

	protected function content_template(): void {
		?>
		<div class="mrs-slider-widget">
			<p>Hello World (Editor Preview)</p>
		</div>
		<?php
	}
}
