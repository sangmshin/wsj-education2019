<?php
header("HTTP/1.1 301 Moved Permanently");
header('Location: /' );
exit;


/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage WSJU
 */







get_header(); ?>



<div id="content" class="landing">

	


<div class="section1 aboutWSJ" style="min-height: 5px !important">
    
    </div>



			
		
<div class="profile_selector_holder">
  
  
		<div class="profile_selector">
			<h1 style="text-align: center;"><?php _e( 'Error 404.', 'wsju' ); ?></h1><br />
					<p><?php _e( 'It looks like nothing was found here.<br />Click the WSJ logo to return home.', 'wsju' ); ?></p>
		</div>
</div>
  
<div class="section1 aboutWSJ" style="">
    
    </div>


	<div class="body-content">

		
	</div>

<div style="position: absolute; bottom: 0 !important; left: 0; width: 100%; display: block;"><?php get_footer(); ?></div>		

	</div>	

</div>














