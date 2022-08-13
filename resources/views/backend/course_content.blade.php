@extends('layouts.backend', [$title = "Course Content"])

@section('content')

<div class="row">

    <div class="col-lg-12">
        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Chapter Title</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ChapterData as $item)
                    <tr>
                        <th scope="row">{{$item->chapter_unit}}</th>
                        <td>{{$item->chapter_title}}</td>
                        <td>
                            <button onclick="editCourseChapter({{$item->id}})" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                            <form style="display: inline;" action="{{route('course_content.destroy', $item->id)}}" method="POST">
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
        <button onclick="addCourseChapter()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Chapter</button>
    </div>

</div>



<!-- Add Course Form Popup // Modal -->
<div class="modal fade" id="addCourseChapter" tabindex="-1" role="dialog"
aria-labelledby="addCourseChapterLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content res-modal">
        <div class="modal-header">
            <h5 class="modal-title" id="addCourseChapterLabel"><span id="addCourseChapterModalTitle">Add</span>
                Chapter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!--Form-->
            <form id="chapterContentForm" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div id="formMethod"></div>
                <input type="hidden" name="tc_id" value="{{$TC_ID}}">
                <input type="hidden" name="tc_slug" value="{{$TC_SLUG}}">
                <div class="form-group">
                    <label for="ch_unit">Chapter Unit</label>
                    <input type="number" name="ch_unit" value="{{old('ch_unit')}}" class="form-control" id="ch_unit" placeholder="eg. 1" required>
                </div>
                <div class="form-group">
                    <label for="ch_title">Chapter Title</label>
                    <input type="text" name="ch_title" value="{{old('ch_title')}}" class="form-control" id="ch_title" placeholder="Chapter's Name" required>
                </div>
                <div class="form-group">
                    <label for="ch_desc">Chapter Description</label>
                    <textarea name="ch_desc" id="ch_desc" cols="30" rows="6" class="form-control" required placeholder="Enter paragraph about this chapter...">{{old('ch_desc')}}</textarea>
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

    function addCourseChapter() {
        $('#ch_unit').val('');
        $('#ch_title').val('');
        $('#ch_desc').html('');
        $('#chapterContentForm').attr('action', "{{ route('course_content.store') }}");
        $('#formMethod').html('');
        $('#addCourseChapterModalTitle').html('Add');
        $('#addCourseChapter').modal('show');
    }

    function editCourseChapter(id) {
        $.ajax({
            type: "get",
            url: "/admin/course_content/showModal/" + id,
            dataType: 'json',
            success: function(response) {
                $('#ch_unit').val(response.chapter_unit);
                $('#ch_title').val(response.chapter_title);
                $('#ch_desc').html(response.chapter_desc);
                $('#chapterContentForm').attr('action', '/admin/course_content/' + id);
                $('#formMethod').html('<input name="_method" type="hidden" value="PUT">')
                $('#addCourseChapterModalTitle').html('Update');
                $('#addCourseChapter').modal('show');
            }
        });
    }
    

</script>
@endsection