<?php
/**
 * The Template for displaying Certificates.
 *
 * @author 		codeBOX
 * @package 	lifterLMS/Templates
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $post;
if ( is_user_admin() ) {
	show_admin_bar(false);
}

$postmeta = get_post_meta($post->ID);

$certificate_title = $postmeta['_llms_certificate_title'][0];

$certimage_id = $postmeta['_llms_certificate_image'][0]; // Get Image Meta
$certimage = wp_get_attachment_image_src($certimage_id, 'print_certificate'); //Get Right Size Image for Print Template

if ($certimage == '') {
	$certimage = apply_filters( 'lifterlms_placeholder_img_src', LLMS()->plugin_url() . '/assets/images/optional_certificate.png' );
	$certimage_width = 800;
	$certimage_height = 616;
}
else {
	$certimage = $certimage[0];
	$certimage_width = $certimage[1];
	$certimage_height = $certimage[2];
}

?>
<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width">

	<title><?php echo get_the_title(); ?></title>

	<?php $certificate_url_dir = plugins_url(); // Declare Plugin Directory ?>

	<!--Make Background White to Print certificate -->
	<style type='text/css'>
		body {
			background-color: #fff;
			background-image: none;
			margin: 0 auto;
		}
		.header {
			display: none;
		}
		#content {
			background: none;
		}
		.entry {
			top: 120px;
			width: 100%;
			margin-bottom: 40px !important;
			background: none;
		}
		.hentry {
			margin-bottom: 40px !important;
			padding: 50px 90px !important;
			background: none;
		}
		.site-header {
			display: none;
		}
		.nav-primary {
			display: none;
		}
		.llms-certificate-container {
			position: relative;
			padding: 20px;
			margin: auto;
			margin-bottom: 20px;
			-webkit-print-color-adjust: exact;
			overflow: hidden;
		}
		.llms-certificate-container h1:first-child {
			text-align: center;
		}
		#llms-print-certificate {
			text-align: center;
		}
		.certificate-background {
			position: absolute;
			z-index: -1;
			top: 0;
			left: 0;
			right: 0;
		}
		*, *:before, *:after {
			box-sizing: border-box;
		}
		@media print {
		    .no-print, .no-print * {
		        display: none !important;
		    }
		}
	</style>
</head>
<body>
	<main role="main">
		<div class="llms-certificate-container" style="width:<?php echo $certimage_width; ?>px; height:<?php echo $certimage_height; ?>px;">
			<img src="<?php echo $certimage; ?>" alt="Cetrificate Background" class="certificate-background">
			<div id="certificate-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="llms-summary">
				<?php llms_print_notices(); ?>

					<?php do_action('before_lifterlms_certificate_main_content'); ?>

					<h1><?php echo $certificate_title; ?></h1>
					<p><?php echo the_content(); ?></p>

					<?php do_action('after_lifterlms_certificate_main_content'); ?>

				</div>
			</div>
		</div>
		<div id="llms-print-certificate" class="no-print">
			<input type="button" class="llms-button" onClick="window.print()" value="<?php echo _e('Print Certificate', 'lifterlms') ?>"/>
		</div>
</main>

</body>
