<?php

 class HeroHome {

    public function __construct() {
        if ( function_exists('acf_register_block_type') ) {
            $block_name = get_class($this);

            acf_register_block_type([
				'name' => $block_name,
				'title' => __($block_name),
				'description' => __(''),
				'render_template' => "src/Blocks/$block_name/$block_name.php",
				'category' => 'header', //
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


        $title = $acf['title'] ?? false;
        $description = $acf['description'] ?? false;
        $certificates = $acf['certificates'] ?? false;

        ?>

        <section class="HeroHome <?= implode( ' ', $classes); ?>">
            <div class="container">

				<?php if ($title): ?>
					<h1>
						<?php echo $title; ?>
					</h1>
				<?php endif; ?>

				<div class="row">
					<div class="col-1">

					</div>
					<div class="col-6">
						<?php if ($description): ?>
							<div class="HeroHome__description">
								<?= $description ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<?php if ($certificates): ?>
				<div class="row HeroHome__certificates">
					<div class="col-1">

					</div>
					<div class="col-6">
						<div class="row">
							<?php foreach ($certificates as $cert): ?>
								<div class="col-auto">
									<img src="<?= $cert['image']['sizes']['medium'] ?>" style="height: 50px" />
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>

            </div>
        </section>

    <?php
    }
 }
