
<!--inner block end here-->
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>&copy; <a href="https://sabbirshawon.github.io/roktodan/">RoktoDan</a> . All rights reserved | Developed by <a href="https://m.me/sabbirrrrr"> Sabbir Shawon</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
			  
		        <li id="menu-home" ><a href="<?php echo base_url();?>Home"><i class="fa fa-home"></i><span>Home</span></a></li>
			  <?php 
					if($this->session->userdata('user_type') == 'Admin'){
				?>
		        <li id="menu-home" ><a href="<?php echo base_url();?>users/dashboard"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
		        <li><a href="<?php echo base_url();?>users_control"><i class="fa fa-user"></i><span>Admin</span></a></li>					
		        <li><a href="<?php echo base_url();?>users_control/approval"><i class="fa fa-user"></i><span>User Approval</span></a></li>					
				<?php 
					}
				?>
				<?php 
					if($this->session->userdata('user_type') == 'Donor'){
				?>
				
				<li id="menu-home" ><a href="<?php echo base_url();?>donor"><i class="fa fa-tachometer"></i><span>Donor Add/View</span></a></li>
		       
				<?php 
					}
				?>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
			
		$(document).ready(function(){
			$('#myTable').DataTable();
		});
					
			
</script>
<!--scrolling js-->
		<script src="<?php echo base_url();?>assets/backend/js/jquery.nicescroll.js"></script>
		<script src="<?php echo base_url();?>assets/backend/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="<?php echo base_url();?>assets/backend/js/bootstrap.js"> </script>
<script src="<?php echo base_url();?>assets/backend/js/jquery.dataTables.min.js"> </script>
<script src="<?php echo base_url();?>assets/backend/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/backend/js/my.js"> </script>
<!-- mother grid end here-->



</body>
</html>


                      
						
