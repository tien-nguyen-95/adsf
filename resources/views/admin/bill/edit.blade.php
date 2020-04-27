@extends('layouts.admin')

@section('title', 'Cập nhật')

@push('select2-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h3>Cập nhật </h3>
    @include('partials.message')
    <form method="post" action="{{ action('ProductController@update' , $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Tên</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
        </div>

        <div class="form-group">
            <label for="title">Loại : </label>
            <select name="id_type">
               @foreach ($productTypes as $type)
                    <option value="{{ $type->id }}"
                        @if ($product->productType->id == $type->id)
                            selected
                        @endif
                        >{{ $type->name }}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Mô tả</label>
            <textarea class="form-control"
                name="description" id="description" required>{!! $product->description !!}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Ảnh</label>
            <input type="file" name="image" class="form-control" id="imgPost" onchange="readURL(event)">
            <img id="image" src="data:image/jpg;base64,{{ $product->image }}" alt="" srcset="" width="200" height="200">
        </div>

        <div class="form-group">
            <label for="title">Giá</label>
            <input type="number" class="form-control" name="unit_price" min='1000' placeholder="nhập giá..." value="{{ $product->unit_price }}">
        </div>
        <div class="form-group">
            <label for="title">Giá Khuyến mãi</label>
            <input type="number" class="form-control" name="promotion_price" min='0' placeholder="nhập giá khuyến mãi..." value="{{ $product->promotion_price }}">
        </div>

        <div class="form-group">
            <label for="title">Khuyến mãi : </label>
            <select name="sale">
                <option value="1"
                    @if($product->sale == 1) selected
                    @endif>Có</option>
                <option value="0"
                    @if($product->sale == 0) selected
                    @endif>Không</option>
            </select>
        </div>

        <div class="form-group">
            <label for="title">Nổi bật : </label>
            <select name="speciality">
                <option value="1"
                    @if($product->speciality == 1) selected
                    @endif>Có</option>
                <option value="0"
                    @if($product->speciality == 0) selected
                    @endif>Không</option>
            </select>
        </div>

        <input type="submit" value="Xác nhận" class="btn btn-primary">
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
    </form>
</div>
</div>
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
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
