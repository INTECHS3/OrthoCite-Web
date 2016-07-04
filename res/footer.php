<?php

?>
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
