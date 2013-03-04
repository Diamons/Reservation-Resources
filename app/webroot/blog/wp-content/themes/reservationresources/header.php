<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="http://reservationresources.com/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="http://reservationresources.com/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="http://reservationresources.com/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="http://reservationresources.com/css/blog.css" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="header" class="row-fluid">
	<div id="header_container">
		<div class="span4"><a href="http://blog.reservationresources.com"><img id="logo" alt="Reservation Resources" src="http://reservationresources.com/img/xlogo.png.pagespeed.ic.7S-G1FugnY.png" onload="pagespeed.lazyLoadImages.loadIfVisible(this);"></a></div>
				<div style="visibility:hidden;" id="search" class="span4">	</div>

		</div>
		<div class="span4">

		
			<div id="menu">	
				<a class="clearfix" href="http://support.reservationresources.com" style="height: 79px; "><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAtCAMAAADvGAnRAAACMVBMVEUAAAD///8AAAAAAAAAAAAAAAC6vb6/v78AAAAAAAAAAABtbW0AAABWXF66vb4AAAAAAAAAAADMz9AAAACst7sAAADl6OoAAAAAAADMzMwAAAAAAAAAAABQU1Rze314fX4AAAAAAAAAAAAAAADc6e0AAAC/xMYAAAAAAABMT1AAAADt7e2KkpXI1dkAAAAUFhZ9gIG7wcMqKytrcnOvuLtpcXS2trbNzs+Rlpfv8vTp7u/Bys3O299eZWexvcGNjo7g5ed6fX7g7fHi5uidpqqjqavw8PB2f4GDhISan6CqtbnL19zT292ipKT39/e6w8W9w8Xa4eOlsbXx9faptrrW4+X4+PjBwsPF0NTQ1tfZ29u0wcXZ5ObBz9PG09jKz9DJ1tra4uTJ19vz9PTW3t/u8/T6+vrZ6Ozi6+7z9/jZ4+XR4OXj5ubg7vPs8/Xf7vPp8fTe6+/Q4OXo7e/c6Ov8/Pzd6u7i8PX09fXy9PTp7/H1+vv3+Pnk8PTa6u/g7/Tp8fTy9fX3+/ze7fLz+Prg7/Py+Pr8/f3j8fbq9fjg7vPo8vXu9Pbx9/nl9Pjy+Prz+fvx+Pr0+vz1+vz+/v7l9Pjq9vnv+Pri8vfl9Pnz+vzn9fji8/jj8/jk9Pjk9Pnl9Pnm9Pnm9fnn9fno9vnp9vrq9vrr9/rs9/rt+Pvu+Pvv+Pvw+fvx+fzy+vzz+vz0+vz1+/32+/33/P34/P37/v78/v79/v79/v/+///////1Q8U8AAAAnHRSTlMAAAECAwQEBAUGBwcICAgJCgsLDAwNDQ4PDxAREhISEhMUFRYWFxcYGRwdHR4fICEjIyQnKC0uMDI1Njc5Ojo7Ozw+PkJCQ0VFR1FVVVhdX2RkZ2xwcnJ1dXt9gIKGh4eJi4+QkZKTnp6ipKaptba4uru9vr/LzMzNzs/R0dTX2dna3N7h4uPj5OTm5ufn6Orv8vT09Pf39/r8/P3ajROsAAABv0lEQVQ4y9XV6V9MURjA8dNzztW949adS8uYGWkVbVpR9q1SspP2RFGEtNil7GtKaSVECxrUjJi/rs7BZ96dZ970wvf173NePM/5nEMC/Eb+15T4JB6v2x9ICJ5Cbq/X621d4Ue69OFv7hRFU9jwS7ip4en6OeGqgae2az+5UjwlxrYOj8dzPkbFU2ZLLyrOX2MFP+aqmI4ou079GFZY9jLGKEFXsORIp9vtrg8mWAo5N2aFWuxU2PVq5o97mjyF7T1dVc9+cC+t8nT1g+c7Uq5/55pNacoudO91pg5940oMaZrmOujUDrmEjaoshZUnozX10jR3xy6fgCVch1X9X7nTpnyulFHY90XYo6ErUM5+5p46GZrqj6e4huWApbBpUjigEyxl5RPc67UKmmq3xrmWcEDTzE/CCYNgKT32kRvOUNFUbRrj2mwUdsbK04i+D1y1FZJfbAZZCoXvhd1ayJVHSVSWKmfecU+cQY2DBab0VEv7KHd368XRykjpJSTW+2//qonTQZ6eeyMMVMQbyB2wZN0eWXA5L96gyFxp6LrDZUe3JDgsgK6AmZExUTaD/XuRpJeQqQr1PXOL/2/NA3LbpMQC8weZAAAAAElFTkSuQmCC" class="sub_icon" alt="Reservation Resources Support"><div>Support</div></a>
				
				<a id="dashboard_container" class="clearfix" href="http://blog.reservationresources.com/" style="height: 79px; "><img class="sub_icon" alt="Reservation Resources Dashboard" src="http://reservationresources.com/img/icons/dashboard.png" onload="pagespeed.lazyLoadImages.loadIfVisible(this);"><div>Blog 				</div>
				</a>
				<a class="clearfix" href="/" style="height: 79px; "><img class="sub_icon" alt="Reservation Resources Home" src="http://reservationresources.com/img/icons/home-icon.png" onload="pagespeed.lazyLoadImages.loadIfVisible(this);"><div>Home</div></a>
			
								</div>
			<a style="display:block; padding: 5px; background: transparent !important; transition: none; -moz-transition: none; -webkit-transition: none; -o-transition: none;" href="http://reservationresources.com/properties"><div id="listmyspace">List My Space</div></a>
		</div>
			
	</div>


	<div id="main">
