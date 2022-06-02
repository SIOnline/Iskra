<?php

class Example {

	public function __construct() {
		if ( function_exists('acf_register_block_type') ) {
			$block_name = get_class($this);

			acf_register_block_type([
				'name' => $block_name,
				'title' => __($block_name),
				'description' => __(''),
				'render_template' => "src/Blocks/$block_name/$block_name.php",
				'category' => 'sections', //
				'icon' => [
					'background' => '#7e70af',
					'foreground' => '#fff',
					'src' => 'book-alt',
				],
				'post_types' => ['post', 'page'],
				'mode' => 'auto', //preview / edit / auto
				'enqueue_assets' => function(){
					$block_name = get_class($this);
					wp_enqueue_style( "$block_name", get_template_directory_uri() . "/build/Block-$block_name.css", true, '1' );
					wp_enqueue_script( "$block_name", get_template_directory_uri() . "/build/Block-$block_name.js", [], '1', 'true' );
				},
				//'supports'
				'render_callback' => [$this, 'render']
			]);
		}
	}

	public function render() {

		$acf = get_fields();

		$bg_color = $acf['background_color'] ?? false;
		$text_color = $acf['text_color'] ?? false;
		$padding_top = $acf['padding_top'] ?? false;
		$padding_bottom = $acf['padding_bottom'] ?? false;
		$container = $acf['container'] ?? false;

		$classes = [
			'bg--' . $bg_color,
			'text--' . $text_color,
			'padding-top--' . $padding_top,
			'padding-bottom--' . $padding_bottom,
			'container--' . $container
		];

		$title = $acf['title'] ?? false;

		?>

		<section class="Example" <?= implode( ' ', $classes); ?>>
			<div class="container">

				<h1>
					<?php echo $title; ?>
				</h1>

			</div>
		</section>

	<?php
	}
}
