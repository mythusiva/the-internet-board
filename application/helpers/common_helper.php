<?php

function get_filters($exclude=array()) {
	// $filters = array(
	// 	TIB_FILTER_ALL,
	// 	TIB_FILTER_FUNNY,
	// 	TIB_FILTER_AUTOMOTIVE,
	// );

	// return array_diff($filters, $exclude);
	$ci = &get_instance();
	$ci->load->model('feed_model');

	$filters = $ci->feed_model->get_filters();
	return array_diff($filters, $exclude);
}

function check_if_invalid_filter($filter) {
	$is_invalid = TRUE;
	if($filter === 'all') {
		$is_invalid = FALSE;
	} else if(in_array($filter, get_filters())) {
		$is_invalid = FALSE;
	}

	return $is_invalid;
}