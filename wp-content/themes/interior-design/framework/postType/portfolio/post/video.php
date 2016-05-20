<?php
/**
 * @package 	WordPress
 * @subpackage 	Interior Design
 * @version		1.0.0
 * 
 * Video Project Format Template
 * Created by CMSMasters
 * 
 */


$cmsms_option = cmsmasters_get_global_options();


$cmsms_project_project_options = get_post_meta(get_the_ID(), 'cmsms_project_project_options', true);

if ($cmsms_project_project_options == 'custom') {
	$cmsms_project_title = get_post_meta(get_the_ID(), 'cmsms_project_title', true);
} else {
	$cmsms_project_title = cmsms_get_global('portfolio_project_title') ? 'true' : 'false';
}


$cmsms_project_features = get_post_meta(get_the_ID(), 'cmsms_project_features', true);


$cmsms_project_link_text = get_post_meta(get_the_ID(), 'cmsms_project_link_text', true);
$cmsms_project_link_url = get_post_meta(get_the_ID(), 'cmsms_project_link_url', true);
$cmsms_project_link_target = get_post_meta(get_the_ID(), 'cmsms_project_link_target', true);


$cmsms_project_video_type = get_post_meta(get_the_ID(), 'cmsms_project_video_type', true);
$cmsms_project_video_link = get_post_meta(get_the_ID(), 'cmsms_project_video_link', true);
$cmsms_project_video_links = get_post_meta(get_the_ID(), 'cmsms_project_video_links', true);


$cmsms_project_details_title = get_post_meta(get_the_ID(), 'cmsms_project_details_title', true);


$cmsms_project_features_one_title = get_post_meta(get_the_ID(), 'cmsms_project_features_one_title', true);
$cmsms_project_features_one = get_post_meta(get_the_ID(), 'cmsms_project_features_one', true);

$cmsms_project_features_two_title = get_post_meta(get_the_ID(), 'cmsms_project_features_two_title', true);
$cmsms_project_features_two = get_post_meta(get_the_ID(), 'cmsms_project_features_two', true);

$cmsms_project_features_three_title = get_post_meta(get_the_ID(), 'cmsms_project_features_three_title', true);
$cmsms_project_features_three = get_post_meta(get_the_ID(), 'cmsms_project_features_three', true);


$project_details = '';

if (
	$cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_like'] || 
	$cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_date'] || 
	$cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_cat'] || 
	$cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_comment'] || 
	$cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_author'] || 
	$cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_tag'] || 
	(
		!empty($cmsms_project_features[0][0]) && 
		!empty($cmsms_project_features[0][1])
	) || 
	$cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_link']
) {
	$project_details = 'true';
}


$project_sidebar = '';


if (
	$project_details == 'true' || 
	(
		!empty($cmsms_project_features_one[0][0]) && 
		!empty($cmsms_project_features_one[0][1])
	) || (
		!empty($cmsms_project_features_two[0][0]) && 
		!empty($cmsms_project_features_two[0][1])
	) || (
		!empty($cmsms_project_features_three[0][0]) && 
		!empty($cmsms_project_features_three[0][1])
	)
) {
	$project_sidebar = 'true';
}

?>

<!--_________________________ Start Video Project _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	if ($cmsms_project_title == 'true') {
		echo '<header class="cmsms_project_header entry-header">';
			
			cmsmasters_project_title_nolink(get_the_ID(), 'h2');
			
		echo '</header>';
	}
	
	
	echo '<div class="project_content' . (($project_sidebar == 'true') ? ' with_sidebar' : '') . '">';
		if (!post_password_required()) {
			if ($cmsms_project_video_type == 'selfhosted' && !empty($cmsms_project_video_links) && sizeof($cmsms_project_video_links) > 0) {
				$video_size = cmsms_image_thumbnail_list();
				
				
				$attrs = array( 
					'preload'  => 'none', 
					'height'   => $video_size['post-thumbnail']['height'], 
					'width'    => $video_size['post-thumbnail']['width'] 
				);
				
				
				if (has_post_thumbnail()) {
					$video_poster = wp_get_attachment_image_src((int) get_post_thumbnail_id(get_the_ID()), 'post-thumbnail');
					
					
					$attrs['poster'] = $video_poster[0];
				}
				
				
				foreach ($cmsms_project_video_links as $cmsms_project_video_link_url) {
					$attrs[substr(strrchr($cmsms_project_video_link_url, '.'), 1)] = $cmsms_project_video_link_url;
				}
				
				
				echo '<div class="cmsms_video_wrap">' . 
					wp_video_shortcode($attrs) . 
				'</div>';
			} elseif ($cmsms_project_video_type == 'embedded' && $cmsms_project_video_link != '') {
				global $wp_embed;
				
				
				$video_size = cmsms_image_thumbnail_list();
				
				
				echo '<div class="cmsms_video_wrap">' . 
					do_shortcode($wp_embed->run_shortcode('[embed width="' . $video_size['post-thumbnail']['width'] . '" height="' . $video_size['post-thumbnail']['height'] . '"]' . $cmsms_project_video_link . '[/embed]')) . 
				'</div>';
			} elseif (has_post_thumbnail()) {
				cmsmasters_thumb(get_the_ID(), 'post-thumbnail', true, false, true, false, true, true, false);
			}
		}
		
		
		echo '<div class="cmsms_project_content entry-content">' . "\n";
			
			the_content();
			
			
			wp_link_pages(array( 
				'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'interior-design') . ':</strong>', 
				'after' => '</div>', 
				'link_before' => ' [ ', 
				'link_after' => ' ] ' 
			));
			
			
			echo '<div class="cl"></div>' . 
		'</div>' . 
	'</div>';
	
	
	if ($project_sidebar == 'true') {
		echo '<div class="project_sidebar">';
			
			if ($project_details == 'true') {
				echo '<div class="project_details entry-meta">' . 
					'<h4 class="project_details_title">' . esc_html($cmsms_project_details_title) . '</h4>';
					
					
					cmsmasters_project_like('post');
					
					cmsmasters_project_date('post');
					
					cmsmasters_project_category(get_the_ID(), 'pj-categs', 'post');
					
					cmsmasters_project_comments('post');
					
					cmsmasters_project_author('post');
					
					cmsmasters_project_tags(get_the_ID(), 'pj-tags', 'post');
					
					cmsmasters_project_features('details', $cmsms_project_features, false, 'h4', true);
					
					cmsmasters_project_link($cmsms_project_link_text, $cmsms_project_link_url, $cmsms_project_link_target);
					
				echo '</div>';
			}
			
			
			cmsmasters_project_features('features', $cmsms_project_features_one, $cmsms_project_features_one_title, 'h4', true);
			
			cmsmasters_project_features('features', $cmsms_project_features_two, $cmsms_project_features_two_title, 'h4', true);
			
			cmsmasters_project_features('features', $cmsms_project_features_three, $cmsms_project_features_three_title, 'h4', true);

			
		echo '</div>';
	}
?>
	<div class="cl"></div>
</article>
<!--_________________________ Finish Video Project _________________________ -->

