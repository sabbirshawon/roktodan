
            <div id="content-top-border" class="container">
            </div>
            <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="container">
                        <div class="row margin-vert-30">
                            <!-- Login Box -->
                            <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
									
                                <?php echo form_open("users/login"); ?>
                                    <div class="login-header margin-bottom-30">
                                        <h2>Login to your account</h2>
										<?php if(isset($wrong_message)) { ?>
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h6><?php echo $wrong_message; ?></h6>
										</div>
									<?php } ?>
                                    </div>
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <select name="user_type" class="form-control">
											<option value="Admin">Admin</option>
											<option value="Donor">Donor</option>
										</select>
										<?php echo form_error('type','<span class="help-block">','</span>'); ?>
									</div>
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input placeholder="Email" class="form-control" type="email" name="user_email" required="" value="">
										<?php echo form_error('email','<span class="help-block">','</span>'); ?>
									</div>
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input placeholder="Password" class="form-control" type="password" required="" name="user_password">
										<?php echo form_error('password','<span class="help-block">','</span>'); ?>
										
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-primary pull-right" type="submit" name="loginSubmit">Login</button>
                                        </div>
                                    </div>
                                    <hr>

                                <?php form_close(); ?>
                            </div>
                            <!-- End Login Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
