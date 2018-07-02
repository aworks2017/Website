<?php

/*
Template Name: Screenshot Email Template

*/
function get_screenshot_mail_template()
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
		<li><b>Campaign ID(s):&nbsp;</b> $campaign_id </li>
		<li><b>Networks:&nbsp;</b> $network </li> 
		<li><b>Total number of screenshots:&nbsp;</b> $no_of_screenshot </li>
		<li><b>Geo-targeting:&nbsp;</b> $geo_target </li>
		<li><b>Geo-targeting-specify:&nbsp;</b> '.$_POST['geo_target_yes'].' </li>
		<li><b>Content targeting:&nbsp;</b> $content_target </li>
		<li><b>Content targeting specify:&nbsp;</b> '.$_POST['content_target_yes'].' </li>
		<li><b>Any special instructions:&nbsp;</b> $special_instruction </li>
	</ul>
</p>';
return $string; } ?>
  