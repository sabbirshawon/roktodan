<div class="inner-block">
    <div class="blank">
    	
    	<div class="blankpage-main">
			<table class="table table-hover table-bordered" id="myTable">
				<thead>
				<tr>
					<th>Package Name</th>
					<th>Person Name</th>
					<th>Person Email</th>
					<th>Person Mobile</th>
					<th>Booking Message</th>
				</tr>
				</thead>
				<tbody id="pack_discribe" class="tbody_col">
				<?php foreach ($booking_info as $booking_info):?>
				<tr>
					<td><?php echo $booking_info['package_name'];?></td>
					<td><?php echo $booking_info['book_name'];?></td>
					<td><?php echo $booking_info['book_email'];?></td>
					<td><?php echo $booking_info['book_mob_no'];?></td>
					<td><?php echo $booking_info['book_msg'];?></td>
				</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
    </div>
</div>