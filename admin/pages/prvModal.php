<a href="#ref<?=$prt->id;?>" data-toggle="modal"> 
<img src="../../uploads/<?=$prt->image?>" style="width:100px;height:100px" /> </a>
<div class="modal fade" id="ref<?php echo $prt->id;?>" role="dialog">
	<div class="modal-dialog">
		 <div class="modal-content">
		 	<form method="post" action="" enctype="multipart/form-data">
		 	<input type="hidden" name="reference" value="<?=$prt->id;?>">
			 <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"> </i> </button>
				 <h4 class="modal-title">Update Info</h4>
			 </div>
			 	<div class="modal-body">
			 		<fieldset>
						<div class="col-lg-12">
							 <img src="../../uploads/<?=$prt->image?>" style="width:100%" /> 
							 <br/>
						</div>
						<div class="col-lg-12">
							 <label> Image: </label>
							 <input class="form-control"  name="imgfile" type="file" style="width:100%" accept="image/*" />
						</div>
						<div class="col-lg-12">
							<label> Title: </label>
							<input type="text" name="title" class="form-control" value="<?=$prt->title;?>" 
							style="width:100%" />
						</div>
						<div class="col-lg-12">
							<label> Description: </label>
							<input name="description" class="form-control" value="<?=$prt->description;?>" 
							style="width:100%" />
						</div>
				   </fieldset>
				</div>
			 <div class="modal-footer">
			 	 <button type="submit" name="edit_chosen" class="btn btn-primary"> Update </button>
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
			 </div>
			</form>
		 </div>
	 </div>
</div> 