@extends('layouts.admin')

@push('select2-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container">

    <h3>Cập nhật</h3>
    <form method="post" action="{{ action('NewsController@update' , $news->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input type="text" class="form-control" name="title" placeholder="Input Title" value="{{ $news->title }}">
        </div>
        <div class="form-group">
            <label for="content">Nội dung</label>
            <textarea name="content" class="form-control" placeholder="Input Content" cols="30" rows="10" id="content-ckeditor">{!! $news->content !!}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label>
            @error('image')
                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
            @enderror
            <input type="file" name="image" class="form-control" id="imgPost" onchange="readURL(event)">
            <img id="image" src="images/news/{{ $news->image }}" alt="" srcset="" width="200" height="200">
        </div>
        <div class="form-group">
            <label for="image">Tags</label>
            <select name="tag[]" multiple class="form-control" id="tags">
                @foreach ($tags as $key => $tag)
                        <option value="{{ $tag->id }}" {{ $news->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>
    </div>


    @endsection

@push('ckeditor-js')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content-ckeditor');
    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#image_post').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgPost").change(function() {
        readURL(this);
    });
</script>
@endpush

@push('select2-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() { $("#tags").select2({
            placeholder: "Select tags"
        }); });
    </script>
@endpush
