@extends('layouts.backend', [$title = "Training & Consulting"])

@section('content')

<div class="row">

    <div class="col-lg-12">
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Cover</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($TrainCons as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->title}}</td>
                        <td class="text-center"><img src="{{asset('frontend/images/training_consulting/' .$item->cover)}}"alt="avatar" width="50px"></td>
                        <td>
                            <a href="{{route('course_content.show', $item->slug)}}" class="btn btn-success btn-sm">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                            <button onclick="editTeam({{$item->id}})" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                            <form style="display: inline;" action="{{route('training_consulting.destroy', $item->id)}}" method="POST">
                                @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure to delete this Item?')" class="btn btn-danger btn-sm">
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
        <button onclick="addTC()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Training & Consulting</button>
    </div>

</div>



<!-- Add Course Form Popup // Modal -->
<div class="modal fade" id="trainCons" tabindex="-1" role="dialog"
aria-labelledby="trainConsLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content res-modal">
        <div class="modal-header">
            <h5 class="modal-title" id="trainConsLabel"><span id="trainConsModalTitle">Add</span>
                Training & Consulting</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!--Form-->
            <form id="tcForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div id="formMethod"></div>
                <div class="form-group">
                    <label for="tc_title">Title</label>
                    <input type="text" name="tc_title" value="{{old('tc_title')}}" class="form-control" id="tc_title" placeholder="Training Consulting's Name" required>
                </div>
                <div class="form-group">
                    <label for="tc_desc">Description</label>
                    <textarea name="tc_desc" id="tc_desc" cols="30" rows="6" class="form-control" required placeholder="Enter paragraph about this course...">{{old('tc_desc')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="tc_cover">Cover</label>
                    <input type="file" name="tc_cover" class="form-control-file" id="tc_cover">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
        </div>
        </form>

    </div>
</div>
</div>
    
@endsection

@section('scripts')
<script type="text/javascript">

    function addTC() {
        $('#tc_title').val('');
        $('#tc_desc').html('');
        $('#tcForm').attr('action', "{{ route('training_consulting.store') }}");
        $('#formMethod').html('');
        $('#trainConsModalTitle').html('Add');
        $('#trainCons').modal('show');
    }

    function editTeam(id) {
        $.ajax({
            type: "get",
            url: "/admin/training_consulting/" + id,
            dataType: 'json',
            success: function(response) {
                $('#tc_title').val(response.title);
                $('#tc_desc').html(response.desc);
                $('#tcForm').attr('action', '/admin/training_consulting/' + id);
                $('#formMethod').html('<input name="_method" type="hidden" value="PUT">')
                $('#trainConsModalTitle').html('Update');
                $('#trainCons').modal('show');
            }
        });
    }
    

</script>
@endsection