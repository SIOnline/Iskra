<?php
	class Footer {

		private $acf;

		function __construct() {
			$this->acf = get_fields('footer', 'option');
		}

		function render() {
		?>

		<footer class="Footer" data-jsmodule="Footer">

			<div class="Footer__menus">
				<div class="container">
					Footer
				</div>
			</div>

		</footer>

		<?php
		}
	}
?>
