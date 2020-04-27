@extends('layouts.admin')

@section('title', 'Sản Phẩm')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('product.restoreAll') }}" class="btn btn-success"><i class="fas fa-trash-restore"></i> Khôi phục tất cả</a>
        <a href="{{ route('product.deleteAll') }}" style="float:right" class="btn btn-danger"
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
                            <th>Loại</th>
                            <th>Mô tả</th>
                            <th>Giá Gốc</th>
                            <th>Giá Khuyến mãi</th>
                            <th>Khuyến mãi</th>
                            <th>Nổi bật</th>
                            <th>Ảnh</th>
                            <th>Người xóa</th>
                            <th>Hồi phục</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!isset($products) || count($products)<1)
                            Dữ liệu không tồn tại
                        @else
                        @foreach ($products as $key => $product)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->productType->name }}</td>
                            <td>{!! $product->description !!}</td>
                            <td>{{ $product->unit_price }} VND</td>
                            <td>{{ $product->promotion }} %</td>
                            <td>{{ $product->sale }}</td>
                            <td>{{ $product->speciality }}</td>
                            <td><img src="images/product/{{ $product->image }}" alt="" height="60px" width="60px"></td>
                            <td>{{ $product->user_deleted}}<br>
                                {{ $product->deleted_at }}</td>
                            <td><a href="{{ route('product.restore' , $product->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-trash-restore" title="Hồi phục"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Xóa xong sẽ không thể hồi phục. \n\nBạn chắc chắn muốn xóa {{ $product->name }} ?')">
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
