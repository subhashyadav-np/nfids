@extends('layouts.backend', [$title = "Gallery"])


@section('content')
<div class="row">

    <div class="col-lg-12">
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($GalleryData as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->title}} </td>
                        <td class="text-center"><img src="{{asset('frontend/images/gallery/' .$item->photo)}}"alt="avatar" width="50px"></td>
                        <td>
                            <button onclick="editPhoto({{$item->id}})" class="btn btn-primary btn-sm text-white"><i class="fas fa-edit"></i></button>
                            <form style="display: inline;" action="{{route('gallery.destroy', $item->id)}}" method="POST">
                                @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure to delete this photo?')" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash-alt"></span>
                                    </button>
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-lg-12 mt-2">
        <button onclick="addPhoto()" class="btn btn-primary text-white"><i class="fa fa-plus"></i> Add Photo</button>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLabel"> <span id="ModalLabelStatus">Add</span> Photo
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="GalleryForm" enctype="multipart/form-data">
                @csrf
                <div id="formMethod"></div>
                <div class="form-group">
                    <label for="photoTitle">Title *</label>
                    <input type="text" name="photoTitle" class="form-control" id="photoTitle" placeholder="type title for image">
                </div>
                <div class="form-group">
                    <label for="photoFile">Photo *</label>
                    <input type="file" name="photoFile" class="form-control-file" id="photoFile" aria-describedby="photoHelp">
                    <small id="photoHelp" class="form-text text-muted">Maximum image size is 2048KB</small>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')

<script>
    function addPhoto() {
        $('#photoTitle').val('');
        $('#GalleryForm').attr('action', '/admin/gallery');
        $('#formMethod').html('')
        $('#ModalLabelStatus').html('Add');
        $('#exampleModal').modal('show');
    }
    function editPhoto(id) {
            $.ajax({
                type: "get",
                url: "/admin/gallery/" + id,
                dataType: 'json',
                success: function(response) {
                    $('#photoTitle').val(response.title);
                    $('#GalleryForm').attr('action', '/admin/gallery/' + id);
                    $('#formMethod').html('<input name="_method" type="hidden" value="PUT">')
                    $('#ModalLabelStatus').html('Update');
                    $('#exampleModal').modal('show');
                }
            });
        }
</script>
    
@endsection