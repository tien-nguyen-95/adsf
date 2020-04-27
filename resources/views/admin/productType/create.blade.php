@extends('layouts.admin')

@section('title', 'Tạo mới')

@push('select2-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')

<div class="container">
    <h3>Tạo mới </h3>
    @include('partials.message')
    <form action="{{ action('ProductTypeController@store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Tên</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập tên...">
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control"
                name="description" id="description" required>{!! old('description') !!}</textarea>
        </div>

        <div class="form-group">
            <label for="title">Ảnh</label>
            <input id="imgPost" type="file" class="form-control" name="image" onchange="readURL(event)">
            <img id="image" src="#" alt="" srcset="" width="200" height="200">
        </div>

        <input type="submit" value="Xác nhận" class="btn btn-primary">
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
    </form>
</div>
<script>
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
@endsection
@push('ckeditor-js')
<!-- CK editor 4 installed-->
<script src="ckeditor/ckeditor.js"></script>
<script>
    // Script Ckeditor 4
    CKEDITOR.replace("description");
</script>
@endpush

@push('select2-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#size').select2({
            placeholder: "Select size"
        });
    });
</script>
@endpush
