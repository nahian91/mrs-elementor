<?php
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
                'label' => __( 'Settings', 'mew' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label' => __( 'Number of Posts', 'mew' ),
                'type' => Controls_Manager::NUMBER,
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
                <?php
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            ?>
                            <div class="mrs-post-box">
                                <?php the_pots_thumbnail();?>
                                <p class="post-meta">
                                    Posted on <?php echo get_the_date(); ?> in <?php the_category(', '); ?>
                                </p>
                                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                <?php the_excerpt();?>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<p>No posts found.</p>';
                    }
                ?>
            </div>
        <?php 
    }
}
