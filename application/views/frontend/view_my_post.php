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
							
							<a href="<?php echo base_url();?>Blood_request" type="button" class="btn btn-success">All post</a>
							
							<a href="<?php echo base_url();?>Blood_request/my_post" type="button" class="btn btn-success">My post</a>
							
							<a href="<?php echo base_url();?>Blood_request/my_comments" type="button" class="btn btn-success">My Comments</a>
							
							<!-- Modal -->
							
							<div class="modal fade" id="add_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="exampleModalLabel">Add New Post</h4>
										</div>
										<div class="modal-body">
											<form  action="<?php echo base_url();?>Blood_request/add_my_post" method="post">
												
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
							Login To Create a Post
						</div>
						<div class="col-md-6"></div>
					</div>
					
					<?php
						}
					?>
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" id="post_edit" value="<?php echo base_url();?>Blood_request/get_editPost">			
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Post Title</th>
										<th>Post Description</th>
										<th>Post Status</th>
										<th>Action</th>
										<th>View Comment</th>
									</tr>
								</thead>
								<tbody id="post_desc">
									<?php foreach ($my_post as $info):?>
									<tr>
										<input type="hidden" id="stu_<?php echo $info['post_id'];?>" value="<?php echo $info['post_id'];?>">
										<td><?php echo $info['post_title'];?></td>
										<td><?php echo $info['post_desc'];?></td>
										<td>
											<?php 
												if($info['post_status'] == 1)
													{
														echo '<span style="color:green;">Published</span>';
													}
													else{
														echo '<span style="color:red;">Unpublished</span>';
													}		
											?>	
											<input type="hidden" name="post_id" value="<?php echo $info['post_id'];?>" style="display: none;">
											<a type="button" class="btn btn-success" data-toggle="modal" data-target="#editPostStatus" data-whatever="@mdo">Edit</a>
										</td>
										<td>
											<input type="hidden" name="post_id" value="<?php echo $info['post_id'];?>" style="display: none;">
											<a type="button" class="btn btn-success" data-toggle="modal" data-target="#editPost" data-whatever="@mdo">Edit</a>
											<a type="button" class="btn btn-danger" href="<?php echo site_url('Blood_request/deletePost/'. $info['post_id'].''); ?>" onClick="return deletePost();"><i class="fa fa-trash"></i></a>
										</td>
										<td><a href="<?php echo base_url().'Blood_request/info/'.$info['post_id'];?>" class="btn btn-info">View Comment</a></td>
									
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
	
	<div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Edit Post</h4>
			</div>
			<div class="modal-body">
				<form  action="<?php echo base_url();?>Blood_request/editPost" method="post">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Title</div>
							<input type="text" class="form-control" name="post_title" id="post_title_id" required="required">
						</div>
					</div>
		
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Description</div>
							<textarea name="post_desc" id="post_desc_id" class="form-control"></textarea>
						</div>
					</div>
					<input type="hidden" name="post_id" id="post_idasss">
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
  <div class="modal fade" id="editPostStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Edit Post Status</h4>
				</div>
				<div class="modal-body">
					<form  action="<?php echo base_url();?>Blood_request/editPostStatus" method="post">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Status</div>
								<select name="post_status" id="post_status_id" class="form-control">
									<option value="1">Published</option>
									<option value="0">Unpublished</option>
								</select>
								<input type="hidden" name="post_id" id="post_idas">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
  
  
<script type="text/javascript">

	
function deletePost()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}

</script>


