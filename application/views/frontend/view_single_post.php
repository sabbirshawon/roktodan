<div class="about">
		<div class="container">
			   <div id="content">
                <div class="container background-white">
					<div class="row">
						 <div class="col-md-6">
						
							<a href="<?php echo base_url();?>Blood_request" type="button" class="btn btn-success">All post</a>
							<?php 
								if($this->session->userdata('user_id')){
							?>
							<a href="<?php echo base_url();?>Blood_request/my_post" type="button" class="btn btn-success">My post</a>
							<?php
								}
							?>
							
							
						</div>
						<div class="col-md-6"></div>
					</div>
					<div class="row">
						<?php 
							 foreach ($post as $data):
						?>
							<div class="col-md-6">
								<div class="post">
									<div class="title">
										<h2><?php echo $data['post_title']?></h2>
										<p><i class="fa fa-user"></i> Posted By - <i><?php echo $data['user_name']?></i></p>
										<p><i class="fa fa-calendar"></i> Date - <?php echo date('d-m-Y h:i A',strtotime($data['post_dom']))?></p>
										
									</div>
									<div class="desc">
										<p><?php echo $data['post_desc']?></p>
									</div>
									<div class="comment">
											<h4>Comments</h4>
										   <?php       //if there is comments then print the comments
											if(count($comments) > 0)
											{
												foreach ($comments as $row)
												{
											?>
												<p>
													<strong><?=$row['user_name']?></strong> said at <?= date('d-m-Y h:i A',strtotime($row['c_dom']))?>
													<br>
													<?=$row['comment'];?>
												</p></hr>
										<?php   }
											}?>
										<?php 
											if($this->session->userdata('user_id')){
										?>
										<form  action="<?php echo base_url().'Blood_request/add_comment/'.$data['post_id'];?>" method="post">	
											<div class="form-group">
												<div class="input-group mb-2 mr-sm-2 mb-sm-0">
													<div class="input-group-addon"><i class="fa fa-comment"></i></div>
													<textarea name="comment" class="form-control" required></textarea>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">Add Comment</button>
											</div>
										</form>
										<?php 
											}else{
										?>
										<form  action="<?php echo base_url().'Blood_request/add_comment/'.$data['post_id'];?>" method="post">	
											<div class="form-group">
												<div class="input-group mb-2 mr-sm-2 mb-sm-0">
													<div class="input-group-addon"><i class="fa fa-comment"></i></div>
													<textarea name="comment" class="form-control" disabled required></textarea>
												</div>
											</div>
											<div class="modal-footer">
												<a href="<?php echo base_url();?>Users/login_comment" class="btn btn-primary">Login to comment</a>
											</div>
										</form>
										<?php
											}
										?>
									</div>
								</div>
							</div>
						<?php
							endforeach;
						?>
					</div>
                </div>
            </div>
		</div>
	</div>
	<!--//about-->
	
	