<!-- footer -->
	<div class="footer w3-w3layouts">
		<div class="container">
			<div class="footer-agileinfo">
				<div class="col-md-3 col-sm-6 footer-grid">
					<h3>Blood cross info</h3>
					<ul>
						<li><a href=""><i class="glyphicon glyphicon-chevron-right"></i>About us</a></li>
						<li><a href=""><i class="glyphicon glyphicon-chevron-right"></i>Media center </a></li>
						<li><a href=""><i class="glyphicon glyphicon-chevron-right"></i>Career</a></li>
						<li><a href=""><i class="glyphicon glyphicon-chevron-right"></i>Our mession</a></li>
						<li><a href=""><i class="glyphicon glyphicon-chevron-right"></i>Leadership</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 footer-grid footer-tags">
					<h3>Tag Cloud</h3>
					<ul>
						<li><a href="">Home</a></li>
						<li><a href="">Blood Group</a></li>
						<li><a href="">All Blood Donor</a></li>
						<li><a href="">Blood Request</a></li>
						<li><a href="">Login</a></li>
						<li><a href="">Registration</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 footer-grid footer-review">
					<h3>Review</h3>
					<p>Blood Reviews is a vital information resource, bringing together appraisals of clinical practice, and research from recognized experts Blood Reviews publishes review articles covering the spectrum of clinical and laboratory haematological practice and research.</p>  
				</div>
				<div class="col-md-3 col-sm-6 footer-grid">
					<div class="fb-page" data-href="https://www.facebook.com/roktodan2017/" data-tabs="timeline" data-width="250" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/roktodan2017/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/roktodan2017/">RoktoDan</a></blockquote></div>
				</div>
				<div class="clearfix"> </div>
			</div> 
		</div>
	</div>
	<div class="copy-right"> 
		<div class="container">
			<p>&copy; <?php echo date('Y')?> <a href="https://sabbirshawon.github.io/roktodan/">RoktoDan</a> . All rights reserved | Developed by <a href="https://m.me/sabbirrrrr"> Sabbir Shawon</a></p>
		</div> 
	</div> 
	<!-- //footer -->  
	<!-- js --> 
	
	<!-- facebook page --> 
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<!-- facebook page --> 
	
	
	
	
	
	
	<script src="<?php echo base_url();?>assets/frontend/js/jquery-2.2.3.min.js"></script>
	<!-- FlexSlider --> 
	<script defer src="<?php echo base_url();?>assets/frontend/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	<!-- End-slider-script -->
	<script src="<?php echo base_url();?>assets/frontend/js/SmoothScroll.min.js"></script> 
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/easing.js"></script>	
	<script type="text/javascript" src="<?php echo base_url();?>assets/frontend/js/jquery.dataTables.min.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/frontend/js/bootstrap.js"></script>
	
	<script type="text/javascript">
			$(document).ready(function(){
				$('#myTable').DataTable();
			});
	</script>
	
	
	
	
	<script type="text/javascript">
$(document).ready(function() {
	$("#post_desc tr").click(function(event){
		var post_id = $(this).find('input:hidden').val();
		//alert(post_id);
		var post_edit = $('#post_edit').val();
		$.ajax({
			url: post_edit,
			type: 'POST',
			dataType: 'json',
			data: {'post_id':post_id},
			success:function(result){
				$('#post_title_id').val(result.post_title);
				$('#post_desc_id').val(result.post_desc);
				$('#post_status_id').val(result.post_status);
				$('#post_idasss').val(result.post_id);
				$('#post_idas').val(result.post_id);
			 },
			error: function (jXHR, textStatus, errorThrown) {html()}
		});

	});
	
});
</script>
	
	<script type="text/javascript">
$(document).ready(function() {
	$("#c_desc tr").click(function(event){
		var c_id = $(this).find('input:hidden').val();
		//alert(c_id);
		var c_edit = $('#c_edit').val();
		//alert(c_edit);
		$.ajax({
			url: c_edit,
			type: 'POST',
			dataType: 'json',
			data: {'c_id':c_id},
			success:function(result){
				$('#comment_id').val(result.comment);
				$('#c_status_id').val(result.c_status);
				$('#c_idasss').val(result.c_id);
				$('#c_idas').val(result.c_id);
			 },
			error: function (jXHR, textStatus, errorThrown) {html()}
		});

	});
	
});
</script>
</body>
</html>