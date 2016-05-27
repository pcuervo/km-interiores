<?php
/**
 * @package 	WordPress
 * @subpackage 	Interior Design
 * @version		1.0.0
 *
 * Single Project Template
 * Created by CMSMasters
 *
 */


get_header();


$cmsms_option = cmsmasters_get_global_options();


$project_tags = get_the_terms(get_the_ID(), 'pj-tags');


$cmsms_project_project_options = get_post_meta(get_the_ID(), 'cmsms_project_project_options', true);

if ($cmsms_project_project_options == 'custom') {
	$cmsms_project_sharing_box = get_post_meta(get_the_ID(), 'cmsms_project_sharing_box', true);

	$cmsms_project_author_box = get_post_meta(get_the_ID(), 'cmsms_project_author_box', true);

	$cmsms_project_more_posts = get_post_meta(get_the_ID(), 'cmsms_project_more_posts', true);
} else {
	$cmsms_project_sharing_box = cmsms_get_global('portfolio_project_share_box') ? 'true' : 'false';

	$cmsms_project_author_box = cmsms_get_global('portfolio_project_author_box') ? 'true' : 'false';

	$cmsms_project_more_posts = cmsms_get_global('portfolio_more_projects_box');
}



echo '<!--_________________________ Start Content _________________________ -->' . "\n" .
'<div class="middle_content entry" role="main">' . "\n\t";


if (have_posts()) : the_post();
	echo '<div class="portfolio opened-article">' . "\n";


	if (get_post_format() != '') {
		get_template_part('framework/postType/portfolio/post/' . get_post_format());
	} else {
		get_template_part('framework/postType/portfolio/post/standard');
	}


	if ($cmsms_project_sharing_box == 'true') {
		cmsmasters_sharing_box();
	}


	if ($cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_nav_box']) {
		cmsmasters_prev_next_posts();
	}


	if ($project_tags) {
		$tgsarray = array();


		foreach ($project_tags as $tagone) {
			$tgsarray[] = $tagone->term_id;
		}
	} else {
		$tgsarray = '';
	}


	if ($cmsms_project_more_posts != 'hide') {
		cmsmasters_related(
			'h6',
			$cmsms_project_more_posts,
			$tgsarray,
			cmsms_get_global('portfolio_more_projects_count'),
			cmsms_get_global('portfolio_more_projects_pause'),
			'project'
		);
	}


	if ($cmsms_project_author_box == 'true') {
		cmsmasters_author_box(esc_html__('About author', 'interior-design'), 'h5');
	}


	comments_template();


	echo '</div>';
endif;


echo '</div>' . "\n" .
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


get_footer();

