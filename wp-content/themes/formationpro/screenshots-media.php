<?php

/*
Template Name: Screenshots Media

*/
ini_set('post_max_size', '1000M');
ini_set('upload_max_filesize', '1000M');
add_action( 'wp_enqueue_scripts', function(){
	wp_enqueue_style( 'style-name', get_template_directory_uri() . '/css/dropzone.min.css' );
});
 wp_enqueue_script( 'script', get_template_directory_uri() . '/js/dropzone.min.js');
 wp_enqueue_script( 'script', get_template_directory_uri() . '/js/jquery.blockUI.js');
 get_header('screenshot-mediaq');
 ?>
 <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<div id="primary_home" class="content-area">
	<div id="content" class="fullwidth" role="main">

		<head>
		</head>
		<body>
		<form name="screenshotForm"  id="screenshotForm"  action="<?php echo admin_url('screenshots_form_media.php');?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="no_attachments_flag" id="no_attachments_flag" value="1">
		<input type="hidden" name="mediaiq" value="1">
		<table border="0" width="500" align="center" class="table">
		<p>For all screenshot requests for your selected advertiser (including screenshots at the launch of a campaign, creative swaps, and new flights),
		please fill out the information below.</p>
		<tr width="80%">
			<td width="30%"> Requester email address:<span style="color: red;">*</span></td>
			<td width="50%"><input type="text" class="required_fields" name="requester_email" id="requester_email">
			<span id="span_requester_email"  style="color: red; display:none">Requester email address is required</span></td>
		</tr>

		<tr>
			<td>Additional screenshot recipients (email addresses):</td>
			<td><input type="text" name="additional_screenshot" id="additional_screenshot" style="margin-top: 5px;"></td>
		</tr>
		<tr>
			<td>Our standard turnaround time is by EOD the next business day. If you have an urgent request, please list the due date and time here. AutonomyWorks will confirm if we can meet this deadline <span style="color: red;"></span></td>
			<td><input type="text" name="screenshot_due_date" class="required_fields" id="screenshot_due_date" style="margin-top: 5px;">
			 </td>
		</tr>
		<tr>
			<td>Advertiser:<span style="color: red;">*</span></td>
			<td><input type="text" class="required_fields" name="advertiser" id="advertiser" style="margin-top: 5px; width: 330px;" >
			<span id="span_advertiser"  style="color: red; display:none">Advertiser is required</span></td>
		</tr>
		<tr>
			<td>Creative ID(s):<span  style="color: red;">*</span></td>
			<td><textarea class="required_fields" name="campaign_id"  id="campaign_id"  cols="50" rows="6" style="width: 330px; margin-top: 5px; margin-bottom: 5px;"></textarea>
			<span id="span_campaign_id"  style="color: red; display:none">Creative ID is required</span></td>
		</tr>
		<tr>
			<td>Sites / Publishers:</td>
			<td>
				<textarea name="sites_publishers"  id="sites_publishers" cols="50" rows="6" style="width: 330px;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="padding: 10px 0;">Geo-targeting:</td>
			<td><input type="radio" name="geo_target" value="No" checked> No  <input type="radio" name="geo_target" value="Yes"  style="margin-left: 15px;"> Yes (please specify) <textarea  style="margin: 0px;width: 300px;height: 21px;" name="geo_target_yes" id="showOnYes"></textarea> </td>
		</tr>
		<tr>
			<td style="padding: 10px 0;">Content targeting:</td>
			<td><input type="radio" name="content_target" value="No" checked> No  <input type="radio" name="content_target" value="Yes"  style="margin-left: 15px;"> Yes (please specify) <textarea  style="margin: 0px;width: 300px;height: 21px;" name="content_target_yes" id="showOnYesContent"></textarea> </td>
		</tr>
		<tr>
			<td>Please include any special instructions for this request (e.g. number of creative versions, client template, etc.)</td>
			<td><textarea name="special_instruction" id="special_instruction" style="margin: 0px;width: 300px;height: 42px;"></textarea>
			</td>
		</tr>
		</table>
		Attach additional files here (max 25 MB):
			<div id="dZUpload" class="dropzone">
				 <div class="fallback">
				  <input name="file[]" type="file" multiple />
				 </div>
				   <div class="dz-default dz-message">
				    Drag files here to upload, or click to browse for files.
				   </div>
			</div>
		<div>
		<br>
		<input type="submit" name="screenshot_submit" id="screenshot_submit" value="Submit" class="btnRegister" onclick=" return checkFileUploaded();">
		<span id="span_file_size_error"  style="color: red; display:none">File size is greater than 25MB.</span>
		</div>
		</form>
	</div>
		<div class="request-from-area">
				<div class="user-info-area">
					<div class="support-message"><br /><br />
						<p>&nbsp;<br/>For support contact <a href="mailto:mediaiq@emailautonomy.com">mediaiq@emailautonomy.com</a></p><br /><br />

					</div>
				</div>
		</div>
