<div class="inner-block">
    <div class="blank">
    	<h2>Faq - Frequently asked question,</h2>
    	<div class="blankpage-main">
				<div class="success-msg" style="margin-bottom:10px">
					<?php 
							if($this->session->flashdata('faq-item') != ''){
							echo $this->session->flashdata('faq-item'); 
							} 	
						?>
						
						<?php 
							if($this->session->flashdata('after_edit') != ''){
							echo $this->session->flashdata('after_edit'); 
							} 	
						?>
				</div>
		
			<?php 
				if($this->session->userdata('user_type') == 'Admin'){
			?>
			<a type="button" class="btn btn-success" data-toggle="modal" data-target="#add_faq" data-whatever="@mdo">Add New Faq</a>
			<?php
				}
			?>
			
			
			
			<div class="modal fade" id="add_faq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Add New Faq</h4>
						</div>
						<div class="modal-body">
							<form  action="<?php echo base_url();?>faq_admin_panel/add_faq" method="post">
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Faq Question</div>
										<input type="text" class="form-control" name="faq_question" required="required">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Faq Answer</div>
										
										<textarea name="faq_answer" class="form-control">
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
			
			<input type="hidden" id="faq_desc" value="<?php echo base_url();?>faq_admin_panel/get_faq_info_for_edit">
			
			<div class="panel panel-grey">
					<div class="panel-heading">Faq Information</div>
					<div class="panel-body">
						
						<table class="table table-hover table-bordered" id="myTable">
							<thead>
							<tr>
								<th>Faq ID</th>
								<th>Faq Question</th>
								<th>Faq Answer</th>
								<th>Faq Created</th>
								<?php 
									if($this->session->userdata('user_type') == 'Admin'){
								?>
								<th>Action</th>
								<?php
									}
								?>
							</tr>
							</thead>
							<tbody id="faq_describe" class="tbody_col">
							<?php foreach ($faq_info as $faq_info):?>
							<tr>
								<input type="hidden" id="stu_<?php echo $faq_info['faq_id'];?>" value="<?php echo $faq_info['faq_id'];?>">
								<td><?php echo $faq_info['faq_id'];?></td>
								<td><?php echo $faq_info['faq_question'];?></td>
								<td><?php echo $faq_info['faq_answer'];?></td>
								<td><?php echo $faq_info['faq_doc'];?></td>
								<?php 
									if($this->session->userdata('user_type') == 'Admin'){
								?>
								<td class="warning">
									<input type="hidden" name="faq_id" value="<?php echo $faq_info['faq_id'];?>" style="display: none;">
									<a type="button" class="btn btn-success" data-toggle="modal" data-target="#editFaq" data-whatever="@mdo">Edit</a>
								</td>
								<?php 
									} 
								?>
							</tr>
							<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
				
				
				<div class="modal fade" id="editFaq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Edit Faq</h4>
						</div>
						<div class="modal-body">
							<form  action="<?php echo base_url();?>faq_admin_panel/edit_faq" method="post">
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Faq Question</div>
										<input type="text" class="form-control" name="faq_question" id="faq_question_id" required="required">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Faq Answer</div>
										
										<textarea name="faq_answer" id="faq_answer_id" class="form-control">
										</textarea>
									</div>
									<input type="hidden" name="faq_id" id="faq_id_hidden">
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
	$("#faq_describe tr").click(function(event){
		var faq_id = $(this).find('input:hidden').val();
		//alert(faq_id);
		var faq_desc = $('#faq_desc').val();
		$.ajax({
			url: faq_desc,
			type: 'POST',
			dataType: 'json',
			data: {'faq_id':faq_id},
			success:function(result){
				$('#faq_question_id').val(result.faq_question);
				$('#faq_answer_id').val(result.faq_answer);
				$('#faq_id_hidden').val(result.faq_id);
			 },
			error: function (jXHR, textStatus, errorThrown) {html()}
		});

	});
	
});



</script>