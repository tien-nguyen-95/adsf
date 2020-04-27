@extends('layouts.admin')

@section('title', 'Loại Sản Phẩm')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <p class="mb-4">
    <a href="{{ route('productType.restoreAll') }}" class="btn btn-success"><i class="fas fa-trash-restore"></i> Khôi phục tất cả</a>
    <a href="{{ route('productType.deleteAll') }}" style="float:right" class="btn btn-danger"> <button type="submit"
        onclick="return confirm('Xóa vĩnh viễn sẽ không thể hồi phục. \n\nBạn chắc chắn muốn xóa tất cả?')"
        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa tất cả</button></a>
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
                            <th>Mô tả</th>
                            <th>Ảnh</th>
                            <th>Thời gian tạo</th>
                            <th>Thời gian sửa</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($productTypes) < 1)
                            Không có dữ liệu
                        @else
                        @foreach ($productTypes as $key => $productType)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $productType->name }}</td>
                            <td>{!! $productType->description !!}</td>
                            <td><img src="data:image/jpg;base64,{{ $productType->image }}" alt="" height="60px" width="60px"></td>
                            <td>{{ $productType->created_at }}</td>
                            <td>{{ $productType->updated_at }}</td>
                            <td><a href="{{ route('productType.restore' , $productType->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-trash-restore" title="Hồi phục"></i></a>
                            <td>
                                <a href="{{ route('productType.delete', $productType->id) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Xóa xong sẽ không thể hồi phục. \n\nBạn chắc chắn muốn xóa {{ $productType->name }} ?')">
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
