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
							<!--<a type="button" class="btn btn-success" data-toggle="modal" data-target="#Change" data-whatever="@mdo">Change Image</a>-->
						</div>
						<div class="user-details">
							<h3>Name: <?php echo $user_data['user_name'];?></h3>
							<h4>Type: <?php echo $user_data['user_type'];?></h4>
						</div>
					</div>
					<div class="col-md-9">
						<div class="user-details table-responsive">
							<h2>User Information</h2>
							<input type="hidden" id="pro_desc" value="<?php echo base_url();?>profile/get_profile_for_edit">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Blood Group</th>
										<th>Email</th>
										<th>Mobile No</th>
										<th>Last Donation</th>
										<th>Joined Date</th>
										<th>Location</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="prof">
									<tr>
										<input type="hidden" id="stu_<?php echo $user_data['donor_id'];?>" value="<?php echo $user_data['donor_id'];?>">
										<td><?php echo $user_data['donor_group'];?></td>
										<td><?php echo $user_data['donor_email'];?></td>
										<td><?php echo $user_data['donor_mob_no'];?></td>
										<td><?php echo $user_data['last_donation'];?></td>
										<td><?php echo $user_data['donor_doc'];?></td>
										<td><address><?php echo $user_data['donor_location'];?></address></td>
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
											<input type="hidden" name="donor_id" value="<?php echo $user_data['donor_id'];?>" style="display: none;">
											<a type="button" class="btn btn-success" data-toggle="modal" data-target="#Edit" data-whatever="@mdo">Edit</a>
										</td>
									</tr>
								</tbody>
							</table>
							
			<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Edit Profile</h4>
						</div>
						<div class="modal-body">
							<form  action="<?php echo base_url();?>profile/editProfile" method="post">
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Name</div>
										<input type="text" class="form-control" name="donor_name" id="donor_name_id" required="required">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Blood Group</div>
										<select name="donor_group" id="donor_group_id" class="form-control">
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
									<div class="input-group">
										<div class="input-group-addon">Mobile No</div>
										<input type="text" class="form-control" name="donor_mob_no" id="donor_mob_id">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Email</div>
										<input type="text" class="form-control" name="donor_email" id="donor_email_id">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Last Donation</div>
										<input type="date" class="form-control" name="last_donation" id="last_donation_id">
										<input type="hidden" name="donor_id" id="donor_id2">
									</div>
								</div>
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Address</div>
										<textarea name="donor_location" id="donor_location_id" class="form-control"></textarea>
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
$(document).ready(function() {
	$("#prof tr").click(function(event){
		var donor_id = $(this).find('input:hidden').val();
		//alert(donor_id);
		var pro_desc = $('#pro_desc').val();
		$.ajax({
			url: pro_desc,
			type: 'POST',
			dataType: 'json',
			data: {'donor_id':donor_id},
			success:function(result){
				$('#donor_name_id').val(result.donor_name);
				$('#donor_group_id').val(result.donor_group);
				$('#donor_mob_id').val(result.donor_mob_no);
				$('#donor_email_id').val(result.donor_email);
				$('#last_donation_id').val(result.last_donation);
				$('#donor_location_id').val(result.donor_location);
				$('#donor_id2').val(result.donor_id);
			 },
			error: function (jXHR, textStatus, errorThrown) {html()}
		});

	});
	
});




		
</script>