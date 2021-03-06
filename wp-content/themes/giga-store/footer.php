<?php if ( is_active_sidebar( 'giga-store-footer-area' ) ) { ?>
	<div class="footer-widgets"> 
		<div class="container">		
			<div id="content-footer-section" class="row clearfix">
				<?php dynamic_sidebar( 'giga-store-footer-area' ) ?>
			</div>
		</div>
	</div>	
<?php } ?>
<footer id="colophon" class="rsrc-footer" role="contentinfo">
	<div class="container">  
		<div class="row">
					<div id="footerLink">
						<p>
							<a href="https://www.plastic-crate.co.uk" target="_blank" >euro crates</a> <b>|</b>
							<a href="http://www.joinplastic.com" target="_blank" >plastic folding crate</a> <b>|</b>
							<a href="https://www.moving-dolly.com" target="_blank" >plastic moving dolly</a>
							<b>|</b>
							<a href="http://www.joinplastic.com/products/stackableBox/stackableBox.php" target="_blank" >stackable plastic crates</a>
							<b>|</b>
							<a href="https://www.palletboxsale.com/" target="_blank">Collapsible plastic pallet box</a>
							<b>|</b>
							<a href="https://www.plastic-crate.com/" target="_blank">plastic moving boxes for sale</a>
							<b>|</b>
							<a href="http://www.jiajiubox.com" target="_blank" >上海周转箱</a>
							<b>|</b>
						</p>
					</div>
				</div>
	</div>       
</footer> 
<p id="back-top">
	<a href="#top"><span></span></a>
</p>
<!-- end main container -->
</div>
<nav id="menu" class="off-canvas-menu">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'main_menu',
		'container'		 => false,
	) );
	?>
</nav>
<?php wp_footer(); ?>
<div id="contactUs" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request a Free Quote</h4>
      </div>
      <div class="modal-body">
		<?php echo do_shortcode( '[contact-form-7 id="244" title="Contact form 1"]' ); ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>
