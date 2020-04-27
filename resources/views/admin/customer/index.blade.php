@extends('layouts.admin')

@section('title', 'Khách hàng')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{  route('customer.create')  }}" class="btn btn-primary">Thêm mới</a>
        <a href="{{  route('customer.trash')  }}" class="btn btn-secondary" style="float:right"><i class='fas fa-trash'></i> Thùng rác</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Khách hàng</h6>
        </div>

        <div class="col-sm-12">
            @if (session('success'))

            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 13.5px;">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Giới Tính</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Ghi chú</th>
                            <th>Người tạo</th>
                            <th>Người sửa</th>
                            <th>Cập nhật</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!isset($customers) || count($customers)<1)
                            Dữ liệu không tồn tại
                        @else
                        @foreach ($customers as $key => $customer)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->gender? 'Nam':'Nữ' }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{!! $customer->address !!}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->note }}</td>
                            <td>{{ $customer->user_created}}<br>
                                {{ $customer->created_at }}</td>
                            <td>{{ $customer->user_updated}}<br>
                                {{ $customer->updated_at }}</td>
                            <td><a href="{{ route('customer.edit' , $customer->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit" title="Sửa"></i></a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('customer.destroy' , $customer->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa ?')"
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash-alt" title="Thùng rác"></i></button>
                            </form>
                        </td>
                        </tr>

                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
