 <?php 
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) 
die ('Lütfen bu sayfaya doğrudan yükleme yapmayınız, teşekkürler.'); 
if (post_password_required()) { ?>
<p class="nocomments">Bu yazı parola korumalıdır, yorumları görebilmek için parolayı girin.</p>
<?php return; } ?>
<!-- Düzenlemeye buradan başlayabilirsiniz. -->
<?php if ( have_comments() ) : ?>
<h5>Yorumlar(<?php comments_number('0', '1 ', '%' );?>)</h5>
<ol class="commentlist">
<?php wp_list_comments('type=all&callback=sinyor_comment'); ?>
</ol>
<?php else : ?>
<?php if ( comments_open() ) : ?>
<?php else : ?>
<p class="nocomments">Bu yazı yorumlara kapatılmıştır.</p>
<?php endif; ?>
<?php endif; ?>
<?php ?>
<?php global $trackbacks; ?>
<?php if ($trackbacks) : ?>
<?php $comments = $trackbacks; ?>
<div id="pingback-trackback">
<h3 id="trackbacks">Geri bildirimler: <?php echo sizeof($trackbacks); ?></h3>
<ol class="pings">
<?php foreach ($comments as $comment) : ?>
<!-- Geriizleme başlangıç -->
<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
<cite><?php comment_author_link() ?></cite>
<?php if ($comment->comment_approved == '0') : ?>
<em>Yorumunuz denetim için bekliyor.</em>
<?php endif; ?>  
</li>
<!-- Geriizleme bitiş -->
<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; ?>
<?php endforeach; ?>
</ol>
</div>
<?php endif; ?>
<?php ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
<h5>
<?php comment_form_title( '<br />Sen de Yorumla!', '<br />Şuanda %s adlı kişinin yorumuna cevap yazıyorsunuz.' ); ?>
<?php cancel_comment_reply_link(); ?>
</h5>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>Yorum yapabilmek için <a href="<?php echo wp_login_url( get_permalink() ); ?>">giriş</a> yapmalısınız.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( is_user_logged_in() ) : ?>
<p id="system-login">Sisteme <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> olarak giriş yapılmış. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Çıkış yapın">Çıkış yap &raquo;</a></p>
<?php else : ?>
<div id="left-comments-box">
<script type="text/javascript">
//<![CDATA[
(function() {
document.write('<input type="text" name="author" id="author" value="" placeholder="Adınız" size="22" tabindex="1"/>');
document.write('<br /><input type="text" name="email" id="email" value="" placeholder="E-Posta" size="22" tabindex="2" />');
document.write('<br /><input type="text" name="url" id="url" value="" placeholder="Website" size="22" tabindex="3" />');
})();
//]]>
</script>
</div>
<?php endif; ?>
<script type="text/javascript">
//<![CDATA[
(function() {
document.write('<p><textarea name="comment" id="comment" cols="70" rows="7" placeholder="Mesajınızı yazabilirsiniz." tabindex="4"></textarea></p>');
})();
//]]>
</script>
<p><input name="submit" type="submit" id="submit" tabindex="5" value="Gönder" /><?php comment_id_fields(); ?></p>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
</div>
<?php endif; ?> 	