</div>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->
 <style>
	.hint { display: none; color: gray; font-style: italic; }
	input:focus + .hint { display: inline; }
 </style>
 <script type="text/javascript">
tinymce.init({
  selector: 'textarea',
  height: 150,
  menubar: false,
  elementpath: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'
});
	function isEmpty(str) {
		return (!str || 0 === str.length);
	}
	function checkFileUploaded(){
		var inputs_val = $('#screenshotForm .required_fields');
		var check = true;
		inputs_val.each(function() {
			var name_field = $(this).attr('name');
			var field_val = $('[name="'+name_field+'"]').val();
			if(isEmpty(field_val)){
				if(typeof ($("#span_"+name_field)) !== 'undefined' && $("#span_"+name_field).length > 0){
					$("#span_"+name_field).show();
					check = false;
				}
			}else{
				$("#span_"+name_field).hide();
			}
		});
		if(check == false){
			$('html, body').animate({
		        scrollTop: $("#screenshotForm").offset().top
		    }, 1000);
		}
		return check;
	}
	var element = "#dZUpload";
	var myDropzone = new Dropzone(element,{
		url: "<?php echo admin_url('screenshots_form_media.php');?>",
        addRemoveLinks: true,
		uploadMultiple: true,
		maxFilesize: 51,
		maxThumbnailFilesize: 51,
		createImageThumbnails: true,
		parallelUploads: 100,
		maxFiles: 100,
		autoProcessQueue: false,
        success: function (file,response) {
			if((response)){
			   url_redirect = response.replace(/\s/g, '');
			   window.location.href= url_redirect;
			}
		},
		init: function() {
			dzClosure = this;
			document.getElementById("screenshot_submit").addEventListener("click", function(e) {
				if(checkFileUploaded()){
					if (dzClosure.getQueuedFiles().length > 0) {
						$("#no_attachments_flag").val('0');
						e.stopImmediatePropagation();
						e.preventDefault();
						e.stopPropagation();
						dzClosure.processQueue();
					}
				}
			});
			this.on("complete", function(file) {
            if (file.size > 25*1024*1024) {
                this.removeFile(file);
                $("#span_file_size_error").show();
                $('html, body').animate({
			        scrollTop: $("#screenshotForm").offset().top
			    }, 1000);
                return false;
            }else{
                $("#span_file_size_error").hide();
			}
			});
			//send all the form data along with the files:
			this.on("sendingmultiple", function(data, xhr, formData) {
				//formData.append($('form').serializeArray());
				var inputs = $('#screenshotForm :input');
				var values = {};
				inputs.each(function() {
					var name = $(this).attr('name');
					var val = $('[name="'+name+'"]').val();
					if(name=='geo_target' || name=='content_target' || name=='network'){
						val = $('input[name='+name+']:checked').val();
                    }
					formData.append(name, val);
				});
					formData.append("special_instruction", tinyMCE.get('special_instruction').getContent());
			});
		}
	});

	$(window).load(function(){
		tinymce.remove('#showOnYes');
		tinymce.remove('#showOnYesContent');
		tinymce.remove('#sites_publishers');
		tinymce.remove('#campaign_id');
	});
 </script>
<?php get_footer('centro'); ?>