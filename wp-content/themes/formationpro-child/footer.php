<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package formationpro
 * @since formationpro 1.0
 */
?>

</div><!-- #main .site-main -->
<?php if( get_post_meta(get_the_ID(), 'hide_footer', true )!='1' ): ?>
	<footer id="colophon" class="site-footer" role="contentinfo">

	<?php if(! get_theme_mod('hide_footer_widgets') ): ?>
		<div class="footer_container">
			<div class="section group">

				<div class="col span_1_of_3">
					<?php if ( is_active_sidebar( 'left_column' ) && dynamic_sidebar('left_column') ) : else : ?>
						<div class="widget">
						</div>
					<?php endif; ?>
				</div>

				<div class="col span_1_of_3">
					<?php if ( is_active_sidebar( 'center_column' ) && dynamic_sidebar('center_column') ) : else : ?>
						<div class="widget">
						</div>
					<?php endif; ?>
				</div>

				<div class="col span_1_of_3">
					<?php if ( is_active_sidebar( 'right_column' ) && dynamic_sidebar('right_column') ) : else : ?>
						<div class="widget">
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div><!-- footer container -->
	<?php endif; ?>

        <?php if(! get_theme_mod('hide_copyright')): ?>

	        <div class="site-info">
					<?php if ( is_active_sidebar( 'bottom_footer' ) && dynamic_sidebar('bottom_footer') ) : else : ?>
						<div class="widget">
						</div>
					<?php endif; ?>
			</div><!-- .site-info -->

		<?php endif; ?>

	</footer><!-- #colophon .site-footer -->
    <a href="#top" id="smoothup"></a>
	<?php endif; ?>
</div><!-- #page .hfeed .site -->
</div><!-- end of wrapper -->
<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83427371-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>