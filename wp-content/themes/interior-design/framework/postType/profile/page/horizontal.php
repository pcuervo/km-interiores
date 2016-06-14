<?php
/**
 * @package 	WordPress
 * @subpackage 	Interior Design
 * @version		1.0.0
 *
 * Profiles Page Horizontal Profile Format Template
 * Created by CMSMasters
 *
 */


global $profile_columns;


$columns_num = '';

if ($profile_columns == 1) {
	$columns_num = 'one_first';
} elseif ($profile_columns == 2) {
	$columns_num = 'one_half';
} elseif ($profile_columns == 3) {
	$columns_num = 'one_third';
} elseif ($profile_columns == 4) {
	$columns_num = 'one_fourth';
}


$cmsms_profile_social = get_post_meta(get_the_ID(), 'cmsms_profile_social', true);

$cmsms_profile_subtitle = get_post_meta(get_the_ID(), 'cmsms_profile_subtitle', true);

$cmsms_profile_short_info = get_post_meta(get_the_ID(), 'cmsms_profile_short_info', true);

?>

<!--_________________________ Start Horizontal Profile _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class($columns_num); ?>>
	<?php
	if (has_post_thumbnail()) {
		echo '<div class="pl_img">' . "\n" .
			'<figure>' . "\n" .
				'<a href="' . esc_url(get_permalink()) . '">' .
					get_the_post_thumbnail(get_the_ID(), 'square-thumb', array(
						'alt' => cmsms_title(get_the_ID(), false),
						'title' => cmsms_title(get_the_ID(), false)
					)) .
				'</a>' .
			'</figure>' . "\n" .

			 '<div class="pl_social">' . "\n";
			if ($cmsms_profile_social != '') {
				echo '<ul class="pl_social_list">' . "\n";


				foreach ($cmsms_profile_social as $social_icons) {
					$social_icon = explode('|', str_replace(' ', '', $social_icons));


					echo '<li>' . "\n\t" .
						'<a href="' . esc_url($social_icon[1]) . '" class="' . $social_icon[0] . '" title="' . esc_attr($social_icon[2]) . '"' . (($social_icon[3] == 'true') ? ' target="_blank"' : '') . '></a>' . "\r" .
					'</li>' . "\n";
				}


				echo '</ul>' . "\n";
			}
			echo '</div>' . "\n";

	echo'</div>' . "\n";
	}


	echo '<div class="pl_content">' . "\n" .
		'<h5 class="entry-title">' . "\n" .
			'<a href="' . esc_url(get_permalink()) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . "\n" .
			// '<span>' . cmsms_title(get_the_ID(), false) . '</span>' . "\n" .
		'</h5>' . "\n";

	if ($cmsms_profile_subtitle != '') {
		echo '<h5 class="pl_subtitle">' . esc_html($cmsms_profile_subtitle) . '</h5>' . "\n";
	}


	if (get_the_excerpt()) {
		echo '<div class="entry-content">' . "\n" .
				get_the_excerpt() .
			'</div>' . "\n" .
		'</div>' . "\n";
	}
	?>
	<div class="cl"></div>
</article>
<!--_________________________ Finish Horizontal Profile _________________________ -->

