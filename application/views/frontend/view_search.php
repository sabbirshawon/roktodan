<div class="about">
		<div class="container">
			   <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Register Box -->
						<?php 
						   if($datas != False):
						?>
                        <table class="table table-hover table-bordered">
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
							<?php 
					
							   //if($datas != False):
								//if($query!='') 
								foreach($datas as $data):
								//
							?>
							<tr>
								<td><?php echo $data['donor_name'];?></td>
								<td><?php echo $data['donor_group'];?></td>
								<td><?php echo $data['donor_mob_no'];?></td>
								<td><?php echo $data['donor_email'];?></td>
								<td><?php echo $data['donor_location'];?></td>
								<td><?php echo $data['last_donation'];?></td>
							</tr>
								
							<?php
								endforeach;
							?>
							</tbody>
						</table>
						<?php
							else:
							echo "No Result Found";
							endif;
						?>
                        <!-- End Register Box -->
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!--//about-->
	
	