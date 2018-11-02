<div class="about">
		<div class="container">
			   <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Register Box -->
                        <table class="table table-hover table-bordered" id="myTable">
							<thead>
							<tr>
								<th>Name</th>
								<th>Group</th>
								<th>Mobile No</th>
								<th>Email</th>
								<th>Location</th>
								<th>Last Donation</th>

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
							</tr>
							<?php endforeach;?>
							</tbody>
						</table>
                        <!-- End Register Box -->
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!--//about-->
	
	