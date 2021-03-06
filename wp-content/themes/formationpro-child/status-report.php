<?php

/*
Template Name: Status

*/
add_action( 'wp_enqueue_scripts', function(){
	wp_enqueue_style( 'style-name', get_template_directory_uri() . '/css/history.css' );
});


get_header('centro'); ?>

<div id="primary_home" class="content-area">
	<div id="content" class="fullwidth" role="main">
    
	<div class="request-from-area" style="max-height: 500px; overflow-y: scroll;">
		<table class="request-sheet" cellpadding="10">
			<thead>
									<tr>
										<th class="row1">Requestor</th>
										<th class="row1">Total</th>
										<th class="row1">Current Week</th>
										<th class="row1">Last Week</th>
										<th class="row1">2 Weeks Ago</th>
										<th class="row1">3 Weeks Ago</th>
										<th class="row1">4 Weeks Ago</th>
										<th class="row1">5 Weeks Ago</th>
									</tr>
								</thead>
								<tbody>
								<style type="text/css">
								tr.d0 td {
									background-color: #fffdf7; color: black;
								}
								tr.d1 td {
									background-color: #e5e5e5; color: black;
								}
</style>

<?php echo aw_centro_status(); ?>

								</tbody>
							</table>
					</div>
					<div class="request-from-area">
							<div class="user-info-area">
								<div class="support-message"><br /><br />
									<p>&nbsp;<br/>For support contact <a href="mailto:centro@emailautonomy.com">centro@emailautonomy.com</a></p><br /><br />

								</div>
							</div>
					</div>
			</div>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer('centro'); ?>