<?php
	class Header {

		private $acf;

		function __construct() {
			$this->acf = get_fields('header', 'option');
		}

		function render() {
		?>

		<nav class="navbar navbar-expand-xl Header" id="navbar">
			<div class="container">

				<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
					<?php
					//the_img( 'logo.png', get_bloginfo('name') )
					//the_svg( 'logo.svg' )
					?>
				</a>

				<button class="navbar-toggler collapsed navbar-anim" id="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-hamburger"></span>
				</button>

				<div class="collapse navbar-collapse" id="mainNavbar">
					<?php
					wp_nav_menu([
						'menu'            => 'menu-navbar',
						'theme_location'  => 'menu-navbar',
						'container'       => false,
						'container_id'    => false,
						'container_class' => false,
						'menu_id'         => false,
						'menu_class'      => 'navbar-nav ms-auto',
						'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
						'fallback_cb' 		=> '__return_false',
						//'walker' => new bootstrap_5_wp_nav_menu_walker()
					]);
					?>
				</div>

			</div>
		</nav>


		<?php
		}
	}
?>
