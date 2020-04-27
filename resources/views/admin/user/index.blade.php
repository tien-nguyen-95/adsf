@extends('layouts.admin')

@section('title','Người dùng')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="#" class="btn btn-secondary" ><i class='fas fa-trash'></i> Thùng rác</a>
        <a href="#" class="btn btn-secondary" style="float:right"><i class='fas fa-trash'></i> Thùng rác nhưng ở bên phải</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Loại sản phẩm</h6>
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
                            <th>Email</th>
                            <th>Thời gian tạo</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) < 1)
                            Không có dữ liệu
                        @else
                        @foreach ($users as $key => $user)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{!! $user->email !!}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><a href="{{ route('user.edit' , $user->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit" title="Sửa"></i></a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('user.destroy', $user->id) }}">
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
