 <?php get_header(); ?>

  <div id="content">
    
    <?php  $count = 1; ?>
   
    <div class="recent">
	<h1><?php
	if ( is_day() ) :
		printf( __( 'Günlük Arşiv: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
	elseif ( is_month() ) :
		printf( __( 'Aylık Arşiv: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
	elseif ( is_year() ) :
		printf( __( 'Yıllık Arşiv: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
	else :
		_e( 'Archives', 'twentytwelve' );
	endif;
?></h1>
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
        <p><?php wpn_content_limit(get_the_content(),500); ?></p>
        <p class="details"><?php the_time('d.m.y ') ?> | <?php the_author(); ?> | <a href="<? the_permalink(); ?>">Devamını Oku</a></p>
      </div>

	  <?php if ($count == 1) : ?>
<center><? echo stripslashes(get_option('t1_rekyazi')); ?></center>
<?php endif; $count++; ?>
     	<?php endwhile; ?>
		<?php endif; ?>
  
      
         <?php sayfalama(); ?>
        
     
      <div class="break"></div>
    </div>

  </div>

  <? get_sidebar(); ?>
  <? get_footer(); ?>