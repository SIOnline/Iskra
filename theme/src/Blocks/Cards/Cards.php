<?php

 class Cards {

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


        $intro = $acf['intro'] ?? false;
        $title = $acf['title'] ?? false;
        $cards = $acf['cards'] ?? false;


        ?>

        <section class="Cards <?= implode( ' ', $classes); ?>">
            <div class="container">

				<div class="row">

					<div class="col-12 col-md-6 col-lg-4">

						<InnerBlocks />

						<?php if ($intro): ?>
							<p class="Cards__subtitle">
								<?php echo $intro; ?>
							</p>
						<?php endif; ?>

						<?php if ($title): ?>
							<h2 class="Cards__title">
								<?php echo $title; ?>
							</h2>
						<?php endif; ?>

					</div>

					<?php if ($cards): ?>
						<?php foreach ($cards as $card):
							$number = $card['number'] ?? false;
							$label = $card['label'] ?? false;
							$photo = $card['photo']['ID'] ?? false;
							?>
							<div class="col-12 col-md-6 col-lg-4">
								<a href="#" class="Cards__box">
									<div class="content">
										<?php if ($number): ?>
											<p class="content__number">
												<?= $number ?>
											</p>
										<?php endif; ?>

										<?php if ($label): ?>
											<p class="content__label">
												<?= $label ?>
											</p>
										<?php endif; ?>

										<?php if ($photo): ?>
											<?php echo wp_get_attachment_image($photo, 'medium' ); ?>
										<?php endif; ?>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>


				</div>

            </div>
        </section>

    <?php
    }
 }
