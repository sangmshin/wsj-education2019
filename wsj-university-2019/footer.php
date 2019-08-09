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
					<p>&copy;Copyright <?php echo date("Y"); ?> <span class="nowrap"><a href="http://www.dowjones.com">Dow Jones &amp; Company</a>, Inc.</span> <span class="nowrap">All Rights Reserved</span><br />
					<a href="http://www.wsj.com/policy/privacy-policy?mod=wsju">Privacy Policy</a> | <a href="http://www.wsj.com/policy/cookie-policy?mod=wsju">Cookie Policy</a></p>
				</div>
				<div class="footer-social">
					<ul>
						<li><a class="facebook" href="<?php echo $facebookLink; ?>" target="_blank">FB</a></li>
						<li><a class="twitter" href="<?php echo $twitterLink; ?>" target="_blank">Tw</a></li>
						<li><a class="linkedin" href="<?php echo $linkedinLink; ?>" target="_blank">In</a></li>
						<li><a class="youtube" href="<?php echo $youtubeLink; ?>" target="_blank">YT</a></li>
						<li><a class="snapchat" href="<?php echo $snapchatLink; ?>" target="_blank">SC</a></li>
					</ul>
				</div>
				<div class="clearBoth"></div>
			</div>
		</div>
		<script type="text/javascript" src="https://dcdd29eaa743c493e732-7dc0216bc6cc2f4ed239035dfc17235b.ssl.cf3.rackcdn.com/tags/wsj/hokbottom.js"></script>
		
</body>
</html>