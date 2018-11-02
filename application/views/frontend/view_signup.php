<div class="about">
		<div class="container">
			<style type="text/css">
				p{color:red;}
			</style>
			<div id="content">
                <div class="container background-white">
                    <div class="container">
                        <div class="row margin-vert-30">
                            <!-- Login Box -->
                             <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
						
							<?php if (isset($_SESSION['success'])) { ?>
								<div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
							<?php
							} ?>
							<?php //echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
							<?php echo form_open("users/registration"); ?>
							
								<div class="form-group">
									<label>User Type:</label>
									<select class="form-control" id="user_type" name="user_type">
										<option value="">Select User Type</option>
										<option value="Donor">Donor</option>
									</select>
								</div>
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Blood Group</div>
										<select name="donor_group" class="form-control">
											<option value="A(+ve)">A(+ve)</option>
											<option value="A(-ve)">A(-ve)</option>
											<option value="B(+ve)">B(+ve)</option>
											<option value="B(-ve)">B(-ve)</option>
											<option value="O(+ve)">O(+ve)</option>
											<option value="O(-ve)">O(-ve)</option>
											<option value="AB(+ve)">AB(+ve)</option>
											<option value="AB(-ve)">AB(-ve)</option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label for="username">Username:</label><b><?php echo form_error('user_name'); ?></b>
									<input class="form-control" name="user_name"  id="username" type="text">
								</div>
								<div class="form-group">
									<label for="email">Email:</label><b><?php echo form_error('user_email'); ?></b>
									<input class="form-control" name="user_email" id="email" type="email">
								</div>
								
								
								<div class="form-group">
									<label for="email">Mobile:</label><b><?php echo form_error('user_mobile'); ?></b>
									<input class="form-control" name="user_mobile" id="number" type="text">
								</div>
								
								<div class="form-group">
									<label for="email">Location</label><b>
									<input type="text" class="form-control" name="donor_location">
								</div>
								
								<div class="form-group">
										<label for="donation">Last Donation</label><b>
										<input type="date" class="form-control" name="last_donation">
								</div>
								
								<div class="form-group">
									<label for="password">Password:</label><b><?php echo form_error('user_password'); ?></b>
									<input class="form-control" name="user_password" id="password" type="password">
								</div>
								
								
								<div class="form-group">
									<label for="password">Confirm Password:</label><b><?php echo form_error('confirm_password'); ?></b>
									<input class="form-control" name="confirm_password" id="password" type="password">
								</div>
								
								<div>
									<button class="btn btn-primary" name="register">Register</button>
								</div>
								<div class="signup-header">
                                    
                                    <p>Already a member? Click
                                        <a href="<?php echo base_url();?>users/login"><b> HERE </b></a> to login to your account.</p>
                                </div>
							<?php echo form_close(); ?>
                        </div>
                            <!-- End Login Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
		</div>
	</div>
	<!--//about-->