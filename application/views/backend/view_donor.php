<div class="inner-block">
    <div class="blank">
    	<div class="breadcrumb">
			You are here: <a href="<?php echo base_url();?>users/dashboard">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i> <a href="<?php echo base_url();?>donor">Donor</a>
		</div>
    	<div class="blankpage-main">

			
			<input type="hidden" id="pack_desc" value="<?php echo base_url();?>property/get_pro_info_for_edit">
			<table class="table table-hover table-bordered" id="myTable">
				<thead>
				<tr>
					<th>Name</th>
					<th>Group</th>
					<th>Mobile No</th>
					<th>Email</th>
					<th>Location</th>
					<th>Last Donation</th>
					<?php 
						if($this->session->userdata('user_type') == 'Admin'){
					?>
					<th>Action</th>
					<?php
						}
					?>
					
				</tr>
				</thead>
				<tbody id="pack_discribe" class="tbody_col">
				<?php foreach ($pro_info as $pro_info):?>
				<tr>
					<input type="hidden" id="stu_<?php echo $pro_info['donor_id'];?>" value="<?php echo $pro_info['donor_id'];?>">
					<td><?php echo $pro_info['donor_name'];?></td>
					<td><?php echo $pro_info['donor_group'];?></td>
					<td><?php echo $pro_info['donor_mob_no'];?></td>
					<td><?php echo $pro_info['donor_email'];?></td>
					<td><?php echo $pro_info['donor_location'];?></td>
					<td><?php echo $pro_info['last_donation'];?></td>
					<?php 
						if($this->session->userdata('user_type') == 'Admin'){
					?>
					<td>
						<input type="hidden" name="donor_id" value="<?php echo $pro_info['donor_id'];?>" style="display: none;">
						<a type="button" class="btn btn-success" data-toggle="modal" data-target="#EditPro" data-whatever="@mdo">Edit</a>
						<a type="button" class="btn btn-danger" href="<?php echo site_url('property/deletePack/'. $pro_info['donor_id'].''); ?>" onClick="return doconfirm();">Delete</a>
					</td>
					<?php 
						} 
					?>
					
				</tr>
				<?php endforeach;?>
				</tbody>
			</table>
			
			
			<div class="modal fade" id="EditPro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Edit Property</h4>
						</div>
						<div class="modal-body">
							<form  action="<?php echo base_url();?>property/editPro" method="post">
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Title</div>
										<input type="text" class="form-control" name="p_title" id="p_title_id" required="required">
									</div>
								</div>
						
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Bedrooms</div>
										<input type="number" class="form-control" name="p_bedrooms" id="p_bedrooms_id">
									</div>
								</div>
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Baths</div>
										<input type="number" class="form-control" name="p_baths" id="p_baths_id">
										<input type="hidden" name="donor_id" id="donor_id2">
									</div>
								</div>
								
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Fully Furnished</div>
										<select name="p_furnished" class="form-control" id="p_furnished_id">
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
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
	$("#pack_discribe tr").click(function(event){
		var donor_id = $(this).find('input:hidden').val();
		//alert(donor_id);
		var pack_desc = $('#pack_desc').val();
		$.ajax({
			url: pack_desc,
			type: 'POST',
			dataType: 'json',
			data: {'donor_id':donor_id},
			success:function(result){
				$('#p_title_id').val(result.p_title);
				$('#p_bedrooms_id').val(result.p_bedrooms);
				$('#p_baths_id').val(result.p_baths);
				$('#p_furnished_id').val(result.p_furnished);
				$('#donor_id2').val(result.donor_id);
			 },
			error: function (jXHR, textStatus, errorThrown) {html()}
		});

	});
	
});


		
</script>


<script>
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>