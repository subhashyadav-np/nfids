@extends('layouts.backend', [$title = "Projects"])

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
                @foreach ($ProjectData as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->title}}</td>
                        <td class="text-center"><img src="{{asset('frontend/images/project/' .$item->cover)}}"alt="avatar" width="50px"></td>
                        <td>
                            <button onclick="editTeam({{$item->id}})" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                            <form style="display: inline;" action="{{route('project.destroy', $item->id)}}" method="POST">
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
        <button onclick="addProject()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Project</button>
    </div>

</div>



<!-- Add Course Form Popup // Modal -->
<div class="modal fade" id="project" tabindex="-1" role="dialog"
aria-labelledby="projectLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content res-modal">
        <div class="modal-header">
            <h5 class="modal-title" id="projectLabel"><span id="projectModalTitle">Add</span>
                Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!--Form-->
            <form id="projectForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div id="formMethod"></div>
                <div class="form-group">
                    <label for="project_title">Project Title</label>
                    <input type="text" name="project_title" value="{{old('project_title')}}" class="form-control" id="project_title" placeholder="eg. Public Health" required>
                </div>
                <div class="form-group">
                    <label for="project_desc">Description</label>
                    <textarea name="project_desc" id="project_desc" cols="30" rows="6" class="form-control" required placeholder="Enter paragraph about this project...">{{old('project_desc')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="project_cover">Cover</label>
                    <input type="file" name="project_cover" class="form-control-file" id="project_cover" accept="image/*">
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

    function addProject() {
        $('#project_title').val('');
        $('#project_desc').html('');
        $('#projectForm').attr('action', "{{ route('project.store') }}");
        $('#formMethod').html('');
        $('#projectModalTitle').html('Add');
        $('#project').modal('show');
    }

    function editTeam(id) {
        $.ajax({
            type: "get",
            url: "/admin/project/" + id,
            dataType: 'json',
            success: function(response) {
                $('#project_title').val(response.title);
                $('#project_desc').html(response.desc);
                $('#projectForm').attr('action', '/admin/project/' + id);
                $('#formMethod').html('<input name="_method" type="hidden" value="PUT">')
                $('#projectModalTitle').html('Update');
                $('#project').modal('show');
            }
        });
    }
    

</script>
@endsection