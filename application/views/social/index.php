<?php include('/../partials/header.php'); ?>

<div  style="padding-bottom: 10px;">
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Posting Comment Demo 
				<span class="small pull-right">					
					<?php
					echo date('d-m-Y'); 
					echo " | ";
					date_default_timezone_set("Asia/Kolkata");
					echo date("h:i A"); 
					?> 
				</span>
			</h2>						 
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="margin-top: 10px;">
			<?php 
			if ($this->session->flashdata('msg-success')) {?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success :</strong> <?php echo $this->session->flashdata('msg-success');?>
			</div>
			<?php }
			else if ($this->session->flashdata('msg-failed')) {?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Oops :</strong> <?php echo $this->session->flashdata('msg-success');?>
			</div>
			<?php } 

			if (validation_errors() != false) {?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Oops :</strong> <?php echo validation_errors();?>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="row">		
		
		<div class="col-md-4 col-md-offset-4" style="margin-top: 10px;">
			
		<form method="post" action="<?php echo site_url('social/addComment'); ?>">

				<div class="form-group" id="card">
					<textarea rows="5" class="form-control" id="comment" name="comment"  placeholder="Event Your Comment"></textarea>			    
				</div>
				<button type="submit" class="btn btn-danger pull-right" style="margin-bottom:  15px;">Post Comments</button>
			</form>
		</div>	 
	</div>

	<?php 
	if (!empty($comments)) {
		foreach ($comments as $comment) {?>

		<div class="row" style="margin-bottom:15px;">
			<div class="col-md-4 col-md-offset-4" id="card" style="border-left: 2px solid red;">

				<div class="row">
					<div class="pull-right small" style="margin-right: 5px; margin-top: 5px;">
						<?php echo $comment->date_time; ?> 
					</div>    		    		

					<div class="pull-left small" style="margin-left: 5px; margin-top: 5px;">
						by : <?php echo $comment->username; ?>
					</div>

				</div>
				<div class="row">
					<div class="pull-right" style="margin-right: 5px;">
						<?php 
						if ($this->session->userdata('username')->id != $comment->user_id) {?>
						<a href="javascript:void(0);"     				 
						id="like<?php echo $comment->id; ?>"
						class="<?php echo $comment->like == 0 ? '' : 'colorh'; ?>"
						onclick='likeMe("<?php echo $comment->id;?>");'> 
						<i class="fa fa-heart-o"  style="margin-right: 5px;"> </i> </a>
						<?php }
						?>
						<?php 
						if ($this->session->userdata('username')->id == $comment->user_id) {
							$a = json_encode($comment);
							echo "<a href='javascript:void(0);'	 
							onclick='showModal($a)'> <i class='fa fa-pencil' aria-hidden='true' style='margin-right: 5px;''> </i> </a>";	    			
							?>
							<a class="colorh" href="<?php echo site_url("social/deleteMe?id=".$comment->id);?>"> <i class="fa fa-trash-o" aria-hidden="true"> </i> </a> 
							<?php }
							?>

						</div>
					</div>		
					<hr>
					<div class="row">    		
						<div style="margin-left: 10px; margin-right: 5px;margin-bottom: 5px;">
							<?php echo $comment->comment; ?>
						</div>   	
					</div>    	
				</div>

			</div>
			<?php }
		}
		else
		{
			echo "There is no comment found..";
		} ?> 

		<div class="row">

		</div>
	</div>


	<!-- Modal for Edit record-->
	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" id="closeModel" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Update Comment</h4>
				</div>

				<div class="modal-body">       	       			
					<div class="alert alert-success text-center" id="success_e"></div>        		
					<div class="alert alert-danger text-center" id="failed_e"></div>	

					<form method="post" action="<?php echo site_url('social/editComment'); ?>">
						<input type="hidden" id="hidden_id" name="hidden_id">

						<div class="form-group">
							<label for="exampleInputDesc1">Comment</label>
							<textarea required rows="3" class="form-control" id="e_comment" name="e_comment"  placeholder="Event Description"></textarea>			    
						</div>	
					</div>

					<div class="modal-footer">
						<button type="button" id="closeModel" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-danger">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script>

	</script>
	<?php include('/../partials/footer.php'); ?>

	<script>
		$( document ).ready(function() {
			$('#success_e').hide(); 
			$('#failed_e').hide();
		}); 
		function showModal(data)
		{		
			$('#hidden_id').val(data.id);
			$('#e_comment').val(data.comment);
			$('#modalEdit').modal();
		}
		function likeMe(id)
		{	 
			$.ajax({
				type        : "POST", 
				url         : "<?php echo site_url('social/likeMe');?>", 
				data        : {id:id},            
			}).done(function(data) {
				if (data == 1) 
				{   
					$("#like"+id).addClass("colorh");	    	 
				}
				else
				{
					$("#like"+id).removeClass("colorh");
				}
			});
		}	 
	</script>