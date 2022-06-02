<?php

//ACF CSS
function my_acf_admin_head() {
	?>
	<style type="text/css">
	/* STYLES FOR ACF FIELDS */

	[data-key="field_60552559b19e5"] .acf-fc-meta-name .acf-input-prepend + .acf-input-wrap:after  {
	content: "Directory class name";
	color:red;
	display:block;
	font-size:10px;
	position:absolute;
	top:7px;
	right:15px;
	}


	[data-key="field_628d3866bdb76"] .acf-button-group,
	[data-key="field_628d3ae2f525e"] .acf-button-group {
		display: flex;
		align-items: flex-start;
		justify-content: flex-start;
		flex-wrap: wrap;
	}

	[data-key="field_628d3866bdb76"] .acf-button-group label,
	[data-key="field_628d3ae2f525e"] .acf-button-group label {
		flex: 0;
		padding: 2px;
		margin: 2px;
	}

	[data-key="field_628d3866bdb76"] .acf-button-group label div,
	[data-key="field_628d3ae2f525e"] .acf-button-group label div {
		height: 30px;
		width: 30px;
	}

	</style>
	<?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');
