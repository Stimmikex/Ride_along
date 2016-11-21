</div>
<footer>
	<div class="top-footer flex-container">
		<div class="col-1-2 footer-padding">
			<div class="hero-circle">
				<div class="hero-face">
					<div id="hour" class="hero-hour"></div>
					<div id="minute" class="hero-minute"></div>
					<div id="second" class="hero-second"></div>
				</div>
			</div>
			<div>
				<script type="text/javascript">
					moment().format('hh:mm:ss');
				</script>
			</div>
		</div>
		<div class="col-1-2 flex-container footer-padding">
			<div class="col-1-2"></div>
			<div class="col-1-2">
				<p><b>WARNING!</b><br>You have to be 18 or older to use this site!<br>We are not responsible for anything our users do or say!</p>
			</div>
		</div>
	</div>
	<div class="bottom-footer">
		<p class="copyright-text">&copy; 2016 | Styrmir Óli Þorsteinsson and Bjarki Fannar Snorrason</p>
	</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/moment.js"></script>
<script src="js/geolocation.js"></script>
<script src="js/footer_clock.js"></script>
<?php $db = null; ?>