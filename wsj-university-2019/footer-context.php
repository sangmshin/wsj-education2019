<?php
/**
 * The Footer template for the WSJU
 *
 * Displays all of the footer-content section to end tag of html.
 *
 * @package WSJU
 */

$home = get_page_by_title('Home');
$homeId = $home->ID;

$facebookLink = get_field('social_link_fb', $homeId);
$twitterLink = get_field('social_link_tw', $homeId);
$linkedinLink = get_field('social_link_in', $homeId);
$youtubeLink = get_field('social_link_yt', $homeId);
$snapchatLink = get_field('social_link_sc', $homeId);

?>
		<div class="footer-content">
			<div class="wrapper">
				<div class="footer-copy">
                    <p>
                        <a href="http://www.wsj.com/policy/privacy-policy?mod=wsju">Privacy Policy</a> | <a href="http://www.wsj.com/policy/cookie-policy?mod=wsju">Cookie Policy</a> | 
                        <a href="http://www.wsj.com/policy/privacy-policy?mod=wsju">Copyright Policy</a> | <a href="http://www.wsj.com/policy/cookie-policy?mod=wsju">Data Policy</a> | 
                        <a href="http://www.wsj.com/policy/privacy-policy?mod=wsju"> Subscriber Agreement & Terms of Use</a>
                    </p>
					<p>&copy;Copyright <?php echo date("Y"); ?> <span class="nowrap"><a href="http://www.dowjones.com">Dow Jones &amp; Company</a>, Inc.</span> <span class="nowrap">All Rights Reserved</span>
					</p>
				</div>

				<div class="clearBoth"></div>
			</div>
		</div>
		<script type="text/javascript" src="https://dcdd29eaa743c493e732-7dc0216bc6cc2f4ed239035dfc17235b.ssl.cf3.rackcdn.com/tags/wsj/hokbottom.js"></script>
		
		<script>
$(document).ready(function() {
	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
	});
});

</script>

  <script type="text/javascript" src="https://dcdd29eaa743c493e732-7dc0216bc6cc2f4ed239035dfc17235b.ssl.cf3.rackcdn.com/tags/wsj/hokbottom.js"></script>
</body>

</html>