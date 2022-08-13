@extends('layouts.backend', ['title' => 'Teams'])


@section('content')

<div class="row">
    <div class="col-12">
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>Avatar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Teams as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->job}}</td>
                    <td>
                        <div class="text-center">
                            <img src="{{ asset('images/team/' .$item->avatar) }}" width="50px" />
                        </div>
                    </td>
                    <td style="display: flex; justify-content: space-around; align-items:center;">
                        <button class="btn btn-info btn-sm" onclick="editTeam({{$item->id}})">
                            <span class="fa fa-edit"></span>
                        </button>
                        <form style="display: inline;" action="{{route('team.destroy',['team'=>$item->id])}}" method="POST">
                            @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure to delete this member?')" class="btn btn-danger btn-sm">
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
    <div class="col-12 my-3">
        <button type="button" class="btn btn-primary btn-sm" onclick="addTeam()">
            <i class="fa fa-plus"></i> Add Team
        </button>
    </div>
</div>



<!-- Add Team Form Popup // Modal -->
<div class="modal fade" id="teamData" tabindex="-1" role="dialog"
aria-labelledby="teamDataLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content res-modal">
        <div class="modal-header">
            <h5 class="modal-title" id="teamDataLabel"><span id="teamModalTitle">Add</span>
                Team</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!--Form-->
            <form id="teamForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div id="formMethod"></div>
                <div class="form-group">
                    <label for="tname">Name *</label>
                    <input type="text" name="tname" value="{{old('tname')}}" class="form-control" id="tname" placeholder="eg. john doe" required>
                </div>
                <div class="form-group">
                    <label for="tjob">Member Desgination *</label>
                    <input type="text" name="tjob" value="{{old('tjob')}}" class="form-control" id="tjob" placeholder="eg. finance manager" required>
                </div>
                <div class="form-group">
                    <label for="paragraph">Member Detail</label>
                    <textarea name="paragraph" id="paragraph" cols="30" rows="4" class="form-control">{{old('paragraph')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="avatar">Team Avatar *</label>
                    <input type="file" name="avatar" class="form-control-file" id="avatar" aria-describedby="team_cover_help">
                    <small id="team_cover_help" class="form-text text-muted">Maximum image size is 2048KB, Recommended Resolution : 1*1</small>
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

<!-- Edit Team Form Popup // Modal -->
<div class="modal fade" id="editTeamData" tabindex="-1" role="dialog"
aria-labelledby="editTeamDataLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content res-modal">
        <div class="modal-header">
            <h5 class="modal-title" id="editTeamDataLabel">Update Team</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!--Form-->
            <form id="EditTeamForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="tname_e">Name *</label>
                    <input type="text" name="tname" value="{{old('tname')}}" class="form-control" id="tname_e" placeholder="eg. john doe" required>
                </div>
                <div class="form-group">
                    <label for="tjob_e">Member Desgination *</label>
                    <input type="text" name="tjob" value="{{old('tjob')}}" class="form-control" id="tjob_e" placeholder="eg. finance manager" required>
                </div>
                <div class="form-group">
                    <label for="paragraph_e">Member Detail</label>
                    <textarea name="paragraph" id="paragraph_e" cols="30" rows="4" class="form-control">{{old('paragraph')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="avatar">Team Avatar *</label>
                    <input type="file" name="avatar" class="form-control-file" id="avatar" aria-describedby="team_cover_help">
                    <small id="team_cover_help" class="form-text text-muted">Maximum image size is 2048KB, Recommended Resolution : 1*1</small>
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
<script src="{{ asset('backend/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/libs/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">

    function addTeam() {
        $('#tname').val('');
        $('#tjob').val('');
        $('#paragraph').html('');
        $('#teamForm').attr('action', "{{ route('team.store') }}");
        $('#formMethod').html('');
        $('#teamModalTitle').html('Add');
        $('#teamData').modal('show');
        CKEDITOR.replace('paragraph', {
            width: '100%',
            height: 100
        });
    }

    function editTeam(id) {
        $.ajax({
            type: "get",
            url: "/admin/team/" + id,
            dataType: 'json',
            success: function(response) {
                $('#tname_e').val(response.name);
                $('#tjob_e').val(response.job);
                $('#paragraph_e').html(response.paragraph);
                $('#EditTeamForm').attr('action', '/admin/team/' + id);
                $('#editTeamData').modal('show');
                CKEDITOR.replace('paragraph_e', {
                    width: '100%',
                    height: 100
                });
            }
        });
    }
    

</script>
@endsection