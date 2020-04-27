@extends('layouts.admin')

@push('select2-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
      <!-- Begin Page Content -->
      <div class="container">

        <h3>Thêm bài viết</h3>
        <form action="{{ action('NewsController@store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Chủ đề</label>
                <input type="text" class="form-control" name="title" placeholder="nhập chủ đề ...">
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" class="form-control" placeholder="Nhập nội dung" cols="30" rows="10" id="content-ckeditor"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Ảnh</label>
                <input id="imgPost" type="file" class="form-control" name="image" placeholder="chọn ảnh" onchange="readURL(event)">
                <img id="image" src="#" alt="" srcset="" width="200" height="200">
            </div>
            <div class="form-group">
                <label for="image">Tags</label>
                <select name="tag[]" multiple class="form-control" id="tags">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Xác nhận" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

        </form>
        </div>
        <!-- End of Main Content -->
    </div>
</div>
@endsection

@push('ckeditor-js')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content-ckeditor');
        function readURL(event) {
        if (event.target.files && event.target.files[0]) {
            let reader = new FileReader();
            reader.onload = function () {
                let output = document.getElementById('image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
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
            placeholder: "Gắn thẻ"
        }); });
    </script>
@endpush
