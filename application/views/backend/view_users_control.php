<div class="inner-block">
    <div class="blank">
    	<div class="blankpage-main">
		
			<div class="alert alert-success" style="display:none;">
		
			</div>
			<?php 
				if($this->session->userdata('user_type') == 'Admin'){
			?>
			<a type="button" class="btn btn-success" data-toggle="modal" data-target="#addAdmin" data-whatever="@mdo"  style="margin-bottom:20px;">Add New Admin</a>
			<?php
				}
			?>
	

	
			
			
			<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php 
								if($this->session->userdata('user_type') == 'Admin'){
							?>
							<h4 class="modal-title" id="exampleModalLabel">Add New Admin</h4>
							
							<?php
								}
							?>
							
						</div>
						<div class="modal-body">
							<form method="post" action="<?php echo base_url('Users_control/addUser');?>" enctype='multipart/form-data'>
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Type</div>
										<select name="user_type" class="form-control">
											<option value="Admin">Admin</option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Name</div>
										<input type="text" class="form-control" name="user_name" required="required">
									</div>
								</div>
							
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Email</div>
										<input type="email" class="form-control" name="user_email" required="required">
									</div>
								</div>
							
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Mobile No</div>
										<input type="text" class="form-control" name="user_mobile" >
									</div>
								</div>
							
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Password</div>
										<input type="password" class="form-control" name="user_password" >
									</div>
								</div>
							
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Status</div>
										<select name="user_status" class="form-control">
											<option value="1">Active</option>
											<option value="0">Inactive</option>
										</select>
									</div>
								</div>
							
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">User Pic</div>
										<input type="file" name="user_pic" class="form-control">
									</div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
						
					</div>
				</div>
			</div>
			
			
			
			
			<input type="hidden" id="user_desc" value="<?php echo base_url();?>Users_control/get_user_info_for_edit">
			<table class="table table-hover table-bordered" id="myTable">
				<thead>
				<tr>
					<th>Type</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile No</th>
					<th>Photo</th>
					<th>Status</th>
					<?php 
						if($this->session->userdata('user_type') == 'Admin'){
					?>
					<th>Action</th>
					<?php
						}
					?>
				</tr>
				</thead>
				<tbody id="user_discribe" class="tbody_col">
				<?php foreach ($user_info as $user_info):?>
				<tr>
					<input type="hidden" id="stu_<?php echo $user_info['user_id'];?>" value="<?php echo $user_info['user_id'];?>">
					<td><?php echo $user_info['user_type'];?></td>
					<td><?php echo $user_info['user_name'];?></td>
					<td><?php echo $user_info['user_email'];?></td>
					<td><?php echo $user_info['user_mobile'];?></td>
					<td><img src="<?php echo base_url().'uploads/user_pic/'.$user_info['user_pic'];?>" width="80" height="70"></td>
					<td>
						<?php 
						if($user_info['user_status'] == 0)
							{
								echo '<span style="color:#d9534f;">Inactive</span>';
							}
							else 
								echo '<span style="color:#5cb85c;">Active</span>';
					?>
					
					</td>
					<?php 
						if($this->session->userdata('user_type') == 'Admin'){
					?>
					<td>
						<input type="hidden" name="user_id" value="<?php echo $user_info['user_id'];?>" style="display: none;">
						<a type="button" class="btn btn-success" data-toggle="modal" data-target="#editAdmin" data-whatever="@mdo">Edit</a>
						<a type="button" class="btn btn-danger" href="<?php echo site_url('Users_control/delUser/'. $user_info['user_id'].''); ?>" onClick="return doconfirm();">Delete</a>
					</td>
					<?php 
						} 
					?>
					
				</tr>
				<?php endforeach;?>
				</tbody>
			</table>
			
			
			
			
			<!--edit admin-->
			
			
			<div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Edit Admin</h4>
						</div>
						<div class="modal-body">
							<form  action="<?php echo base_url();?>Users_control/editUser" method="post">
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Name</div>
										<input type="text" class="form-control" name="user_name" id="user_name_id" required="required">
									</div>
								</div>
							
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Email</div>
										<input type="email" class="form-control" name="user_email" id="user_email_id" required="required">
									</div>
								</div>
							
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Mobile No</div>
										<input type="text" class="form-control" name="user_mobile" id="user_mobile_id" >
									</div>
								</div>
							
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Status</div>
										<select name="user_status" class="form-control" id="user_status_id">
											<option value="1">Active</option>
											<option value="0">Inactive</option>
										</select>
										
										<input type="hidden" name="user_id" id="user_id2">
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
		</div>
    </div>
</div>

		
		
<script type="text/javascript">

$(document).ready(function() {
	$("#user_discribe tr").click(function(event){
		var user_id = $(this).find('input:hidden').val();
		//alert(user_id);
		var user_desc = $('#user_desc').val();
		$.ajax({
			url: user_desc,
			type: 'POST',
			dataType: 'json',
			data: {'user_id':user_id},
			success:function(result){
				$('#user_name_id').val(result.user_name);
				$('#user_email_id').val(result.user_email);
				$('#user_mobile_id').val(result.user_mobile);
				$('#user_status_id').val(result.user_status);
				$('#user_id2').val(result.user_id);
			 },
			error: function (jXHR, textStatus, errorThrown) {html()}
		});

	});
	
});

	
	
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}

</script>