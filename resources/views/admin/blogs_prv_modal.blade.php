<a href="#ref{{ $blog->id }}" data-toggle="modal"> 
    <img src="{{ asset('uploads/' . $blog->image) }}" style="width:100px;height:100px" /> 
</a>
<div class="modal fade" id="ref{{ $blog->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('admin.blogs.edit', ['id' => $blog->id]) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="reference" value="{{ $blog->id }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title">Update Info</h4>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="col-lg-12">
                            <img src="{{ asset('uploads/' . $blog->image) }}" style="width:100px;height:100px" /> 
                            <br/>
                        </div>
                        <div class="col-lg-12">
                            <label> Image: </label>
                            <input class="form-control" name="image" type="file" style="width:100%" accept="image/*" />
                        </div>
                        <div class="col-lg-12">
                            <label> Title: </label>
                            <input type="text" name="title" class="form-control" value="{{ $blog->title }}" style="width:100%" />
                        </div>
                        <div class="col-lg-12">
                            <label> Content: </label>
                            <input name="content" class="form-control" value="{{ $blog->content }}" style="width:100%" />
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="edit_chosen" class="btn btn-primary"> Update </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
