@extends('layouts.backend', [$title = "Create Blogs"])

@section('content')

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="blogTitle">Blog Title *</label>
                    <input type="text" name="title" value="{{old('name')}}" class="form-control" id="blogTitle" placeholder="Enter blog title here" required>
                </div>
                <div class="form-group">
                    <label for="blogCover">Blog Thubmnail *</label>
                    <input type="file" name="cover" class="form-control-file" id="blogCover" aria-describedby="blog_cover_help" required>
                    <small id="blog_cover_help" class="form-text text-muted">Maximum image size is 2048KB</small>
                </div>
                <div class="form-group">
                    <label for="blogPost">Write Blog Post *</label>
                    <textarea name="blog" id="blogPost" cols="30" rows="10" class="form-control" required>{{old('blog')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="blogMetaDesc">Write Blog Meta Description</label>
                    <textarea name="meta_desc" id="blogMetaDesc" cols="30" rows="4" class="form-control" aria-describedby="meta_desc_info">{{old('meta_desc')}}</textarea>
                    <small id="meta_desc_info" class="form-text text-muted">Good meta description will help you to rank your bolg in search engines.</small>
                </div>
                <div class="form-group">
                    <label for="blogMetaKeys">Write Blog Keywords</label>
                    <input type="text" name="keywords" value="{{old('keywords')}}" class="form-control" id="blogMetaKeys" aria-describedby="meta_key_info"
                        placeholder="Write some good keywords for this blog" required>
                    <small id="meta_key_info" class="form-text text-muted">Separete keywords with commas ","</small>
                </div>
                <button type="submit" class="btn btn-primary">Publish Blog</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('backend/libs/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
    CKEDITOR.replace('blogPost');
</script>
@endsection
