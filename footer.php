	</div>
		<footer>
			<div class="newsletter-section">
				<div class="myContainer md:flex justify-between">
					<div class="newsletter-bar">
						<label for="newsletter">Subscribe Newsletter</label>
						<input type="text" name="" id="" placeholder="Enter your email">
						<button class="newsletter-btn">Subscribe</button>
					</div>
					<?php dynamic_sidebar( 'footer-social' );?>
					<!-- <div class="social-icon">
						<p>Find Us</p>
						<ul>
							<li><a href="#"><i class="uil uil-facebook-f"></i></a></li>
							<li><a href="#"><i class="uil uil-twitter"></i></a></li>
							<li><a href="#"><i class="uil uil-instagram"></i></a></li>
							<li><a href="#"><i class="uil uil-whatsapp"></i></a></li>
						</ul>
					</div> -->
				</div>
			</div>
			<div class="footer-nav-bar">
				<div class="myContainer">
					<?php dynamic_sidebar( 'footer-menu' );?>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="myContainer">
					<?php dynamic_sidebar( 'footer-bottom' )?>
				</div>
			</div>
		</footer>
	</body>
	<?php wp_footer();?>
</html>
