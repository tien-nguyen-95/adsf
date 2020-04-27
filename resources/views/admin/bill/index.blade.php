@extends('layouts.admin')

@section('title', 'Đơn hàng')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{  route('bill.create')  }}" class="btn btn-primary">Thêm mới</a>
        <a href="{{ route('bill.trash') }}" class="btn btn-secondary" style="float:right"><i class='fas fa-trash'></i> Thùng rác</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Đơn</h6>
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
                            <th>Mã đơn</th>
                            <th>Chi tiết</th>
                            <th>Khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Khuyến mãi</th>
                            <th>Tiền Thanh toán</th>
                            <th>Ghi chú</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!isset($bills) || count($bills) < 1)
                            Dữ liệu không tồn tại
                        @else
                        @foreach ($bills as $key => $bill)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $bill->code }}</td>
                            <td><a href="">chi tiết</a></td>
                            <td>{{ $bill->customer->name }}</td>
                            <td>{{ $bill->date_order }}</td>
                            <td>{{ $bill->total }} VND</td>
                            <td>{{ $bill->total - $bill->payment }} VND</td>
                            <td>{{ $bill->payment }} VND</td>
                            <td>{{ $bill->user_created}}<br>
                                {{ $bill->created_at }}</td>
                            <td>{{ $bill->user_updated}}<br>
                                {{ $bill->updated_at }}</td>
                            <td><a href="{{ route('bill.edit' , $bill->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit" title="Sửa"></i></a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('bill.destroy', $bill->id) }}">
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
