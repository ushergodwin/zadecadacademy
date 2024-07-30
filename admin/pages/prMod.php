<a href="#ref<?=$prt->pid;?>" data-toggle="modal"> 
<img src="../../uploads/<?=$prt->pg_image?>" style="width:80px" /> </a>
<div class="modal fade" id="ref<?php echo $prt->pid;?>" role="dialog">
	<div class="modal-dialog">
		 <div class="modal-content">
		 	<form method="post" action="" enctype="multipart/form-data">
		 		<input type="hidden" name="reference" value="<?=$prt->pid;?>">
			 <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"> </i> </button>
				 <h4 class="modal-title">Preview Image </h4>
			 </div>
			 <div class="modal-body">	
			 <fieldset>
				<div class="col-lg-12">
					 <img src="../../uploads/<?=$prt->pg_image?>" style="width:100%" /> 
					 
				</div>
				<br>
			<div class="col-lg-12">
				<label> Image </label>
				<input type="file" class="form-control" style="width:100%" name="imgfile" accept="image/*" required>
				</div>
			 </fieldset>
			 </div>
			 <div class="modal-footer">
			 	<button type="submit" name="change_photo" class="btn btn-primary" >Update </button>
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
			 </div>
			</form>
		 </div>
	 </div>
</div> 