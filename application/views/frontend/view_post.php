<div class="about">
		<div class="container">
			   <div id="content">
                <div class="container background-white">
					<?php 
						if($this->session->userdata('user_id')){
					?>
                    <div class="row">
                        <!-- Register Box -->
                        <div class="col-md-6">
						
							<a type="button" class="btn btn-success" data-toggle="modal" data-target="#add_post" data-whatever="@mdo">Create a post</a>
							
							<a href="<?php echo base_url();?>Blood_request/my_post" type="button" class="btn btn-success">My post</a>
							
							<!-- Modal -->
							
							<div class="modal fade" id="add_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="exampleModalLabel">Add New Post</h4>
										</div>
										<div class="modal-body">
											<form  action="<?php echo base_url();?>Blood_request/add_post" method="post">
												
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">Title</div>
														<input type="text" class="form-control" name="post_title" required="required">
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">Post Description</div>
														
														<textarea name="post_desc" class="form-control">
														</textarea>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Add</button>
												</div>
											</form>
										</div>
										
									</div>
								</div>
							</div>
							
						</div>
                        <div class="col-md-6"></div>
                    </div>
					<?php 
						}
						else{
					?>
					<div class="row">
						<div class="col-md-6">
							<a href="<?php echo base_url();?>Users/login_post" class="btn btn-success">Login</a> To Create a Post
						</div>
						<div class="col-md-6"></div>
					</div>
					
					<?php
						}
					?>
					<div class="row">
					<?php foreach ($post_info as $data):?>
						<div class="col-md-6">
							<div class="post">
								<div class="title">
									<a href="<?php echo base_url().'Blood_request/post/'.$data['post_id'];?>"><h2><?php echo $data['post_title']?></h2></a>
									<h4><i class="fa fa-user"></i> Posted By - <i><?php echo $data['user_name']?></i></h4>
									<h4><i class="fa fa-calendar"></i> Date - <?php echo date('d-m-Y h:i A',strtotime($data['post_dom']))?></h4>
									
								</div>
								<div class="desc">
									<p><?php echo $data['post_desc']?></p>
									<a href="<?php echo base_url().'Blood_request/post/'.$data['post_id'];?>">Read More...</a>
								</div>
							</div>
						</div>
					<?php endforeach;?>
					</div>
                </div>
            </div>
		</div>
	</div>
	<!--//about-->
	
	