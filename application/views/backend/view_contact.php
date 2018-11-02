<div class="inner-block">
    <div class="blank">
    	
    	<div class="blankpage-main">
			<table class="table table-hover table-bordered" id="myTable">
				<thead>
				<tr>
					<th>Name</th>
					<th>Subject</th>
					<th>Email</th>
					<th>Message</th>
				</tr>
				</thead>
				<tbody id="pack_discribe" class="tbody_col">
				<?php foreach ($msg as $msg):?>
				<tr>
					<td><?php echo $msg['msg_name'];?></td>
					<td><?php echo $msg['msg_sub'];?></td>
					<td><?php echo $msg['msg_email'];?></td>
					<td><?php echo $msg['msg_details'];?></td>
				</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
    </div>
</div>