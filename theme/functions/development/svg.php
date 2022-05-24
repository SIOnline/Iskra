<?php
/**
 * get_svg('arrow-left');
 */

function get_svg($name) {

	$path = str_replace('.svg', '', $name);

	$file = get_template_directory() . "/assets/svg/" . $path . ".svg";
	return file_get_contents($file, true);

}

/**
 * the_svg('arrow-left');
 */

function the_svg($name, $inline = true) {

	$path = str_replace('.svg', '', $name);

	if ($inline) {

		$file = get_template_directory() . "/assets/svg/" . $path . ".svg";
		echo file_get_contents($file, true);

	} else {

		$file = get_template_directory_uri() . "/assets/svg/" . $path . ".svg";
		echo '<img src="'.$file.'" />';

	}
}

