<?php

 class PhotoText {

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
				'mode' => 'preview', //preview / edit / auto
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


        $subtitle = $acf['subtitle'] ?? false;
        $title = $acf['title'] ?? false;
        $description = $acf['description'] ?? false;
		$image = $acf['image']['ID'] ?? false;
        $certificates = $acf['certificates'] ?? false;


        ?>

        <section class="PhotoText <?= implode( ' ', $classes); ?>">
            <div class="container">

				<div class="row justify-content-between align-items-center">

					<?php if ($image): ?>
						<div class="col-5">
							<?php echo wp_get_attachment_image($image, 'large', false, ['class' => 'globe-1', 'loading' => 'eager']); ?>
						</div>
					<?php endif; ?>

					<div class="col-6">

						<?php if ($subtitle): ?>
							<p class="PhotoText__subtitle">
								<?php echo $subtitle; ?>
							</p>
						<?php endif; ?>

						<?php if ($title): ?>
							<h1 class="PhotoText__title">
								<?php echo $title; ?>
							</h1>
						<?php endif; ?>

						<?php if ($description): ?>
							<div class="PhotoText__description">
								<?= $description ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

            </div>
        </section>

    <?php
    }
 }
