<div class="about">
		<div class="container">
			   <div id="content">
                <div class="container background-white">
					<?php 
						if($this->session->userdata('user_id')){
					?>
                    <div class="row">
                        <div class="col-md-6">
						
							<a href="<?php echo base_url();?>Blood_request" type="button" class="btn btn-success">All post</a>
							
							<a href="<?php echo base_url();?>Blood_request/my_post" type="button" class="btn btn-success">My post</a>
							
							<a href="<?php echo base_url();?>Blood_request/my_comments" type="button" class="btn btn-success">My Comments</a>
							
							
						</div>
                        <div class="col-md-6"></div>
                    </div>
					<?php 
						}
						else{
					?>
					<div class="row">
						<div class="col-md-6">
							Login To Create a Post
						</div>
						<div class="col-md-6"></div>
					</div>
					
					<?php
						}
					?>
					<div class="row">
						<div class="col-md-12">		
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Post Title</th>
										<th>Comment</th>
										<th>Comment Status</th>
									</tr>
								</thead>
								<tbody id="post_desc">
									<?php foreach ($post_details as $info):?>
									<tr>
										<td><?php echo $info['post_title'];?></td>
										<td>
											<?php echo $info['comment'];?>
										</td>
										<td>
											<?php 
												if($info['c_status'] == 1)
													{
														echo '<span style="color:green;">Published</span>';
													}
													else{
														echo '<span style="color:red;">Unpublished</span>';
													}		
											?>	
										</td>
									
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
		</div>
	</div>
	<!--//about-->
	
	