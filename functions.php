<?

if (file_exists(TEMPLATEPATH.'/panel.php')) include_once("panel.php");


/* sayfalama baş */
function sayfalama($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1; 
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     } 
     if(1 != $pages)
     {
         echo "<div id='sayfalama'>";

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>";
     }
}
/* sayfalama son */


 ?><?/* Ozet ayarları bas */
function wpn_content_limit($content, $ilimit = false)
{
 $limit = ($ilimit) ? $ilimit : 550;
 $pad="...";
 $content = strip_tags($content);
 if(strlen($content) > $limit)
 {
 $content = substr($content,0,$limit);
 }
 echo $content.$pad;
}
/* Ozet Ayarları Son */

// YORUM LISTELE
function sinyor_comment($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?>
<?php
    $PostAuthor = false;
    if($comment->comment_author_email == get_the_author_email()) {
    $PostAuthor = true;}
    elseif($comment->comment_author_email == 'sinanyorulmaz@live.com') {
    $PostAuthor = true;}
?>


<div class="y-sonyorum">
    <div id="comment-<?php comment_ID(); ?>">
        <div class="yorumavatar"><?php echo get_avatar($comment,$size='62'); ?></div>
        <div style="padding:10px 0px 5px 0px;margin:0px 0px 0px 80px;">
			<?php printf(__('<span class="y-baslik">%s</span>'), get_comment_author_link()) ?>   
			<span class="y-tarih" style="margin-left:20px;"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(get_comment_date()); ?></a></span>
			<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation">Yorumunuz onaylandıktan sonra görüntülenecektir.</em>
			<?php endif; ?>
			<p><?php comment_text() ?></p><br />
			<div class="cevapla"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div> 
		<div class="clear"></div>
		<div class="clear"></div>
	
</div>
<?php }
// #YORUM LISTELE


/* Widget Uyumu bas */
if (function_exists('register_sidebar'))
{
register_sidebar(array('name' => 'Sağ Menü',
'before_widget' => '<div class="box">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
}

/* Widget Uyumu son */?><?/*Öne çıkan görsel bas*/add_theme_support( 'post-thumbnails');set_post_thumbnail_size( 134, 134, true );add_image_size( 'single-post-thumbnail', 134, 134 );/*Öne çıkan görsel son */?>
