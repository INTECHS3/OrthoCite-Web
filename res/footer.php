<?php

?>

<!-- Loads template specific footer section -->
<!-- ##################################################### CREDITS AREA STARTS HERE ##################################################### -->
<div class="joobstrap_section sourrounding_wrapper" id="credits">
    <div class="inner_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 credits_left">
                    <p>
                        &copy;  2016 | <a href="index.php"> OrthoCité </a>| Projet <a href="https://www.intechinfo.fr/">IN'TECH</a> S3 ingénierie logiciel
                    </p>
                </div>

                <div class="col-md-6 credits_right">
                    <p class="back_to_the_top text-align-right"><a href="#to_the_top" id="back-top"><i class="icon-circle-arrow-up icon-white"></i> Revenir en haut</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##################################################### CREDITS AREA ENDS HERE ##################################################### -->
</div>
<!-- **************************************** Loading the JS stuff **************************************** -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="res/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="res/js/bootstrap.min.js"></script>
    <!--Slider scripts-->
    <script src="res/js/flexslider-min.js"></script>
	<script type="text/javascript">jQuery.noConflict();</script>

<script type="text/javascript">
	jQuery.noConflict();
		jQuery(window).load(function() {
    		jQuery('.flexslider').flexslider({
          	animation: "slide",
          	slideDirection: "horizontal",
          	slideshow: true,
          	slideshowSpeed: 10000,
          	animationDuration: 1000,
          	directionNav: true,
          	controlNav: true,
          	animationLoop: true,
          	pauseOnAction: true,
          	smoothHeight: true,
          	pauseOnHover: true,


   			 });
  		});
</script>

<!-- Background Image Settings and Script-->
<script type="text/javascript" src="res/js/backstretch.min.js"></script>
<script type="text/javascript">
	jQuery.backstretch([
         "img/sample_background3.png"
        ], {
            fade: 750
        });
</script>

<!-- The navbar sticky script -->
<script type="text/javascript" src="res/js/sticky.js"></script>
<script>
    jQuery(window).load(function(){
      jQuery("#navbar_center").sticky({ topSpacing: 0, className:"sticked", wrapperClassName: "sticked_wrapper" });
    });
</script>

<!-- Smooth scrolling script -->
<script type="text/javascript" src="res/js/smoothscroll.min.js"></script>
<!-- **************************************** Template Body ends **************************************** -->
	</body>


</html>
