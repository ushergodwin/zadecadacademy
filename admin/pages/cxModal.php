<a href="#shx<?=$prt->tid;?>" data-toggle="modal"> 
<img src="../../images/<?=$prt->image?>" style="width:80px" /> </a>
<div class="modal fade" id="shx<?php echo $prt->tid;?>" role="dialog">
	<div class="modal-dialog">
		 <div class="modal-content">
			 <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"> </i> </button>
				 <h4 class="modal-title">Preview Image </h4>
			 </div>
			 <div class="modal-body">	
			 <fieldset>
				<div class="col-lg-12">
					 <img src="../../images/<?=$prt->image?>" style="width:100%" /> 
				</div>
			 </fieldset>
			 </div>
			 <div class="modal-footer">
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
			 </div>
		 </div>
	 </div>
</div> 