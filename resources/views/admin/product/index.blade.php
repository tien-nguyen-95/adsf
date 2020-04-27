@extends('layouts.admin')

@section('title', 'Sản Phẩm')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{  route('product.create')  }}" class="btn btn-primary">Thêm mới</a>
        <a href="{{ route('product.trash') }}" class="btn btn-secondary" style="float:right"><i class='fas fa-trash'></i> Thùng rác</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
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
                            <th>Loại</th>
                            <th>Mô tả</th>
                            <th>Giá Gốc</th>
                            <th>Đặt Khuyến mãi</th>
                            <th>Khuyến mãi</th>
                            <th>Nổi bật</th>
                            <th>Ảnh</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Edit</th>
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
                            <td>{{ $product->sale?'Có':'Không' }}</td>
                            <td>{{ $product->speciality?'Có':'Không' }}</td>
                            <td><img src="images/product/{{ $product->image }}" alt="" height="60px" width="60px"></td>
                            <td>{{ $product->user_created}}<br>
                                {{ $product->created_at }}</td>
                            <td>{{ $product->user_updated}}<br>
                                {{ $product->updated_at }}</td>
                            <td><a href="{{ route('product.edit' , $product->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit" title="Sửa"></i></a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('product.destroy', $product->id) }}">
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

