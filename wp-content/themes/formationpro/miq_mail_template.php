<?php

/*
Template Name: Screenshot Email Template

*/
function get_miq_mail_template()
{
ob_start();
$string='
<p>Please find attached data and files you submitted. The form submission ID is form_submission_id </p>
<p>
	<ul>
		<li><b>Requester email address:&nbsp;</b> $requester_email </li> 
		<li><b>Additional screenshot recipients:&nbsp;</b> $additional_screenshot </li>
		<li><b>Screenshot Due Date:&nbsp;</b> $screenshot_due_date </li> 
		<li><b>Advertiser:&nbsp;</b> $advertiser </li>
		<li><b>Creative ID(s):&nbsp;</b> $campaign_id </li>
		<li><b>Sites/Publishers:&nbsp;</b> $site_publishers </li>
		<li><b>Geo-targeting:&nbsp;</b> $geo_target </li>
		<li><b>Content targeting:&nbsp;</b> $content_target </li>
		<li><b>Any special instructions:&nbsp;</b> $special_instruction </li>
	</ul>
</p>';
return $string; } ?>
  