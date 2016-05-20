<?php
/**
 * @package 	WordPress
 * @subpackage 	Interior Design
 * @version		1.0.0
 * 
 * Blog Page Timeline Standard Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsms_metadata;


$cmsms_post_metadata = explode(',', $cmsms_metadata);


$date = (in_array('date', $cmsms_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsms_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsms_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsms_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsms_post_metadata) || is_home()) ? true : false;
$tags = (get_the_tags() && (in_array('tags', $cmsms_post_metadata) || is_home())) ? true : false;
$more = (in_array('more', $cmsms_post_metadata) || is_home()) ? true : false;

?>

<!--_________________________ Start Standard Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsms_timeline_type'); ?>>
	<div class="cmsms_post_info entry-meta">
		<?php $date ? cmsmasters_post_date('page', 'timeline') : ''; ?>
	</div>
	<div class="cmsms_post_cont">
	<?php
		if (!post_password_required() && has_post_thumbnail()) {
			cmsmasters_thumb(get_the_ID(), 'post-thumbnail', true, false, true, false, true, true, false);
		}
		
		
		cmsmasters_post_heading(get_the_ID(), 'h5');
		
		
		cmsmasters_post_exc_cont();
		
		
		if ($more) {
			echo '<div class="cmsms_post_more">';
				
				$more ? cmsmasters_post_more(get_the_ID()) : '';
				
			echo '</div>';
		}
		
		
		
		if ($author || $categories || $tags || $date || $likes || $comments) {
			echo '<div class="cmsms_post_cont_info entry-meta' . ((theme_excerpt(20, false) == '') ? ' no_bdb' : '') . '">';
				
				$author ? cmsmasters_post_author('page') : '';
				
				$categories ? cmsmasters_post_category('page') : '';
				
				$tags ? cmsmasters_post_tags('page') : '';
				
				if ($comments || $likes) {
					echo '<div class="cmsms_post_meta_info">';
						
						$comments ? cmsmasters_post_comments('page-masonry') : '';
						
						$likes ? cmsmasters_post_like('page') : '';
						
					echo '</div>';
				}
				
			echo '</div>';
		}
	?>
		<div class="cl"></div>
	</div>
</article>
<!--_________________________ Finish Standard Article _________________________ -->

