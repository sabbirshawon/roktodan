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
							<input type="hidden" id="c_edit" value="<?php echo base_url();?>Blood_request/get_editComment">			
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Post Title</th>
										<th>Comment</th>
										<th>Comment Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="c_desc">
									<?php foreach ($my_comment as $info):?>
									<tr>
										<input type="hidden" id="stu_<?php echo $info['c_id'];?>" value="<?php echo $info['c_id'];?>">
										<td><?php echo $info['post_title'];?></td>
										<td>
											<?php echo $info['comment'];?>
											<input type="hidden" name="post_id" value="<?php echo $info['c_id'];?>" style="display: none;">
											<a type="button" class="btn btn-success" data-toggle="modal" data-target="#editComment" data-whatever="@mdo">Edit</a>
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
											<input type="hidden" name="post_id" value="<?php echo $info['c_id'];?>" style="display: none;">
											<a type="button" class="btn btn-success" data-toggle="modal" data-target="#editCStatus" data-whatever="@mdo">Edit</a>
										</td>
										<td>
											<a type="button" class="btn btn-danger" href="<?php echo site_url('Blood_request/deleteComment/'. $info['c_id'].''); ?>" onClick="return deleteComment();"><i class="fa fa-trash"></i></a>
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
	
	<div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Edit Post</h4>
			</div>
			<div class="modal-body">
				<form  action="<?php echo base_url();?>Blood_request/editComment" method="post">
		
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Comment</div>
							<textarea name="comment" id="comment_id" class="form-control"></textarea>
						</div>
					</div>
					<input type="hidden" name="c_id" id="c_idasss">
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
  <div class="modal fade" id="editCStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Edit Comment Status</h4>
				</div>
				<div class="modal-body">
					<form  action="<?php echo base_url();?>Blood_request/editCStatus" method="post">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Status</div>
								<select name="c_status" id="c_status_id" class="form-control">
									<option value="1">Published</option>
									<option value="0">Unpublished</option>
								</select>
								<input type="hidden" name="c_id" id="c_idas">
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

	
function deleteComment()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}

</script>


