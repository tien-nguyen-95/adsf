@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container">
            <h3>Tạo mới </h3>
            <form action="{{ action('CustomerController@update' ,$customer->id ) }}" method="post" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Tên</label>
                    @error('name')
                        <div class="alert-alert-danger">{{ $error->first('name') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="name" value="{{ $customer->name }}" placeholder="Nhập tên...">
                </div>
                <div class="form-group">
                    @error('gender')
                        <div class="alert-alert-danger">{{ $error->first('gender') }}</div>
                    @enderror
                    <label for="title">Giới tính : </label>
                    <select name="gender">
                        <option value="1"
                            @if($customer->gender == 1) selected
                            @endif>Nam</option>
                        <option value="0"
                            @if($customer->gender == 0) selected
                            @endif>Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Email</label>
                    @error('email')
                        <div class="alert-alert-danger">{{ $error->first('email') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="email" value="{{ $customer->email }}" placeholder="Nhập mail...">
                </div>

                <div class="form-group">
                    <label for="title">Địa chỉ</label>
                    @error('address')
                        <div class="alert-alert-danger">{{ $error->first('address') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="address" value="{{ $customer->address }}" placeholder="Nhập địa chỉ...">
                </div>

                <div class="form-group">
                    <label for="title">Số điện thoại</label>
                    @error('phone')
                        <div class="alert-alert-danger">{{ $error->first('phone') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}" placeholder="Nhập số điện thoại...">
                </div>

                <div class="form-group">
                    <label for="title">Ghi chú</label>
                    @error('note')
                        <div class="alert-alert-danger">{{ $error->first('note') }}</div>
                    @enderror
                    <input type="text" class="form-control" name="note" value="{{ $customer->note }}" placeholder="Nhập ghi chú...">
                </div>

                <input type="submit" value="Xác nhận" class="btn btn-primary">
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
@endsection


