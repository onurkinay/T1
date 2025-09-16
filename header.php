
<!Doctype html><head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title("|", true, "right"); echo get_option('t1_title'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta name="keywords" content="<? echo get_option('t1_kw');?>" />
<meta name="description" content="<? echo get_option('t1_ds'); ?>" />
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="<? bloginfo("template_url") ?>/ie.css" /><![endif]-->
<?php wp_head(); ?>
</head>
<body>

<div id="wrapper">
<div class="gizle"><h1><? bloginfo("name") ?></h1></div>

  <div id="header">

<div class="pages"><?php
// KONTROL EDİP ÇEKME
if (get_option('t1_kayan') == "Evet" ) { // eğer boşsa
?><marquee behavior=right><? echo get_option('t1_kayan-yazi'); ?></marquee><?
}else{

}
?>

</div>
    <div class="logo">
     <a href="<? bloginfo("url"); ?>"><img src="<? echo get_option('t1_logo');?>" width="346" height="59" alt="logo" /></a>
    </div>
 
    <div class="ad"> <?php echo stripslashes(get_option('t1_reklogo')); ?> </div>
 
    <ul class="categories">
   <?php wp_nav_menu( array( 'theme_location' => 'ust-menu' ) ); ?>
    </ul>
 
  </div>
