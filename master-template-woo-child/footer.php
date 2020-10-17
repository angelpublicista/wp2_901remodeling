<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Master_Template
 */

global $geniorama;

?>

</div>
<!-- #content -->

	<?php if ($geniorama['active-buttons'] == '1'): ?>
		<?php get_template_part('template-parts/buttons/float-buttons'); ?>
	<?php endif; ?>
	

	<footer id="colophon" class="site-footer">
		<!-- Top Footer -->
		<?php if($geniorama['footer-on-off'] == '1'): ?>
			<?php get_template_part('template-parts/footer/top-footer'); ?>
		<?php endif;?>

		<!-- Bottom Footer -->
		<?php get_template_part('template-parts/footer/bottom-footer'); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WV4PZBW');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV4PZBW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php wp_footer(); ?>

</body>
</html>
