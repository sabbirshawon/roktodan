<div class="inner-block">
    <div class="blank">
    	
    	<div class="blankpage-main">
			<?php foreach ($user_data as $user_data):?>
				<div class="row">
					<div class="col-md-3">
						<div class="user-photo">
							<?php if($user_data['user_status'] == null) {?>
							<img src="<?php echo base_url().'uploads/user_pic/'.$user_info['user_pic'];?>" width="80" height="70" class="img-responsive">
						
						<?php } else{
						?>
							<img src="<?php echo base_url()?>style/user_pic/1.jpg" width="80" height="70" class="img-responsive">
						<?php } ?>
						</div>
						<div class="user-details">
							<h3>Name: <?php echo $user_data['user_name'];?></h3>
							<h4>Type: <?php echo $user_data['user_type'];?></h4>
						</div>
					</div>
					<div class="col-md-9">
						<div class="user-details table-responsive">
							<h2>User Settings</h2>
							<input type="hidden" id="pro_desc" value="<?php echo base_url();?>Settings/get_profile_for_edit">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Email</th>
										<th>Password</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="prof">
									<tr>
										<input type="hidden" id="stu_<?php echo $user_data['user_id'];?>" value="<?php echo $user_data['user_id'];?>">
										<td><?php echo $user_data['user_email'];?></td>
										<td>*******</td>
										<td><?php 
											if($user_data['user_status'] == 1)
											{
												echo '<span style="color:green;">Active</span>';
											}
											else{
												echo '<span style="color:green;">Inactive</span>';
											}
										?></td>
										<td>
											<input type="hidden" name="user_id" value="<?php echo $user_data['user_id'];?>" style="display: none;">
											<a type="button" class="btn btn-success" data-toggle="modal" data-target="#Edit" data-whatever="@mdo">Edit</a>
											<a type="button" class="btn btn-danger" href="<?php echo site_url('Users_control/delUser/'. $user_data['user_id'].''); ?>" onClick="return doconfirm();">Delete</a
										</td>
									</tr>
								</tbody>
							</table>
							
			<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Edit Settings</h4>
						</div>
						<div class="modal-body">
							<form  action="<?php echo base_url();?>settings/editSettings" method="post">
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Email</div>
										<input type="text" class="form-control" name="user_email" id="user_email_id" required="required">
									</div>
								</div>
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Password</div>
										<input type="password" class="form-control" name="user_password">
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
			<?php endforeach;?>
		</div>
    </div>
</div>
<script type="text/javascript">

function doconfirm()
{
    job=confirm("Are you sure to delete your Account permanently?");
    if(job!=true)
    {
        return false;
    }
}

</script>

<script type="text/javascript">
$(document).ready(function() {
	$("#prof tr").click(function(event){
		var user_id = $(this).find('input:hidden').val();
		//alert(user_id);
		var pro_desc = $('#pro_desc').val();
		//alert(pro_desc);
		$.ajax({
			url: pro_desc,
			type: 'POST',
			dataType: 'json',
			data: {'user_id':user_id},
			success:function(result){
				$('#user_email_id').val(result.user_email);
				$('#user_id2').val(result.user_id);
			 },
			error: function (jXHR, textStatus, errorThrown) {html()}
		});

	});
	
});


		
</script>