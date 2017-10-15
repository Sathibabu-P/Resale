<!--footer section start-->		
		<footer>
			
			<div class="footer-bottom text-center">
			<div class="container">
				<div class="footer-logo">
					<a href="index.html"><span>Re</span>sale</a>
				</div>
				<div class="footer-social-icons">
					<ul>
						<li><a class="facebook" href="#"><span>Facebook</span></a></li>
						<li><a class="twitter" href="#"><span>Twitter</span></a></li>
						<li><a class="flickr" href="#"><span>Flickr</span></a></li>
						<li><a class="googleplus" href="#"><span>Google+</span></a></li>
						<li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
					</ul>
				</div>
				<div class="copyrights">
					<p> © 2016 Resale. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
</body>
</html>

	<!-- js -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="assets/js/jquery.leanModal.min.js"></script>
<link href="assets/css/jquery.uls.css" rel="stylesheet"/>
<link href="assets/css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="assets/css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="assets/js/jquery.uls.data.js"></script>
<script src="assets/js/jquery.uls.data.utils.js"></script>
<script src="assets/js/jquery.uls.lcd.js"></script>
<script src="assets/js/jquery.uls.languagefilter.js"></script>
<script src="assets/js/jquery.uls.regionfilter.js"></script>
<script src="assets/js/jquery.uls.core.js"></script>

<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
<script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>		
      <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
     <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>