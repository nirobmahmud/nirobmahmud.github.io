<?php
	require( "config.php" );
	
	$current_theme = $_GET['theme'];
	$theme_found   = false;

	include('theme_list.php');

	if ( ! isset( $redirect ) ) :
	    foreach( $theme_array as $i => $theme )
	    {
	    	if ( $theme['id'] == $current_theme )
	    	{
	    		$current_theme_name         = ucfirst( $theme['id'] );
	    		$current_theme_url          = $theme['url'];
	    		$current_theme_purchase_url = $theme['purchase'];
	    		$responsive                 = $theme['responsive'];
	    		$theme_found                = true;
	    	}
	    }
	    if ( $theme_found == false )
	    {
	    	$current_theme_name         = $theme_array[0]['id'];
	    	$current_theme_url          = $theme_array[0]['url'];
	    	$current_theme_purchase_url = $theme_array[0]['purchase'];
	    	$responsive                 = $theme_array[0]['responsive'];
	    }
?>
<!doctype html>
<html>
<head>
    <title><?php if ( $theme_found == false ) { echo $description; } else { echo 'Theme > ' . $current_theme_name; } ?></title>
    
  	<!-- meta -->
  	<meta charset="utf-8">
  	<meta name="viewport" content="user-scalable=no">
  	<meta name="author" content="<?php echo $author; ?>">
    <meta name="description" content="<?php echo $description; ?>">
  
  	<link href="<?php echo $site_url; ?>favicon.png?v=1" rel="shortcut icon" type="image/x-icon" />
  	
  	<link rel="stylesheet" href="assets/css/minified.css.php" media="all" />
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/application.js"></script>
</head>
    
<body>
	<!-- push div to control slideout -->
	<div id="push">
		
		<!-- main wrapper -->
		<div id="wrapper">
			
			<!-- theme switcher bar -->
	        <div id="switcher">
		        
		        <!-- logo -->
		        <a class="logo" href="<?php echo $site_url; ?>" title="<?php echo $author; ?>">
			        <img src="assets/img/logo.png" alt="<?php echo $author; ?>" />
			    </a>
			    <!-- /logo -->
		        
		        <!-- theme selector toggle -->
	            <a class="themes-open" href="#">
		            <i class="icon-navicon"></i> <?php if ( $theme_found == false ) : echo "Choose Theme"; else : echo $current_theme_name; endif; ?>
		        </a>
		        <!-- /theme selector toggle -->
	            
	            <!-- responsive theme preview icons -->
	            <div id="responsive">
	                <ul>
	                    <li><a href="#" class="d" title="Desktop View"><img src="assets/img/icon-desktop.png" alt="Desktop" /></a></li>
	                    <li><a href="#" class="t" title="Tablet View"><img src="assets/img/icon-tablet.png" alt="Tablet" /></a></li>
	                    <li><a href="#" class="m" title="Mobile View"><img src="assets/img/icon-mobile.png" alt="Mobile" /></a></li>
	                </ul>
	            </div>
	            <!-- /responsive theme preview icons -->
	            
	            <!-- purchase / close frame buttons -->
	            <ul class="right">
	                <li class="purchase" rel="<?php echo $current_theme_purchase_url; ?>">
	                    <a href="<?php echo $current_theme_purchase_url . "?ref=" . $ref; ?>" target="_blank" title="Purchase Theme">
	                        <i class="icon-shopping-cart"></i> Purchase
	                    </a>
	                </li>		
	                <li class="remove_frame" rel="<?php echo $current_theme_url; ?>">
	                    <a href="<?php echo $current_theme_url; ?>" title="Remove Frame"><i class="icon-remove"></i></a>
	                </li>
	            </ul>	
	            <!-- /purchase / close frame buttons -->
	            
	        </div>
	        <!-- /theme switcher -->
	        
		</div>
		<!-- /main wrapper -->

		<!-- iframe wrapper that loads theme preview -->
	    <div id="frame_wrapper">
	        <iframe id="iframe" src="<?php echo $current_theme_url; ?>" frameborder="0" width="100%"></iframe>
	    </div>
	    <!-- /iframe wrapper that loads theme preview -->

	</div>
	<!-- /push div to control slideout -->
	
	<!-- slideout theme switcher -->
	<aside id="aside">
		<h4>Choose Theme &nbsp;<i class="icon-chevron-down"></i></h4>
		<ul id="theme_list" class="nolist">
            <?php foreach ( $theme_array as $i => $theme ) : ?>
        	    <li data-thumbnail-src="<?php echo $theme['thumb']; ?>">
                    <a href="?theme=<?php echo $theme['id']; ?>" rel="<?php echo $theme['url']; ?>,<?php echo $theme['purchase']; ?>">
                        <?php echo $theme['id']; ?> <span class="type <?php if ( $theme['type'] === 'wp' ) { echo 'wp'; } else { echo 'html'; } ?>"><?php echo $theme['type']; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- demo notes -->
        <p class="notes textcenter">If you experience any issue(s) with these demos, please try closing the demo bar using the 'x' at the top right of your screen.</p>
        <!-- /demo notes -->
	</aside>
	<!-- slideout theme switcher -->
	
	<!-- preview thumbnails -->
	<img id="preview" src="" alt="Preview" />
	<!-- /preview thumbnails -->
	
</body>
</html>
<?php endif; ?>