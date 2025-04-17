<?php
use Elementor\Controls_Manager;

class Elementor_Blog_Widget extends \Elementor\Widget_Base {

	public function get_name(): string {
		return 'blog_widget';
	}

	public function get_title(): string {
		return esc_html__( 'Blog Widget', 'elementor-addon' );
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

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Settings', 'mrs-elementor-addon' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_count',
			[
				'label'   => __( 'Number of Posts', 'mrs-elementor-addon' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$query = new WP_Query([
			'post_type'      => 'post',
			'posts_per_page' => $settings['post_count'],
		]);
		?>
		<div class="mrs-latest-posts">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="mrs-post-box">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="mrs-thumbnail">
								<?php the_post_thumbnail( 'medium' ); ?>
							</div>
						<?php endif; ?>

						<p class="post-meta">
							<?php echo esc_html__( 'Posted on', 'mrs-elementor-addon' ); ?>
							<?php echo esc_html( get_the_date() ); ?>
							<?php echo esc_html__( 'in', 'mrs-elementor-addon' ); ?>
							<?php the_category( ', ' ); ?>
						</p>

						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<?php the_excerpt(); ?>
                        <a href="<?php the_permalink();?>">Read More</a>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p><?php esc_html_e( 'No posts found.', 'mrs-elementor-addon' ); ?></p>
			<?php endif; ?>
		</div>
		<?php
	}
}
