 <?php get_header(); ?>
 

  <div id="content">
  
 
    <div class="recent">
	  <center><p><? echo stripslashes(get_option('t1_reksingle'));?></p></center>
		<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>

      <div class="post">
        <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <span class="comments"><span><a href="<? the_permalink(); ?>"><?php comments_number('0', '1', '%' );?></a></span> </span>
		<a href="<?php the_permalink() ?>">
					<?php if(has_post_thumbnail()) { the_post_thumbnail(); } 
					elseif( $thumbnail = get_post_meta($post->ID, 'resim', true) ){  ?>				
					<img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="150" height="150" /><?php } ?>
				</a>
        <p><?php the_content(); ?></p>
        
      </div>

	  <? comments_template(); ?>
     	<?php endwhile; ?>
		<?php endif; ?>
    
      <div class="break"></div>
    </div>

  </div>

  <? get_sidebar(); ?>
  <? get_footer(); ?>