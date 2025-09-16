 <?php get_header(); ?>

  <div id="content">
    <div class="recent">
<center><p><? echo stripslashes(get_option('t1_reksingle'));?></p></center>
    
		<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
 
      <div class="post">
        <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <span class="comments"><span><a href="<? the_permalink(); ?>"><?php comments_number('0', '1', '%' );?></a></span> </span>
		
				
        <p><?php the_content(); ?></p>
        
      </div>
	  
	 <?
if (get_option('t1_yazaralani') == "Evet" ) {  
?>
<div class="yazar_alani">

    <div class="sol">
         <?php echo  get_avatar( get_the_author_email(), '80' ); ?>
    </div>

    <div class="sag">
        <strong>Yazar : <?php  the_author_posts_link(); ?></strong>
		
        <p><?php  the_author_description(); ?></p>
		<br />
        <a  href="<?php the_author_meta('user_url'); ?>">Yazarın websitesi</a>
    </div> 

</div>									
<? }else{ 
}
?>
     <? comments_template(); ?>
     	<?php endwhile; ?>
		<?php endif; ?>
    
      <div class="break"></div>
    </div>
  
  </div>

  <? get_sidebar(); ?>
  <? get_footer(); ?>