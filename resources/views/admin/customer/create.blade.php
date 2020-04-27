@extends('layouts.admin')

@push('select2-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
      <!-- Begin Page Content -->
      <div class="container">
            <h3>Tạo mới </h3>
            <form action="{{ action('CustomerController@store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Tên</label>
                    @error('name')
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên...">
                </div>

                <div class="form-group">
                    <label for="title">Giới tính: </label>
                    @error('gender')
                        <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
                    @enderror
                    <select name="gender">
                        <option value="1"selected>Nam</option>
                        <option value="0" >Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Email</label>
                    @error('email')
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="email" placeholder="Nhập mail...">
                </div>

                <div class="form-group">
                    <label for="title">Địa chỉ</label>
                    @error('address')
                        <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ...">
                </div>

                <div class="form-group">
                    <label for="title">Số điện thoại</label>
                    @error('phone')
                        <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại...">
                </div>

                <div class="form-group">
                    <label for="title">Ghi chú</label>
                    @error('note')
                        <div class="alert alert-danger">{{ $errors->first('note') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="note" placeholder="Nhập ghi chú...">
                </div>

                <input type="submit" value="Xác nhận" class="btn btn-primary">
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
@endsection


