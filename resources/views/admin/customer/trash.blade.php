@extends('layouts.admin')

@section('title', 'Khách hàng')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('customer.restoreAll') }}" class="btn btn-success"><i class="fas fa-trash-restore"></i> Khôi phục tất cả</a>
        <a href="{{ route('customer.deleteAll') }}" style="float:right" class="btn btn-danger"
            onclick="return confirm('Xóa xong sẽ không thể hồi phục. \n\nBạn chắc chắn muốn xóa tất cả?')"
            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa tất cả</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thùng rác</h6>
        </div>

        @if (session('error'))

        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif

        @if (session('success'))

                <div class="alert alert-success">
                    {{session('success')}}
                </div>
        @endif

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
                            <th>Người xóa</th>
                            <th>Hồi sinh</th>
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
                            <td>{{ $customer->gender }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{!! $customer->address !!}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->note }}</td>
                            <td>{{ $customer->user_deleted}}<br>
                                {{ $customer->deleted_at }}</td>
                                <td><a href="{{ route('customer.restore' , $customer->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-trash-restore" title="Hồi phục"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('customer.delete', $customer->id) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Xóa xong sẽ không thể hồi phục. \n\nBạn chắc chắn muốn xóa {{ $customer->name }} ?')">
                                    <i class="fa fa-trash" title="Xóa vĩnh viễn"></i>
                                </a>
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
