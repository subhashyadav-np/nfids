@extends('layouts.backend', [$title = "All Blogs"])

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Avatar</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($BlogsData as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->title}} </td>
                            <td class="text-center"><img src="{{asset('frontend/images/blog/' .$item->cover)}}"alt="avatar" width="50px"></td>
                            <td>
                                <a href="{{route('blog.edit', $item->slug)}}" class="btn btn-primary btn-sm text-white"><i class="fas fa-edit"></i></a>
                                <form style="display: inline;" action="{{route('blog.destroy', $item->id)}}" method="POST">
                                    @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure to delete this blog?')" class="btn btn-danger btn-sm">
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
            <a href="{{route('blog.create')}}" class="btn btn-primary text-white"><i class="fa fa-pen"></i> Create Post</a>
        </div>

    </div>
    
@endsection