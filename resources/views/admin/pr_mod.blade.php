<a href="#ref{{ $prt->id }}" data-toggle="modal"> 
    <img src="{{ asset('uploads/' . $prt->pg_image) }}" style="width:80px" /> 
</a>
<div class="modal fade {{ $errors->has('imgfile') && old('reference') == $prt->id ? 'show' : '' }}" 
     id="ref{{ $prt->id }}" 
     role="dialog" 
     @if($errors->has('imgfile') && old('reference') == $prt->id) 
         style="display:block;" 
     @endif>
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Update Course Image Form -->
            <form method="post" action="{{ route('admin.update_course_image', $prt->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="reference" value="{{ $prt->id }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title">Preview Image</h4>
                </div>
                <div class="modal-body">    
                    <fieldset>
                        <div class="col-lg-12">
                            <img src="{{ asset('uploads/' . $prt->pg_image) }}" style="width:100%" /> 
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <label> Image </label>
                            <input type="file" class="form-control" style="width:100%" name="imgfile" accept="image/*" required>
                            <!-- Display error for image upload -->
                            @error('imgfile')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="change_photo" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
