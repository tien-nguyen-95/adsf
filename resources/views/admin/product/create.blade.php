@extends('layouts.admin')

@push('select2-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
      <!-- Begin Page Content -->
      <div class="container">
            <h3>Tạo mới </h3>
            <form action="{{ action('ProductController@store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Tên</label>
                    @error('name')
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên...">
                </div>

                <div class="form-group">
                    <label for="title">Ảnh</label>
                    @error('image')
                        <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                    @enderror
                    <input id="imgPost" type="file" class="form-control" name="image" placeholder="chọn ảnh" onchange="readURL(event)">
                    <img id="image" src="#" alt="" srcset="" width="200" height="200">
                </div>

                <div class="form-group">
                    @error('id_type')
                        <div class="alert alert-danger">{{ $errors->first('id_type') }}</div>
                    @enderror
                    <label for="title">Loại : </label>
                    <select name="id_type">
                    @foreach ($productTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Mô tả</label>
                    @error('description')
                        <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                    @enderror
                    <textarea class="form-control"
                        name="description" id="description" required>{!! old('description') !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="title">Giá</label>
                    @error('unit_price')
                        <div class="alert alert-danger">{{ $errors->first('unit_price') }}</div>
                    @enderror
                    <input type="number" class="form-control" name="unit_price"  placeholder="nhập giá...">
                </div>

                <div class="form-group">
                    <label for="title">Đặt Khuyến mãi</label>
                    @error('promotion')
                        <div class="alert alert-danger">{{ $errors->first('promotion') }}</div>
                    @enderror
                    <input type="number" class="form-control" name="promotion" placeholder="nhập giá khuyến mãi...%">
                </div>

                <div class="form-group">
                    <label for="title">Khuyến mãi : </label>
                    @error('sale')
                        <div class="alert alert-danger">{{ $errors->first('sale') }}</div>
                    @enderror
                    <select name="sale">
                        <option value="1">Có</option>
                        <option value="0" selected>Không</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Nổi bật : </label>
                    @error('speciality')
                        <div class="alert alert-danger">{{ $errors->first('speciality') }}</div>
                    @enderror
                    <select name="speciality">
                        <option value="1">Có</option>
                        <option value="0" selected>Không</option>
                    </select>
                </div>

                <input type="submit" value="Xác nhận" class="btn btn-primary">
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('ckeditor-js')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
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

