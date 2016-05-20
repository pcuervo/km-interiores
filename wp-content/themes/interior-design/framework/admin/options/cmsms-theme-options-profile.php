<?php 
/**
 * @package 	WordPress
 * @subpackage 	Interior Design
 * @version 	1.0.0
 * 
 * Profile Options Functions
 * Created by CMSMasters
 * 
 */


if (!function_exists('get_custom_profile_meta_fields')) {
function get_custom_profile_meta_fields() {
	$cmsms_option = cmsmasters_get_global_options();


	$cmsms_global_bottom_sidebar = (isset($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar']) && $cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar'] == 1) ? 'true' : 'false') : 'true';

	$cmsms_global_bottom_sidebar_layout = (isset($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar_layout'])) ? $cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar_layout'] : '14141414';

	$cmsms_global_profile_post_title = (isset($cmsms_option[CMSMS_SHORTNAME . '_profile_post_title']) && $cmsms_option[CMSMS_SHORTNAME . '_profile_post_title'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_profile_post_title'] == 1) ? 'true' : 'false') : 'true';

	$cmsms_global_profile_post_details_title = (isset($cmsms_option[CMSMS_SHORTNAME . '_profile_post_details_title']) && $cmsms_option[CMSMS_SHORTNAME . '_profile_post_details_title'] !== '') ? $cmsms_option[CMSMS_SHORTNAME . '_profile_post_details_title'] : __('Profile details', 'interior-design');

	$cmsms_global_profile_post_share_box = (isset($cmsms_option[CMSMS_SHORTNAME . '_profile_post_share_box']) && $cmsms_option[CMSMS_SHORTNAME . '_profile_post_share_box'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_profile_post_share_box'] == 1) ? 'true' : 'false') : 'true';


	$cmsms_option_name = 'cmsms_profile_';


	$tabs_array = array();


	$tabs_array['cmsms_profile'] = array( 
		'label' => esc_html__('Profile', 'interior-design'), 
		'value'	=> 'cmsms_profile' 
	);


	$tabs_array['cmsms_layout'] = array( 
		'label' => esc_html__('Layout', 'interior-design'), 
		'value'	=> 'cmsms_layout' 
	);

	$tabs_array['cmsms_heading'] = array( 
		'label' => esc_html__('Heading', 'interior-design'), 
		'value'	=> 'cmsms_heading' 
	);


	$custom_profile_meta_fields = array( 
		array( 
			'id'	=> $cmsms_option_name . 'tabs', 
			'type'	=> 'tabs', 
			'std'	=> 'cmsms_profile', 
			'options' => $tabs_array 
		), 
		array( 
			'id'	=> 'cmsms_profile', 
			'type'	=> 'tab_start', 
			'std'	=> 'true' 
		), 
		array( 
			'label'	=> __('Profile Title', 'interior-design'), 
			'desc'	=> __('Show', 'interior-design'), 
			'id'	=> $cmsms_option_name . 'title', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsms_global_profile_post_title 
		), 
		array( 
			'label'	=> __('Subtitle', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'subtitle', 
			'type'	=> 'text', 
			'hide'	=> '', 
			'std'	=> '' 
		),
		array( 
			'label'	=> __('Profile Details Title', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'details_title', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> $cmsms_global_profile_post_details_title 
		), 
		array( 
			'label'	=> __('Social Icons', 'interior-design'), 
			'desc'	=> __('Add social icons for this profile', 'interior-design'), 
			'id'	=> $cmsms_option_name . 'social', 
			'type'	=> 'social', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Profile Info', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'features', 
			'type'	=> 'repeatable_multiple', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Profile Features 1 Title', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'features_one_title', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Profile Features 1', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'features_one', 
			'type'	=> 'repeatable_multiple', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Profile Features 2 Title', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'features_two_title', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Profile Features 2', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'features_two', 
			'type'	=> 'repeatable_multiple', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Profile Features 3 Title', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'features_three_title', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Profile Features 3', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'features_three', 
			'type'	=> 'repeatable_multiple', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Sharing Box', 'interior-design'), 
			'desc'	=> __('Show', 'interior-design'), 
			'id'	=> $cmsms_option_name . 'sharing_box', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsms_global_profile_post_share_box 
		), 
		array( 
			'label'	=> __("'Read More' Buttons Text", 'interior-design'), 
			'desc'	=> __("Enter the 'Read More' button text that should be used in you blog shortcode", 'interior-design'), 
			'id'	=> $cmsms_option_name . 'read_more', 
			'type'	=> 'text', 
			'hide'	=> '', 
			'std'	=> __('Read More', 'interior-design') 
		), 
		array( 
			'id'	=> 'cmsms_profile', 
			'type'	=> 'tab_finish' 
		), 
		array( 
			'id'	=> 'cmsms_layout', 
			'type'	=> 'tab_start', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Page Color Scheme', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> 'cmsms_page_scheme', 
			'type'	=> 'select_scheme', 
			'hide'	=> 'false', 
			'std'	=> 'default' 
		), 
		array( 
			'label'	=> __('Bottom Sidebar', 'interior-design'), 
			'desc'	=> __('Show', 'interior-design'), 
			'id'	=> 'cmsms_bottom_sidebar', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsms_global_bottom_sidebar 
		), 
		array( 
			'label'	=> __('Choose Bottom Sidebar', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> 'cmsms_bottom_sidebar_id', 
			'type'	=> 'select_sidebar', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Choose Bottom Sidebar Layout', 'interior-design'), 
			'desc'	=> '', 
			'id'	=> 'cmsms_bottom_sidebar_layout', 
			'type'	=> 'select', 
			'hide'	=> 'true', 
			'std'	=> $cmsms_global_bottom_sidebar_layout, 
			'options' => array( 
				'11' => array( 
					'label' => '1/1',
					'value'	=> '11' 
				), 
				'1212' => array( 
					'label' => '1/2 + 1/2',
					'value'	=> '1212' 
				), 
				'1323' => array( 
					'label' => '1/3 + 2/3',
					'value'	=> '1323' 
				), 
				'2313' => array( 
					'label' => '2/3 + 1/3',
					'value'	=> '2313' 
				), 
				'1434' => array( 
					'label' => '1/4 + 3/4',
					'value'	=> '1434' 
				), 
				'3414' => array( 
					'label' => '3/4 + 1/4',
					'value'	=> '3414' 
				), 
				'131313' => array( 
					'label' => '1/3 + 1/3 + 1/3',
					'value'	=> '131313' 
				), 
				'121414' => array( 
					'label' => '1/2 + 1/4 + 1/4',
					'value'	=> '121414' 
				), 
				'141214' => array( 
					'label' => '1/4 + 1/2 + 1/4',
					'value'	=> '141214' 
				), 
				'141412' => array( 
					'label' => '1/4 + 1/4 + 1/2',
					'value'	=> '141412' 
				), 
				'14141414' => array( 
					'label' => '1/4 + 1/4 + 1/4 + 1/4',
					'value'	=> '14141414' 
				) 
			) 
		), 
		array( 
			'id'	=> 'cmsms_layout', 
			'type'	=> 'tab_finish' 
		) 
	);


	return $custom_profile_meta_fields;
}
}