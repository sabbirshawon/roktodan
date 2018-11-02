<div class="inner-block">
    <div class="blank">
    	<h2>Welcome <?php echo $this->session->userdata('user_name');?>,</h2>
    	<div class="blankpage-main">
			<?php
				date_default_timezone_set('Asia/Dhaka');
				echo 'Today is: ' . '<h1>Day: '.date('l').'</h1>';
				echo '<h1>Date: '.date('j F , Y').'</h1>';
				echo '<h1>Time: '.date('g:i:s a').'</h1>';
			?>
		</div>
    </div>
</div>